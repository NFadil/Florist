<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
});

Route::get('/home', function () {
    return view('Homepage.Hero');
});
