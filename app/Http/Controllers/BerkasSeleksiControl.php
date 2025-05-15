<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BerkasSeleksiControl extends Controller
{
    public function showData()
    {
        $catchUser = Auth::id();
        // Ambil data dari tabel 'berkas' dan 'users' berdasarkan id_user tertentu (contoh untuk pengguna saat ini)
        $berkas = DB::table('berkas')
            ->join('users', 'berkas.id_user', '=', 'users.id_user') // Gabungkan dengan tabel users
            ->select(
                'users.name',             // Nama pengguna
                'users.nisn',             // NISN
                'berkas.kk',              // Status Kartu Keluarga
                'berkas.pas_foto',        // Status Pas Foto
                'berkas.ijazah_akhir',    // Status Ijazah
                'berkas.kip'              // Status KIP
            )
            ->where('users.id_user', '=', $catchUser) // Ganti sesuai konteks user login
            ->first();

        // Kirim data ke view
        return view('calonMurid.berkas', compact('berkas'));
    }
}
