<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ArticleController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
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

Route::get('/usuari', [Controller::class, 'show'])->middleware('auth');
require __DIR__.'/auth.php';

//Aqui estem cridant a la vista de perfil mirant si esta autenticat
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

//Aqui verifiquem la contrasenya del usuari
Route::post('/verify-password', [PasswordController::class, 'verify']);

//Aqui cridem a la vista de tornar per a que l'usuari pugui tornar enrere i es faci un canvi a la base de dades
Route::post('/return', [Controller::class, 'return']);

//Aqui cridem a la vista de eliminar compte per a que l'usuari pugui eliminar el seu compte
Route::post('/delete-account', [Controller::class, 'deleteAccount']);

//Cridem aquesta vista per a que l'usuari pugui confirmar que vol eliminar el seu compte
Route::post('/confirm-delete', 'Controller@confirmDelete');

//Aqui cridem a la vista de perfil per a que l'usuari pugui modificar les seves dades
Route::post('/update-user', [Controller::class, 'updateUser']);

//Cridem el cotrolador per eliminar l'article que ens pasa per parametre
Route::delete('/delete-article/{id}', [ArticleController::class, 'delete']);

//Aixi cridem per fer la modificacio de la base de dades
Route::put('/usuari/{id}', [ArticleController::class, 'update']);

//Per afegir un article
Route::post('/add-article', [ArticleController::class, 'store']);

//Oauth google Login i registrar-se 
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
    if($userExists){
        Auth::login($userExists);
    }else{
        $userNew = User::create([
            'username' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'external_id' => $user->id,
            'external_auth' => 'google',
        ]);
        Auth::login($userNew);
    }
    return redirect('/usuari');
});