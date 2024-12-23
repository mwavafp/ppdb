<?php

use App\Http\Controllers\Admin\Auth\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\KelasController;
use App\Http\Controllers\Admin\Auth\TagihanAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard-admin', [AdminDashboardController::class,'showUser']);
Route::get('/pembagiankelas', [KelasController::class, 'index']);
Route::get('/seleksiSiswa', function () {
    return view('admin.page.seleksi',['title'=>'Seleksi Siswa Page']);
});
Route::get('/tagihan-admin', [TagihanAdmin::class, 'showData'])->name('tagihan-admin');
Route::get('/edit-tagihan/{id}', [TagihanAdmin::class, 'editData'])->name('edit-tagihan');
Route::post('update-tagihan/{id}', [TagihanAdmin::class, 'updateData'])->name('update-tagihan');




