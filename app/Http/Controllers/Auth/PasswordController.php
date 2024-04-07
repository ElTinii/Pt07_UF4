<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    public function verify(Request $request)
    {
        $credentials = $request->only('password');

        if (Hash::check($credentials['password'], auth()->user()->password)) {
            $user = auth()->user();
            $user->password_verified = true;
            $user->save();
            return redirect('/profile');
        } else {
            return redirect('/profile')->withErrors(['password' => 'La contraseña es incorrecta']);
        }
    }
}
