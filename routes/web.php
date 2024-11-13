<?php
use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\alert;

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
    return view('kontak',['title'=>'Home Page']);
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