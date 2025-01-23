<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BiodataController extends Controller
{
    public function showData()
    {
        $catchUser = Auth::id();

        $all_data = DB::table('users')
        
        ->join('ortu', 'users.id_user', '=', 'ortu.id_user')
        ->select('users.name', 'users.alamat', 'users.nisn', 'users.gender', 
        'users.tmpt_lahir', 'users.tgl_lahir', 'users.asl_sekolah','users.id_user', 
        'nmr_kk', 'nm_ayah', 'nik_ayah', 'tgl_lhr_ayah', 'tmpt_lhr_ayah','almt_ayah',
        'pekerjaan_ayah','nmr_ayah_wa','nm_ibu','nik_ibu','tgl_lhr_ibu','tmpt_lhr_ibu',
        'almt_ibu','pekerjaan_ibu', 'nmr_ibu_wa')
        ->where('users.id_user', '=', $catchUser)
        ->first();
          
//kurang nik

        return view('calonMurid.biodata', compact('all_data',), ['title' => 'test']);
    }

}
