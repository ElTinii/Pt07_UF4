<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
public function index(Request $request)
{
    if ($request->has('option')) {
        $request->session()->put('per_page', $request->input('option'));
    }

    $perPage = $request->session()->get('per_page', 5);

    $articles = DB::table('articles')->paginate($perPage);

    return view('welcome', ['articles' => $articles]);
}

public function show(Request $request)
{
    if ($request->has('option')) {
        $request->session()->put('per_page', $request->input('option'));
    }

    $perPage = $request->session()->get('per_page', 5);
    $articles = DB::table('articles')->where('user_id', auth()->user()->id)->paginate($perPage);

    return view('usuari', ['articles' => $articles]);
}
public function return(Request $request)
{
    $user = Auth::user();
    $user->password_verified = false;
    $user->save();

    return redirect('/usuari');
}

public function deleteAccount(Request $request)
{
    $request->session()->flash('delete_account', true);
    return redirect('/profile');
}

public function confirmDelete()
{
    $user = Auth::user();

    // Reasigna todos los artículos del usuario al usuario con ID 1
    //Aqui he fet aixo perque tinc pensat que l'usuari 1 sigui l'usuari "admin" i que no es pugui eliminar  
    Article::where('user_id', $user->id)->update(['user_id' => 1]);

    $user->delete();

    return redirect('/');
}

public function updateUser(Request $request)
{
    $user = Auth::user();
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->save();

    return redirect('/profile');
}
}