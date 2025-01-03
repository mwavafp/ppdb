<?php

use App\Http\Controllers\Admin\Auth\AdminDashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\KelasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


use function Laravel\Prompts\alert;

Route::get('/biodata', function () {
    return view('calonMurid.biodata',['title'=>'User Page']);
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/', function () {
    return view('frontPage.home',['title'=>'Home Page']);//penggunaan nilai title
});
Route::get('/pondok', function () {
    return view('frontPage.pondok',['title'=>'Pondok Information Page']);
});
Route::get('/madin', function () {
    return view('frontPage.madin',['title'=>'Madin Information Page']);
});
Route::get('/tpq', function () {
    return view('frontPage.tpq',['title'=>'TPQ Information Page']);
});
Route::get('/tk', function () {
    return view('frontPage.tk',['title'=>'TK Information Page']);
});
Route::get('/sd', function () {
    return view('frontPage.sd',['title'=>'SD Information Page']);
});
Route::get('/smp', function () {
    return view('frontPage.smp',['title'=>'SMP Information Page']);
});
Route::get('/sma', function () {
    return view('frontPage.sma',['title'=>'SMA Information Page']);
});
Route::get('/biaya', function () {
    return view('calonMurid/biaya',['title'=>'Biaya Page']);
});
Route::get('/kontak', function () {
    return view('frontPage.kontak',['title'=>'Kontak Page']);
});


Route::get('/pembayaran', function () {
    return view('calonMurid.pembayaran',['title'=>'Informasi Pembayaran']);
});


Route::get('/tagihan', function () {
    return view('frontPage.tagihan',['title'=>'Tagihan Biaya']);
});
Route::get('/sd', function () {
    return view('frontPage.sd',['title'=>'Informasi Pembayaran']);
});


Route::get('/form', function (Request $request) {
    $unitPendidikan = $request->query('unit_pendidikan', ''); // Nilai default kosong jika tidak ada parameter
    return view('frontPage.formRegister',['title'=>'test'], compact('unitPendidikan'));
});


Route::get('/seleksi', function () {
    return view('calonMurid.seleksi',['title'=>'Seleksi Murid']);
});

Route::get('/verifikasi', function () {
    $pemberkasanLengkap = false; // Ganti sesuai status aktual
    $pembayaranLunas = true; // Ganti sesuai status aktual

    return view('calonMurid.verifikasi',['title'=>'Verifikasi Data', 'pemberkasanLengkap' => $pemberkasanLengkap, 'pembayaranLunas' => $pembayaranLunas,]);
});



Route::get('/pengumuman', function () {
    return view('frontPage.pengumuman',['title'=>'About Page']);
});


require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
require __DIR__.'/pageAuth.php';

