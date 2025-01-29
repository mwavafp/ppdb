<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $all_data = DB::table('pembayaran')
            ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select(
                'users.name',
                'kelas.unt_pendidikan',
                'pembayaran.byr_dft_ulang',
                'pembayaran.status',
                'pembayaran.jmlh_byr',
                'seleksi.status_seleksi'

            )
            ->whereBetween('users.created_at', [
                DB::raw('(SELECT awal FROM tahun LIMIT 1)'),
                DB::raw('(SELECT akhir FROM tahun LIMIT 1)')
            ])
            ->where('seleksi.status_seleksi', '=', 'LOLOS')->get();
        return $all_data;
    }
    // public function view(): View
    // {

    //     $all_data = DB::table('pembayaran')
    //         ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
    //         ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
    //         ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
    //         ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')

    //         ->select(
    //             'users.name',
    //             'pembayaran.id_bayar',
    //             'kelas.unt_pendidikan',
    //             'pembayaran.byr_dft_ulang',
    //             'pembayaran.status',
    //             'pembayaran.jmlh_byr',
    //             'seleksi.status_seleksi'
    //         )->get();
    //     return view('exports.admin.page.tagihan', [
    //         'all_data' => $all_data // Ambil data invoice atau sesuaikan dengan data Anda
    //     ], ['title' => 'Tagihan Admin']);
    // }
    public function headings(): array
    {
        return [
            'Nama_Lengkap',
            'Jenjang_Pendidikan',
            'Tipe_Pembayaran',
            'Jumlah_Tagihan',
            'Jumlah_Bayar',
            'Status'
        ];
    }
}
