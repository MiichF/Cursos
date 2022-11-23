<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use App\Models\Etiqueta;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
class CursoController extends Controller
{
    public function index(){
      //alamcenamiento de datos en memoria cache para carga rapida del sitio 
        if(request()->page){
            $key = 'cursos'.request()->page;

        }else {
            $key = 'cursos';
        }
        if(Cache::has($key)){
            $cursos = Cache::get($key);
        }else{
            $cursos = Curso::where('status', 2)->latest('id')->paginate(8);
            Cache::put($key,$cursos);
        }

      
        return view('cursos.index', compact('cursos'));
    }

    public function show(Curso $curso){

        $this->authorize('published', $curso);

        $similares = Curso::where('categoria_id', $curso->categoria_id)
                                ->where('status',2)
                                ->where('id','!=',$curso->id)
                                ->latest('id')
                                ->take(4)
                                ->get();

        return view('cursos.show', compact('curso','similares'));
       }

    public function categoria(Categoria $categoria){
        $cursos = Curso::where('categoria_id', $categoria->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(4);

        return view('cursos.categoria', compact('cursos', 'categoria'));
    }

    public function etiqueta(Etiqueta $etiqueta){
        $cursos = $etiqueta->cursos()->where('status', 2)
                                ->latest('id')
                                ->paginate(4);

        return view('cursos.etiqueta', compact('cursos', 'etiqueta'));
    }
}
