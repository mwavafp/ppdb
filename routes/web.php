<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Arr;


use function Laravel\Prompts\alert;

Route::get('/dashboard', function () {
    return view('calonMurid.biodata',['title'=>'User Page']);
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/', function () {
    return view('home',['title'=>'Home Page']);//penggunaan nilai title
});
Route::get('/pondok', function () {
    return view('pondok',['title'=>'Information Page']);
});
Route::get('/madin', function () {
    return view('madin',['title'=>'Information Page']);
});
Route::get('/tpq', function () {
    return view('tpq',['title'=>'Information Page']);
});
Route::get('/tk', function () {
    return view('tk',['title'=>'Information Page']);
});
Route::get('/sd', function () {
    return view('sd',['title'=>'Information Page']);
});
Route::get('/smp', function () {
    return view('smp',['title'=>'Information Page']);
});
Route::get('/sma', function () {
    return view('sma',['title'=>'Information Page']);
});
Route::get('/biaya', function () {
    return view('calonMurid/biaya',['title'=>'Home Page']);
});
Route::get('/kontak', function () {
    return view('kontak',['title'=>'Kontak Page']);
});

Route::get('/seleksi', function () {
    return view('seleksi',['title'=>'Informasi Pembayaran']);
});
Route::get('/verifikasi', function () {
    return view('verifikasi',['title'=>'Vrifikasi Data']);
});

Route::get('/pengumuman', function () {
    return view('pengumuman',['title'=>'About Page','post'=>[
        [
            'id'=>1,
            'title'=>'njirlah aneh',
            'link'=>'gg123',
            'desk'=>'Error123'
        ],
        [   
            'id'=>2,
            'title'=>'njirlah aneh2',
            'link'=>'gg321',
            'desk'=>'Error321'
        ]//contoh data
    ]]);
});

Route::get('/pengumuman/{id}', function ($id){

    $post=Post::find($id);
    return view('post',['title'=>'single post','post'=>$post]);
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';

