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

        $biaya_murid = DB::table('harga')
            ->join('user_golongan', 'harga.id_harga', '=', 'user_golongan.id_harga')  // Pastikan 'harga' di-join dengan 'user_golongan'
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')  // Join 'users' dengan 'user_golongan'
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('pembayaran', 'users.id_user', '=', 'pembayaran.id_user')
            ->select(
                'pembayaran.byr_dft_ulang',
                'pembayaran.jmlh_byr',
                'harga.total_bayar_daful',
                'harga.dp_daful',
                'harga.diskon'
            )
            ->where('users.id_user', '=', $catchUser)
            ->get();

        return view('calonMurid.pembayaran', compact('all_data', 'biaya_murid'), ['title' => 'Daftar Ulang']);
    }
}
