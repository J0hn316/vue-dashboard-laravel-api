<?php

use Illuminate\Support\Facades\Route;

// require __DIR__ . '/auth.php';

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::view('/{any}', 'app')->where('any', '.*');
