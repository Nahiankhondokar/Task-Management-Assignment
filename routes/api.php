<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\DashboardController;
use App\Http\Controllers\API\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('task')->name('task.')->group(function(){
        Route::get('/list', [TaskController::class, 'index']);
        Route::get('/create', [TaskController::class, 'create']);
        Route::post('/store', [TaskController::class, 'store']);
        Route::get('/show/{task}', [TaskController::class, 'show']);
        Route::get('/edit/{task}', [TaskController::class, 'edit']);
        Route::post('/update/{task}', [TaskController::class, 'update']);
        Route::get('/delete/{task}', [TaskController::class, 'destroy']);

        Route::get('/filter/{status}', [TaskController::class, 'filterByStatus']);
        Route::get('/sort/{status}', [TaskController::class, 'sortByEndDate']);
    });
});
