<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Homepage.Hero');
});

Route::get('/produk', function () {
    return view('Homepage.Produk');
});
