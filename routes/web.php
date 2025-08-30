<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BebasPerpusController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login-form');
Route::post('/login', [AuthController::class, 'autenticete'])->name('process-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware(['cheokLogin'])->group(function () {
    Route::get('/dashboard', [BebasPerpusController::class, 'index'])->name('dashboard');
    Route::get('/Bebas-Perpus', [BebasPerpusController::class, 'show'])->name('Data-Bebas-Perpus');
    Route::get('/Bebas-Perpus/create', [BebasPerpusController::class, 'create'])->name('Bebas-Perpus-create');
    Route::post('/Bebas-Perpus/store', [BebasPerpusController::class, 'store'])->name('Bebas-Perpus-store');
    Route::get('/skripsi/create/{id}', [BebasPerpusController::class, 'createSkripsi'])->name('skripsi-create');
    Route::post('/skripsi/store/{id}', [BebasPerpusController::class, 'storeSkripsi'])->name('skripsi-store');
    Route::get('/cetak/{id}', [BebasPerpusController::class, 'cetak'])->name('cetak-bebas-perpus');
});
