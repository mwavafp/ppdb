<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VerifikasiController extends Controller
{
    public function showData()
    {
        // Mendapatkan ID pengguna yang sedang login
        $catchUser = Auth::id();

        // Mengambil data verifikasi siswa berdasarkan ID pengguna yang sedang login
        $all_data = DB::table('users')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'kelas.unt_pendidikan', 'users.alamat', 'users.nisn', 'kelas.unt_pendidikan', 'kelas.kelas', 'kelas.kls_identitas')
            ->where('users.id_user', '=', $catchUser)
            ->first();

        $seleksi_user = DB::table('berkas')
            ->join('users', 'berkas.id_user', '=', 'users.id_user')
            ->join('pembayaran', 'users.id_user', 'pembayaran.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('berkas.kk', 'berkas.akta_lahir', 'pembayaran.byr_dft_ulang')
            ->where('users.id_user', '=', $catchUser)
            ->first();

        $gelombang_user = DB::table('acara')
            ->join('user_golongan', 'acara.id_acara', '=', 'user_golongan.id_acara')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->select('acara.akhir_acara')
            ->where('users.id_user', '=', $catchUser)
            ->first();
        // Mengirim data ke view
        return view('calonMurid.verifikasi', compact('all_data', 'seleksi_user', 'gelombang_user'))->with('title', 'Verifikasi Data');
    }
}
