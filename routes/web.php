<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/produk', [ProductController::class, 'index'])->name('Produk.show');
Route::get('/categories/{category:slug}', [ProductController::class, 'category'])->name('Produk.Category');

//login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [UserController::class, 'index'])->name('login');
    Route::post('/login', [UserController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userakses:admin')->name('Admin.Admin');
    Route::get('/keranjang', function () {
        return view('Homepage.Keranjang');
    });
    Route::get('/pesanan', [PesananController::class, 'index'])->middleware('userakses:customer')->name('User.Pesanan');
});

//rederect login
Route::get('/home', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect('/admin');
    } elseif ($user->role === 'customer') {
        return redirect('/produk');
    }
    return redirect('/logout');
});

Route::get('/', function () {
    return view('Homepage.Hero');
});
Route::get('/beranda', function () {
    return view('Homepage.Beranda');
});
Route::get('/about', function () {
    return view('Homepage.TentangKami');
});

Route::get('/registrasi', function () {
    return view('Homepage.Registrasi');
});
