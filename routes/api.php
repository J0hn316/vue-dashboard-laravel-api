<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('posts', PostController::class);
    Route::apiResource('todos', TodoController::class);
    Route::apiResource('users', UserController::class);
});
