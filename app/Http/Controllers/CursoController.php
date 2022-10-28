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
}
