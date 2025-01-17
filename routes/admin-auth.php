<?php

use App\Http\Controllers\Admin\Auth\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\KelasController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\Auth\SeleksiAdminController;
use App\Http\Controllers\Admin\Auth\SiswaController;
use App\Http\Controllers\Admin\Auth\TagihanAdmin;
use Illuminate\Support\Facades\Route;

//prefix digunakan untuk penambahan awal sebelum view contoh 
//prefix(admin) pada view dashboard. maka nanti akan menjadi /admin/dashboard
//guest digunakan khusus pengguna yang belum login sebagai admin
//auth memerikasa pengguna sudah login
Route::prefix('admin')->middleware('guest:admin')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard',['title'=>'User Page']);
    // })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('login', [LoginController::class, 'create'])
        ->name('admin.login');

    Route::post('login', [LoginController::class, 'store']);
});

Route::middleware('auth:admin')->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('admin.page.dashboard', ['title' => 'tes']);
    // })->name('admin.dashboard');
    Route::get('/dashboard-admin', [AdminDashboardController::class, 'showUser'])->name('admin.dashboard-admin');
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
    // Route::post('logout', [LoginController::class, 'destroy'])
    //     ->name('admin.logout');
});
