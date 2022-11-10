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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cursos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categoria::pluck('name', 'id');
        $etiquetas = Etiqueta::all();

        return view('admin.cursos.create', compact('categorias','etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        if($request->etiquetas){
            $curso ->etiquetas()->attach($request->etiquetas);
        }

        return redirect()->route('admin.cursos.edit', $curso);
   
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($curso)
    {
        return view('admin.cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $curso = Curso::find($id);

        $this->authorize('author', $curso);

        $categorias = Categoria::pluck('name', 'id');
        $etiquetas = Etiqueta::all();

        return view('admin.cursos.edit', compact('curso','categorias','etiquetas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('admin.cursos.index', $curso)->with('info','El curso se elimino exitosamente');
    }
}
