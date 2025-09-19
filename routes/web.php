<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ImportationController;
use App\Http\Controllers\CSVExportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;

// Landing page route
Route::get('/', [LandingController::class, 'index'])->middleware('not-authenticated')->name('landing');





Route::middleware('not-authenticated')->group(function () {
    Route::get('auth/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('auth/login', [LoginController::class, 'login']);

    Route::get('auth/register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('auth/register', [RegisterController::class, 'register']);
});

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

//déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Protège tous mon groupe de routes
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('account', AccountController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('movement', MovementController::class);
    Route::get('import', [ImportController::class, 'create'])->name('import.create');

    Route::get('/export/movements/csv', [CSVExportController::class, 'exportMovementsCSV'])
        ->name('movements.export.csv');

        Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.index');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
