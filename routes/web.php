<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PanitiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Arr;


use function Laravel\Prompts\alert;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','panitia')->group(function(){
    Route::get('/panitia',[PanitiaController::class,'index'])->name('panitia.panitia');
});


Route::get('/', function () {
    return view('home',['title'=>'Home Page']);//penggunaan nilai title
});
Route::get('/informasi', function () {
    return view('informasi',['title'=>'Home Page']);
});
Route::get('/biaya', function () {
    return view('biaya',['title'=>'Home Page']);
});
Route::get('/kontak', function () {
    return view('kontak',['title'=>'Kontak Page']);
});
Route::get('/biodata', function () {
    return view('biodata',['title'=>'User Page']);
});
Route::get('/berkas', function () {
    return view('berkas',['title'=>'User Page']);
});
Route::get('/dulang', function () {
    return view('dulang',['title'=>'User Page']);
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
