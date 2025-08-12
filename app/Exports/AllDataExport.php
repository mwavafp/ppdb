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
        $adminUnit = auth('admin')->user()->unit;
        $all_data = DB::table('user_golongan')
            ->join('harga', 'user_golongan.id_harga', '=', 'harga.id_harga')  // Pastikan 'harga' di-join dengan 'user_golongan'
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')  // Join 'users' dengan 'user_golongan'
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('ortu', 'users.id_user', '=', 'ortu.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('berkas', 'users.id_user', '=', 'berkas.id_user')
            ->join('pembayaran', 'user_unit_pendidikan.id_bayar', '=', 'pembayaran.id_bayar')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])

            // Kalau bukan super, filter unit pendidikan
            ->when($adminUnit !== 'super', function ($query) use ($adminUnit) {
                $query->where('kelas.unt_pendidikan', $adminUnit);
            })
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

                'berkas.kk',
                'berkas.pas_foto',
                'berkas.ijazah_akhir',
                'berkas.kip',
                'berkas.akta_lahir',

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
            'Nama Lengkap',
            'Alamat',
            'NISN',
            'Jenis Kelamin',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Asal Sekolah',
            'Tipe Siswa',
            'Status Siswa',

            'Nomor KK',
            'Nama Ayah',
            'NIK Ayah',
            'Tanggal Lahir Ayah',
            'Tempat Lahir Ayah',
            'Alamat Ayah',
            'Pekerjaan Ayah',
            'Nomor WA Ayah',
            'Nama Ibu',
            'NIK Ibu',
            'Tanggal Lahir Ibu',
            'Tempat Lahir Ibu',
            'Alamat Ibu',
            'Pekerjaan Ibu',
            'Nomor WA Ibu',

            'Kartu Keluarga',
            'Pas Foto',
            'Ijazah Akhir',
            'KIP',
            'Akta Lahir',

            'Jenjang Pendidikan',
            'Kelas',
            'Group Kelas',
            'Status Kelas',

            'Tipe Pembayaran',
            'Status Pembayaran',
            'Jumlah Bayar',
        ];
    }
}
