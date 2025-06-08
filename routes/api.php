<?php

use Illuminate\Support\Facades\Route;

// Test Route
Route::get('/hello', function () {
    return response()->json(['message' => 'Hello, World!']);
});

// Todos Routes
Route::get('/todos', function () {
    return response()->json([
        ['id' => 1, 'title' => 'Learn Laravel', 'completed' => false],
        ['id' => 2, 'title' => 'Connect Vue to API', 'completed' => true],
        ['id' => 3, 'title' => 'Polish Dashboard UI', 'completed' => false],
    ]);
});

// User routes
Route::get('/users', function () {
    return response()->json([
        ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'company' => 'ABC Inc'],
        ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'company' => 'ABC Inc'],
        ['id' => 3, 'name' => 'Bob Johnson', 'email' => 'bob@example.com', 'company' => 'ABC Inc'],
    ]);
});

// Post routes
// Get all posts
Route::get('/posts', function () {
    return response()->json([
        ['id' => 1, 'title' => 'First Post', 'body' => 'This is the first post body', 'userId' => 1],
        ['id' => 2, 'title' => 'Second Post', 'body' => 'Another post body', 'userId' => 2],
        ['id' => 3, 'title' => 'Third Post', 'body' => 'More post content', 'userId' => 3],
    ]);
});

// Get single post
Route::get('/posts/{postId}', function ($postId) {
    return response()->json([
        'id' => $postId,
        'title' => 'Sample Post Title',
        'body' => 'This is a mock body for the post with ID ' . $postId,
        'userId' => 1,
    ]);
});
