<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser()
    {
        $all_user=User::count();
        return view('admin.page.dashboard',compact('all_user'),['title'=>'test']);
    }
}
