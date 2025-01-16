<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DaftarUlangController extends Controller
{
    public function showData()
    {
        $catchUser = Auth::id();
        $all_data = DB::table('pembayaran')
            ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.id_user', 'pembayaran.id_bayar', 'kelas.unt_pendidikan', 'kelas.kls_status', 'pembayaran.byr_dft_ulang', 'pembayaran.status', 'pembayaran.jmlh_byr')
            ->where('users.id_user', '=', $catchUser)
            ->first();


        return view('calonMurid.pembayaran', compact('all_data',), ['title' => 'Daftar Ulang']);
    }
}
