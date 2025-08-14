<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('auth/login', [LoginController::class, 'login']);

Route::get('auth/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('auth/register', [RegisterController::class, 'register']);

// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

//déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Protège tous mon groupe de routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::resource('accounts', AccountController::class);
});
