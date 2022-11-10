<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etiqueta;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = Etiqueta::all();

        return view('admin.etiquetas.index', compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = [
            "red" => 'Color rojo',
            "yellow" => 'Color amarillo',
            "blue" => 'Color azul',
            "green" => 'Color verde',
            "indigo" => 'Color indigo',
            "purple" => 'Color morado',
            "pink" => 'Color rosa',
            "gray" => 'Color gris',
        ];

        return view('admin.etiquetas.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:etiquetas',
            'color' => 'required',
        ]);
        
        $etiqueta = Etiqueta::create($request->all());

        return redirect()->route('admin.etiquetas.edit', compact('etiqueta'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etiqueta $etiqueta)
    {
        return view('admin.etiquetas.show', compact('etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etiqueta $etiqueta)
    {
        $colors = [
            "red" => 'Color rojo',
            "yellow" => 'Color amarillo',
            "blue" => 'Color azul',
            "green" => 'Color verde',
            "indigo" => 'Color indigo',
            "purple" => 'Color morado',
            "pink" => 'Color rosa',
            "gray" => 'Color gris',
        ];

        return view('admin.etiquetas.edit', compact('etiqueta', 'colors'))->with('info', 'La etiqueta se creo con exito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etiqueta $etiqueta)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:etiquetas,slug,$etiqueta->id",
            'color' => 'required',
        ]);

        $etiqueta->update($request->all());

        return redirect()->route('admin.etiquetas.edit', compact('etiqueta'))->with('info', 'La etiqueta se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etiqueta $etiqueta)
    {
        $etiqueta->delete();

        return redirect()->route('admin.etiquetas.index', compact('etiqueta'))->with('info', 'La etiqueta se elimino con exito');
    }
}
