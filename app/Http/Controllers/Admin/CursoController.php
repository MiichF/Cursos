<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Etiqueta;
use App\Models\Curso;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\CursoRequest;

class CursoController extends Controller
{

    public function __construct()
    {//permisos para acceder al sitio segun tipo de usuario.
        $this->middleware('can:admin.cursos.index')->only('index');
        $this->middleware('can:admin.cursos.create')->only('create','store');
        $this->middleware('can:admin.cursos.edit')->only('edit','update');
        $this->middleware('can:admin.cursos.destroy')->only('destroy');
      
    }
    public function index()
    {
        return view('admin.cursos.index');
    }

    public function create()
    {

        $categorias = Categoria::pluck('name', 'id');
        $etiquetas = Etiqueta::all();

        return view('admin.cursos.create', compact('categorias','etiquetas'));
    }

    public function store(CursoRequest $request)
    {
       //Storage::put('cursos',$contents);
        $curso = Curso::create($request->all());
        
        if($request->file('file')){
            $url = Storage::put('cursos',$request->file('file'));
            $curso->image()->create([
                'url' => $url
            ]);
        }
        Cache::flush();
        if($request->etiquetas){
            $curso ->etiquetas()->attach($request->etiquetas);
        }

        return redirect()->route('admin.cursos.edit', $curso);
   
    }


    public function show($curso)
    {
        return view('admin.cursos.show', compact('curso'));
    }

    public function edit($id)
    {
        
        $curso = Curso::find($id);

        $this->authorize('author', $curso);

        $categorias = Categoria::pluck('name', 'id');
        $etiquetas = Etiqueta::all();

        return view('admin.cursos.edit', compact('curso','categorias','etiquetas'));
    }

    public function update(CursoRequest $request, $id)
    {
        $curso = Curso::find($id);
        $this->authorize('author', $curso);

        $curso->update($request->all());

        if($request->file('file')){
            $url = Storage::put('cursos',$request->file('file'));

            if($curso->image){
                Storage::delete($curso->image->url);

                $curso->image->update([
                    'url' => $url
                ]);

            }else{
                $curso->image()->create([
                    'url' => $url
                ]);
            }
        }

        if($request->etiquetas){
            $curso ->etiquetas()->sync($request->etiquetas);
        }

        Cache::flush();
        return redirect()->route('admin.cursos.edit', $curso)->with('info','El curso se actualizo exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Curso::find($id);
        $this->authorize('author', $curso);

        $curso->delete();
        
        Cache::flush();
        return redirect()->route('admin.cursos.index', $curso)->with('info','El curso se elimino exitosamente');
    }
}
