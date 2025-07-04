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
        $users = DB::table('users')
            ->join('user_golongan', 'users.id_user', '=', 'user_golongan.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->where('user_golongan.id_user', '=', $catchUser)
            ->select('users.name', 'users.id_user', 'kelas.unt_pendidikan')
            ->get();

        $gelombangs = DB::table('user_golongan')
            ->join('acara', 'user_golongan.id_acara', '=', 'acara.id_acara')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup') // tambahkan ini
            ->join('pembayaran', 'user_unit_pendidikan.id_bayar', '=', 'pembayaran.id_bayar')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->where('user_golongan.id_user', '=', $catchUser)
            ->select(
                'acara.id_acara',
                'kelas.kls_status',
                'pembayaran.byr_dft_ulang'
            )
            ->get();

        $pembayaran = DB::table('user_golongan')
            ->join('harga', 'user_golongan.id_harga', '=', 'harga.id_harga')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup') // tambahkan ini
            ->join('pembayaran', 'user_unit_pendidikan.id_bayar', '=', 'pembayaran.id_bayar')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->where('user_golongan.id_user', '=', $catchUser)
            ->select('kelas.unt_pendidikan', 'harga.dp_daful', 'pembayaran.jmlh_byr', 'harga.total_bayar_daful')
            ->get();

        return view('calonMurid.pembayaran', compact('users', 'gelombangs', 'pembayaran'), ['title' => 'Daftar Ulang']);
    }
}
