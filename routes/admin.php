<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\EtiquetaController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('categorias',CategoriaController::class)->names('admin.categorias');

Route::resource('etiquetas',EtiquetaController::class)->names('admin.etiquetas');
