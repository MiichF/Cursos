<?php

namespace App\Http\Livewire\Admin;

use App\Models\Curso;
use Livewire\Component;
use Livewire\WithPagination;

class CursosIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $cursos = Curso::where('user_id', auth()->user()->id)
                        ->where('name', 'LIKE' ,'%' . $this->search . '%')
                        ->latest('id')
                        ->paginate();

        return view('livewire.admin.cursos-index', compact('cursos'));
    }
}
