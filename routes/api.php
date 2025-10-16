<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/users', [UserController::class, 'getUser']);
    Route::post('/users', [UserController::class, 'createUser']);
    Route::get('/users/{id}', [UserController::class, 'getUserById']);
    Route::patch('/users/{id}', [UserController::class, 'updateUser']);
    Route::delete('/users/{id}', [UserController::class, 'deleteUser']);
});