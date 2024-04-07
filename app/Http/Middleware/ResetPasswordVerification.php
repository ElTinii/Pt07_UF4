<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ResetPasswordVerification
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if ($request->path() != 'profile' && Auth::check()) {
            $user = Auth::user();
            $user->password_verified = false;
            $user->save();
        }

        return $response;
    }
}
