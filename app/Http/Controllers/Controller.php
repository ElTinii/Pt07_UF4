<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}