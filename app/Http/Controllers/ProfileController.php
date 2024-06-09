<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function afegirFoto(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $user = Auth::user();
        $file = $request->file('fitxers');
        $ruta = 'imatges/' . $user->username;

        if(!(file_exists($ruta))){
            mkdir($ruta, 0777, true);
        }

        if ($request->hasFile('avatar')) {

            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move($ruta, $filename);
            $request->merge(['file' => $filename]);
        }
    
        $user->avatar = $ruta . '/' . $filename;
        $user->save();
        
        return view('profile')
        ->with('success','You have successfully upload image.');
    }

    //Funcio per canciar contrasenya
    public function canviarContrasenya(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ], [
            'password.required' => 'La contrasenya actual es obligatoria.',
            'new_password.required' => 'La nova contrasenya es obligatoria.',
            'confirm_password.required' => 'Las confirmació de la contrasenya es obligatoria.',
            'confirm_password.same' => 'Las contrasenyas no coincideixen',
        ]);
        $passwordActual = htmlspecialchars($request->password);
        $newPassword = htmlspecialchars($request->new_password);
        $user = Auth::user();

        if (Hash::check($passwordActual, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return view('profile');
        } else {
            return view('profile');
        }
    }
}
