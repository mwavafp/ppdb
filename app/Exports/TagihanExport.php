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
        $adminUnit = auth('admin')->user()->unit;
        $all_data = DB::table('user_golongan')
            ->join('harga', 'user_golongan.id_harga', '=', 'harga.id_harga')  // Pastikan 'harga' di-join dengan 'user_golongan'
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')  // Join 'users' dengan 'user_golongan'
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('ortu', 'users.id_user', '=', 'ortu.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('pembayaran', 'user_unit_pendidikan.id_bayar', '=', 'pembayaran.id_bayar')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])

            // Kalau bukan super, filter unit pendidikan
            ->when($adminUnit !== 'super', function ($query) use ($adminUnit) {
                $query->where('kelas.unt_pendidikan', $adminUnit);
            })
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
