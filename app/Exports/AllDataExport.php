<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AllDataExport implements FromCollection, WithHeadings
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
            ->join('ortu', 'users.id_user', '=', 'ortu.id_user')
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
                'users.alamat',
                'users.nisn',
                'users.gender',
                'users.tmpt_lahir',
                'users.tgl_lahir',
                'users.asl_sekolah',
                'users.tipe_siswa',
                'users.status',

                'ortu.nmr_kk',
                'ortu.nm_ayah',
                'ortu.nik_ayah',
                'ortu.tgl_lhr_ayah',
                'ortu.tmpt_lhr_ayah',
                'ortu.almt_ayah',
                'ortu.pekerjaan_ayah',
                'ortu.nmr_ayah_wa',
                'ortu.nm_ibu',
                'ortu.nik_ibu',
                'ortu.tgl_lhr_ibu',
                'ortu.tmpt_lhr_ibu',
                'ortu.almt_ibu',
                'ortu.pekerjaan_ibu',
                'ortu.nmr_ibu_wa',

                'kelas.unt_pendidikan',
                'kelas.kelas',
                'kelas.kls_identitas',
                'kelas.kls_status',

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
            'Alamat',
            'NISN',
            'Jenis_Kelamin',
            'Tempat_Lahir',
            'Tanggal_Lahir',
            'Asal_Sekolah',
            'Tipe_Siswa',
            'Status_Siswa',

            'Nomor_KK',
            'Nama_Ayah',
            'NIK_Ayah',
            'Tanggal_Lahir_Ayah',
            'Tempat_Lahir_Ayah',
            'Alamat_Ayah',
            'Pekerjaan_Ayah',
            'Nomor_WA_Ayah',
            'Nama_Ibu',
            'NIK_Ibu',
            'Tanggal_Lahir_Ibu',
            'Tempat_Lahir_Ibu',
            'Alamat_Ibu',
            'Pekerjaan_Ibu',
            'Nomor_WA_Ibu',

            'Jenjang_Pendidikan',
            'Kelas',
            'Group_Kelas',
            'Status_Kelas',

            'Tipe_Pembayaran',
            'Status_Pembayaran',
            'Jumlah_Bayar',
        ];
    }
}
