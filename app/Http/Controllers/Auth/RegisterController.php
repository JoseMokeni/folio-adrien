<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Log;

class RegisterController extends Controller
{

    // Affiche le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    //
    public function register(Request $request)
    {

        $attributes = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],

        ]);

        // Hash the password before saving
        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        Auth::login($user);
        $request->session()->regenerate();
        // Redirect to dashboard after registration
        return redirect('/dashboard');

    }
}
