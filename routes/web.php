<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\PublikController;

// ================================================
// ROUTE PUBLIK
// ================================================
Route::get('/', [PublikController::class, 'index'])->name('publik.index');

Route::get('/blog/kategori/{id}', [PublikController::class, 'kategori'])
    ->name('publik.kategori');

Route::get('/blog/artikel/{id}', [PublikController::class, 'detail'])
    ->name('publik.detail');

// ================================================
// ROUTE LOGIN
// ================================================
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'proses'])
    ->name('login.proses')
    ->middleware('guest');

// ================================================
// ROUTE LOGOUT
// ================================================
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// ================================================
// ROUTE CMS (HARUS LOGIN)
// ================================================
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('artikel', ArtikelController::class)
        ->except(['show']);

    Route::resource('penulis', PenulisController::class)
        ->except(['show']);

    Route::resource('kategori', KategoriArtikelController::class)
        ->except(['show']);
});
