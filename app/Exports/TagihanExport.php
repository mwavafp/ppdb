<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TagihanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $all_data = DB::table('harga')
            ->join('user_golongan', 'harga.id_harga', '=', 'user_golongan.id_harga')  // Pastikan 'harga' di-join dengan 'user_golongan'
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')  // Join 'users' dengan 'user_golongan'
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('pembayaran', 'users.id_user', '=', 'pembayaran.id_user')
            // ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            // ->join('users', 'user_golongan.id_user', '=', 'users.id_user')

            // ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')

            // ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->whereBetween('users.created_at', [
                DB::raw('(SELECT awal FROM tahun LIMIT 1)'),
                DB::raw('(SELECT akhir FROM tahun LIMIT 1)')
            ])
            ->select(
                'users.name',
                'kelas.unt_pendidikan',
                'kelas.kelas',
                'kelas.kls_identitas',
                'pembayaran.byr_dft_ulang',
                'pembayaran.status',
                'pembayaran.jmlh_byr',





            )->get();
        return $all_data;
    }

    public function headings(): array
    {
        return [
            'Nama_Lengkap',
            'Jenjang_Pendidikan',
            'Kelas',
            'Group',
            'Status_DP',
            'Tipe_Pembayaran',
            'Jumlah_Bayar',
        ];
    }
}
