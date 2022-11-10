<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $categorias = Categoria::all();

        return view('livewire.navigation', compact('categorias'));
    }
}
