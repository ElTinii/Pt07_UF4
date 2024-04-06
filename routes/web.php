<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
//Cridem a la vista del principi
Route::get('/', function () {
    return view('welcome');
});

//Cridem al controlador
Route::get('/', [Controller::class, 'index']);
//Cridem al post del controlador
Route::post('/', [Controller::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Aqui estem cridant a la vista d'inici sessio
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

//Aqui estem cridant a la vista de registre
Route::get('/registrar', function () {
    return view('registrar');
});

Route::get('/usuari', [Controller::class, 'show'])->middleware('auth');
require __DIR__.'/auth.php';

Route::get('/edit', function () {
    return view('edit');
})->middleware('auth');
