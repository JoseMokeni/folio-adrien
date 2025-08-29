<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Log;


class LoginController extends Controller
{
    // Affiche la page du login


    public function showLoginForm()
    {
        return view('auth.login');
    }

    //Récupérer le login depuis le formulaire
    public function login()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        Log::info('Login attempt', ['email' => $attributes['email']]);
        Log::info('Login attempt', ['password' => $attributes['password']]);

        $email = $attributes['email'];

        // find user with email
        $user = User::where(['email' => $email])->first();
        Log::info($user);
        if (!($user && Hash::check($attributes['password'], $user->password))) {
            Log::info('User login attempt', ['email' => $email, 'success' => false]);
            return redirect()->back()->with('error', 'Désolé cette combinaison est inéxistante');
        }

        Log::info('User login attempt', ['email' => $email, 'success' => true]);

        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Bienvenue sur votre tableau de bord');
    }

    //Se  déconnecter
    public function logout()
    {
        Auth::logout();

        return redirect('/auth/login');
    }
}
