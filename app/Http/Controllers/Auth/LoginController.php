<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;


class LoginController extends Controller
{
    // Affiche la page du login


    public function showLoginForm() {
        return view('auth.login');
    }

    //Récupérer le login depuis le formulaire
    public function login() {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=> 'Désolé cette combinaison est inéxistante'
            ]);
        };

        request()->session()->regenerate();

        return redirect('/accounts');
    }

    //Se  déconnecter
    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}

