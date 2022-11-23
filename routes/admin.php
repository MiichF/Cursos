<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\EtiquetaController;
use App\Http\Controllers\Admin\CursoController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('categorias',CategoriaController::class)->except('show')->names('admin.categorias');

Route::resource('etiquetas',EtiquetaController::class)->except('show')->names('admin.etiquetas');

Route::resource('cursos',CursoController::class)->except('show')->names('admin.cursos');
