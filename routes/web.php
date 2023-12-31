<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//rutas para index donde vemos todos los personajes y la de ver detalles

Route::get('/', [PersonajesController::class, 'index'])->name('personaje.index');
Route::get('/personaje/{id}', [PersonajesController::class, 'show'])->name('personaje.show');

