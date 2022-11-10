<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\EtiquetaController;
use App\Http\Controllers\Admin\CursoController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('categorias',CategoriaController::class)->names('admin.categorias');

Route::resource('etiquetas',EtiquetaController::class)->names('admin.etiquetas');

Route::resource('cursos',CursoController::class)->names('admin.cursos');
