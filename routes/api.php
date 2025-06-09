<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Note: the apiResource handles CRUD operations GET, POST, PUT, DELETE
// So you don't need to define each route individually

// Test Route
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello, World!']);
});

// Todos Route
Route::apiResource('todos', TodoController::class);

// User routes
Route::get('/users', function () {
    return response()->json([
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'company' => 'ABC Inc'],
        ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'company' => 'ABC Inc'],
        ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'company' => 'ABC Inc'],
    ]);
});

// Post routes
Route::apiResource('posts', PostController::class);
