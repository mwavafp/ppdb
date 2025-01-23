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
        $all_data = DB::table('user_unit_pendidikan')
            ->join('users', 'user_unit_pendidikan.id_user', '=', 'users.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'kelas.unt_pendidikan', 'users.alamat', 'users.nisn', 'kelas.unt_pendidikan', 'kelas.kelas')
            ->where('users.id_user', '=', $catchUser)
            ->get();


        // Mengirim data ke view
        return view('calonMurid.verifikasi', compact('all_data'))->with('title', 'Verifikasi Data');
    }
}
