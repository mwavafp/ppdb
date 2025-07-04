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

        $users = DB::table('users')
            ->join('user_golongan', 'users.id_user', '=', 'user_golongan.id_user')
            ->join('acara', 'user_golongan.id_acara', '=', 'acara.id_acara')
            ->join('harga', 'user_golongan.id_harga', '=', 'harga.id_harga')
            ->join('berkas', 'users.id_user', '=', 'berkas.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('pembayaran', 'user_unit_pendidikan.id_bayar', '=', 'pembayaran.id_bayar') // ← sekarang aman
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->where('user_golongan.id_user', '=', $catchUser)
            ->select(
                'acara.akhir_acara',
                'berkas.kk',
                'berkas.akta_lahir',
                'users.name',
                'users.alamat',
                'users.nisn',
                'users.id_user',
                'kelas.unt_pendidikan',
                'kelas.kls_identitas',
                'kelas.kelas',
                'pembayaran.byr_dft_ulang'
            )
            ->get();
        $kelasUser = DB::table('user_unit_pendidikan')
            ->join('user_golongan', 'user_unit_pendidikan.id_uup', '=', 'user_golongan.id_uup')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->where('user_golongan.id_user', '=', $catchUser)
            ->select('kelas.*') // ambil semua info kelas
            ->get();

        // Mengirim data ke view
        return view('calonMurid.verifikasi', compact('users', 'kelasUser'))->with('title', 'Verifikasi Data');
    }
}
