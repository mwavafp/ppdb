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
Route::get('/seleksi-siswa', [SeleksiAdminController::class, 'showData'])->name('seleksi-admin');
Route::get('/tagihan-admin', [TagihanAdmin::class, 'showData'])->name('tagihan-admin');
Route::get('/edit-tagihan/{id}', [TagihanAdmin::class, 'editData'])->name('edit-tagihan');
Route::post('update-tagihan/{id}', [TagihanAdmin::class, 'updateData'])->name('update-tagihan');
Route::get('/search', [TagihanAdmin::class, 'search'])->name('search');
Route::get('/filter', [TagihanAdmin::class, 'filter'])->name('filter');
