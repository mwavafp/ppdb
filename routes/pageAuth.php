<?php

use App\Http\Controllers\Admin\Auth\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\KelasController;
use App\Http\Controllers\Admin\Auth\TagihanAdmin;
use App\Http\Controllers\Admin\Auth\SiswaController;
use App\Http\Controllers\Admin\Auth\SeleksiAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard-admin', [AdminDashboardController::class, 'showUser']);
Route::get('/pembagiankelas', [KelasController::class, 'index']);

Route::get('/siswa', [SiswaController::class, 'index'])->name('index');
Route::put('/siswa/{id}/update', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/{id}/detail', [SiswaController::class, 'show'])->name('detail-user');

Route::get('/seleksiSiswa', [SeleksiAdminController::class, 'showData'])->name('seleksi-siswa');




Route::get('/tagihan-admin', [TagihanAdmin::class, 'showData'])->name('tagihan-admin');
Route::get('/edit-tagihan/{id}', [TagihanAdmin::class, 'editData'])->name('edit-tagihan');
Route::post('update-tagihan/{id}', [TagihanAdmin::class, 'updateData'])->name('update-tagihan');
Route::get('/search', [TagihanAdmin::class, 'search'])->name('search');
Route::get('/filter', [TagihanAdmin::class, 'filter'])->name('filter');
