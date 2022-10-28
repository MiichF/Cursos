<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        $cursos = Curso::where('status', 2)->latest('id')->paginate(8);

        return view('cursos.index', compact('cursos'));
    }

    public function show(Curso $curso){

        $similares = Curso::where('categoria_id', $curso->categoria_id)
                                ->where('status',2)
                                ->where('id','!=',$curso->id)
                                ->latest('id')
                                ->take(4)
                                ->get();

        return view('cursos.show', compact('curso','similares'));
       }
}
