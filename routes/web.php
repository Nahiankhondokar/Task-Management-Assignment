<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::view('/', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

// Route::middleware('auth')->group(function(){
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');
// });

