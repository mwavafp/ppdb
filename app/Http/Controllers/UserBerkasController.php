<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserBerkasController extends Controller
{
    public function showData()
    {
        $catchUser = Auth::id();

        $all_data = DB::table('users')
            ->join('berkas', 'users.id_user', '=', 'berkas.id_user')
            ->select('users.name', 'users.id_user', 'kk', 'pas_foto', 'ijazah_akhir', 'kip')
            ->where('users.id_user', '=', $catchUser)
            ->first();
          


        return view('calonMurid.berkas', compact('all_data',), ['title' => 'test']);
    }

}
