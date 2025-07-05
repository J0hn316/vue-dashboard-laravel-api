<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::middleware('guest')->group(function () {
    Route::post('/auth/login', [AuthenticatedSessionController::class, 'store']);
    Route::post('/auth/register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthenticatedSessionController::class, 'destroy']);
});

// apiResource is a helper function that handles CRUD operations - create, read, update, delete all in one line.
Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('posts', PostController::class);
    Route::apiResource('todos', TodoController::class);
    Route::apiResource('users', UserController::class);
});
