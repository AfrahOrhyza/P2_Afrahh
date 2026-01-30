<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// route untuk halaman register
Route::get('/register', function () {
    return view('auth.register');
});
    