<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('categorias',CategoriaController::class)->names('admin.categorias');
