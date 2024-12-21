<?php

use App\Http\Controllers\Admin\Auth\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\KelasController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard-admin', [AdminDashboardController::class,'showUser']);
Route::get('/pembagiankelas', [KelasController::class, 'index']);
Route::get('/seleksiSiswa', function () {
    return view('admin.page.seleksi',['title'=>'Seleksi Siswa Page']);
});
Route::get('/tagihan-admin', function () {
    return view('admin.page.tagihan',['title'=>'Seleksi Siswa Page']);
});