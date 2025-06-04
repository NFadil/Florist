<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Homepage.Hero');
});
Route::get('/beranda', function () {
    return view('Homepage.Beranda');
});
Route::get('/produk', function () {
    return view('Homepage.Produk');
});
Route::get('/keranjang', function () {
    return view('Homepage.Keranjang');
});
Route::get('/about', function () {
    return view('Homepage.TentangKami');
});
Route::get('/pesanan', function () {
    return view('Homepage.Pesanan');
});
Route::get('/login', function () {
    return view('Homepage.Login');
});
Route::get('/registrasi', function () {
    return view('Homepage.Registrasi');
});
