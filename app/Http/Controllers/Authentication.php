<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authentication extends Controller
{
    public function index(){
        
        return view('/auth/login',['title'=>'Login Page']);
       
    }
    function login(Request $request){
        $request->validate([
            'email'=>'isRequired',
            'password'=>'isRequired'
        ],[
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi'
        ]);

        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt()){
            echo 'sukses';
            exit();
        }else{
            return redirect('')->withErrors('username gak sesuai')->withInput();
        }

    }
}
