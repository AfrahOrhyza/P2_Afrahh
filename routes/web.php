<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// route untuk halaman register
Route::get('/register', function () {
    return view('auth.register');
});
    