<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::view('/', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('task')->name('task.')->group(function(){
        Route::get('/list', [TaskController::class, 'index'])->name('index');
        Route::get('/create', [TaskController::class, 'create'])->name('create');
        Route::post('/store', [TaskController::class, 'store'])->name('store');
        Route::get('/show/{task}', [TaskController::class, 'show'])->name('show');
        Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('edit');
        Route::post('/update/{task}', [TaskController::class, 'update'])->name('update');
        Route::get('/delete/{task}', [TaskController::class, 'destroy'])->name('delete');

        Route::get('/filter/{status}', [TaskController::class, 'filterByStatus'])->name('status');
        Route::get('/sort/{status}', [TaskController::class, 'sortByEndDate'])->name('sort');
    });
});

