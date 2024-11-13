<?php

namespace App\Models;
use Illuminate\Support\Arr;

Class Post{
 public static function all(){
    return[
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
        ]
    ];
 }

 public static function find($id){
   return Arr::first(static::all(),function($post)use($id){
        return $post['id'] ==$id; //alasan menggunakan static untuk memanggil method lain, biasanya pakai this
        //penggunaan function bisa dengan arrow fn($post)=>$post['id'] ==$id;
    });
 }
}
