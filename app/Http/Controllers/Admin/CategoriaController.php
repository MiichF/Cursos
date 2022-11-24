<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    public function __construct()
    {//permisos para acceder al sitio segun tipo de usuario.
        $this->middleware('can:admin.categorias.index')->only('index');
        $this->middleware('can:admin.categorias.create')->only('create','store');
        $this->middleware('can:admin.categorias.edit')->only('edit','update');
        $this->middleware('can:admin.categorias.destroy')->only('destroy');
      
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //solución problema n+1 consultas
        $categorias =Categoria::with('cursos')->get();

        return view('admin.categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categorias.create');
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request ->validate([
                'name'=> 'required',
                'slug'=> 'required|unique:categorias'
            ]);

            $categoria = Categoria::create($request ->all());
            return redirect()->route('admin.categorias.edit', $categoria)->with('info','Categoria creada exitosamente!');
    
    }

    public function show(Categoria $categoria)
    {
        //
        return view('admin.categorias.show',compact('categoria'));
   
    }
     public function edit(Categoria $categoria)
    {
        //
        return view('admin.categorias.edit', compact('categoria'));
   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria  $categoria)
    {
        //
        $request ->validate([
            'name'=> 'required',
            'slug'=> "required|unique:categorias,slug,$categoria->id"
        ]);

        $categoria->update($request->all());

        return redirect()->route('admin.categorias.edit', $categoria)->with('info','Categoria actualizada exitosamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
        $categoria->delete();

        return redirect()->route('admin.categorias.index')->with('info','Categoria eliminada existosamente!');
    }
}
