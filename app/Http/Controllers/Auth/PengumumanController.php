<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
    public function showDatasma()
    {
        // Mengambil ID user yang sedang login

        // Tentukan status seleksi (misalnya 'lolos')
        $lolos = 'lolos';  // Anda bisa mengganti dengan nilai status yang sesuai

        // Mengambil data pengguna yang lolos seleksi
        $all_data = DB::table('users')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi')
            ->where('seleksi.status_seleksi', '=', $lolos)  // Menyaring berdasarkan status seleksi
            // Menyaring berdasarkan ID pengguna yang sedang login
            ->paginate(10);


        // Mengirim data ke tampilan
        return view('frontPage.pengumumansma', compact('all_data'), ['title' => 'Pengumuman SMA']);
    }
}
