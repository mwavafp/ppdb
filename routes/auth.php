<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\DaftarUlangController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest:web')->group(function () {


    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth:web')->group(function () {
    Route::get('/biodata', function () {
        return view('calonMurid.biodata', ['title' => 'User Page']);
    })->name('biodata');
    Route::get('/seleksi', function () {
        return view('calonMurid.seleksi', ['title' => 'User Page']);
    });
    Route::get('/berkas', function () {
        return view('calonMurid.berkas', ['title' => 'User Page']);
    });
    Route::get('/verifikasi-data', function () {
        return view('calonMurid.verifikasi', ['title' => 'User Page']);
    });

    Route::get('/pembayaran', [DaftarUlangController::class, 'showData'])->name('pembayaran');
    Route::get('/biaya', function () {
        return view('calonMurid.biaya', ['title' => 'Informasi Pembayaran']);
    });
    Route::post('logouts', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logouts');
});
