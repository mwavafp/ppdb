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
        $user = DB::table('users')
            ->join('user_golongan', 'users.id_user', '=', 'user_golongan.id_user')
            ->join('harga', 'user_golongan.id_harga', '=', 'harga.id_harga')
            ->where('users.id_user', $catchUser)
            ->select('harga.total_bayar_daful', 'harga.dp_daful', 'harga.diskon', 'users.name', 'users.id_user')
            ->first();

        // $data_diri = DB::table('pembayaran')
        //     ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
        //     ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
        //     ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
        //     ->select('users.name', 'users.id_user', 'pembayaran.id_bayar', 'kelas.unt_pendidikan', 'kelas.kls_status', 'pembayaran.byr_dft_ulang', 'pembayaran.status', 'pembayaran.jmlh_byr')
        //     ->where('users.id_user', '=', $catchUser)
        //     ->get();
        $kelas_show = DB::table('user_unit_pendidikan')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')

            ->join('users', 'user_unit_pendidikan.id_user', '=', 'users.id_user')
            ->select('users.name', 'users.id_user', 'kelas.unt_pendidikan', 'kelas.kls_status')
            ->where('users.id_user', $catchUser)
            ->get();


        //
        $pembayaran_show = DB::table('pembayaran')
            ->where('id_user', $catchUser)
            ->select('id_bayar', 'byr_dft_ulang', 'status', 'jmlh_byr')
            ->get();
        $all_data = [];

        foreach ($pembayaran_show as $index => $pmb) {
            $all_data[] = (object)[
                'name' => $user->name ?? '-',
                'id_user' => $user->id_user ?? null,
                'id_bayar' => $pmb->id_bayar,
                'unt_pendidikan' => $kelas_show[$index]->unt_pendidikan ?? '-',
                'kls_status' => $kelas_show[$index]->kls_status ?? '-',
                'byr_dft_ulang' => $pmb->byr_dft_ulang,
                'status' => $pmb->status,
                'jmlh_byr' => $pmb->jmlh_byr,
            ];
        }

        //Batas
        $kelas = DB::table('user_unit_pendidikan')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->where('user_unit_pendidikan.id_user', $catchUser)
            ->select('kelas.unt_pendidikan')
            ->get();

        $pembayaran = DB::table('pembayaran')
            ->where('id_user', $catchUser)
            ->get();




        $biaya_murid = [];

        foreach ($pembayaran as $index => $pmb) {
            $biaya_murid[] = (object)[
                'unt_pendidikan' => $kelas[$index]->unt_pendidikan ?? '-',
                'dp_daful' => $user->dp_daful,
                'jmlh_byr' => $pmb->jmlh_byr,
                'total_bayar_daful' => $user->total_bayar_daful,
            ];
        }

        return view('calonMurid.pembayaran', compact('all_data', 'biaya_murid'), ['title' => 'Daftar Ulang']);
    }
}
