<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

// Note: the apiResource handles CRUD operations GET, POST, PUT, DELETE
// So you don't need to define each route individually

// To-do Route
Route::apiResource('todos', TodoController::class);

// User routes
Route::apiResource('users', UserController::class);

// Post routes
Route::apiResource('posts', PostController::class);
