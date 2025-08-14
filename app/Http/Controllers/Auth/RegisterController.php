<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\auth\request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Log;

class RegisterController extends Controller
{

    // Affiche le formulaire d'inscription
    public function showRegisterForm() {
        return view('auth.register');
    }

    //
    public function register() {

        $attributes = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
           'password' => ['required', 'confirmed', Password::min(8)],

        ]);

        Log::info("inside register controller after validation");

        $user = User::create($attributes);

        Log::info("register controller after user creation");
        Log::info($user->name);


        Auth::login($user);
        Log::info("register controller after login attempt");


        return redirect('/');
    }
}


