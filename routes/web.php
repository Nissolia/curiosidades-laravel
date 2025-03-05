<?php

use App\Http\Controllers\CuriosidadController;
use Illuminate\Support\Facades\Route;

// Ruta de inicio (muestra la lista de curiosidades)
Route::get('/', [CuriosidadController::class, 'index'])->name('home');

// Rutas de recursos para Curiosidad (CRUD)
Route::resource('curiosidades', CuriosidadController::class);