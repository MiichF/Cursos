<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $titulo;
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function __construct($titulo = "Sin Nombre")
    {
        $this->titulo = $titulo;
    }


    public function render()
    {
        return view('layouts.app');
    }
}
