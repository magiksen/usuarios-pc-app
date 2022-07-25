<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');


Route::post('/guardar', [UsuariosController::class, 'guardar'])->name('usuarios.store');
Route::get('/eliminar/{id}', [UsuariosController::class, 'eliminar'])->name('usuarios.eliminar');

Route::get('/lista', [UsuariosController::class, 'index'])->name('usuarios.index');

Route::get('/editar/{id}', [UsuariosController::class, 'editar'])->name('usuarios.editar');
Route::post('/update/{id}', [UsuariosController::class, 'update'])->name('usuarios.update');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
