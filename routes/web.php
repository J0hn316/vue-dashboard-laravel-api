<?php

use Illuminate\Support\Facades\Route;

// require __DIR__ . '/auth.php';

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::fallback(function () {
    return response()->json(['error' => 'Fallback hit'], 404);
});

Route::view('/{any}', 'app')->where('any', '^(?!api).*$');
