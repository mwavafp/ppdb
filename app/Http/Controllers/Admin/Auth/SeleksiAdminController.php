<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeleksiAdminController extends Controller
{
    public function showData()
    {
        // Mengambil data yang dibutuhkan dari tabel terkait, termasuk tabel berkas
        $data = DB::table('users')
            ->join('pembayaran', 'users.id_user', '=', 'pembayaran.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user') // Relasi user-unit pendidikan
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas') // Relasi ke kelas
            // Relasi ke kelas
            ->leftJoin('berkas', 'users.id_user', '=', 'berkas.id_user') // Relasi ke berkas (left join untuk data berkas opsional)
            ->whereBetween('users.created_at', [
                DB::raw('(SELECT awal FROM tahun LIMIT 1)'),  
                DB::raw('(SELECT akhir FROM tahun LIMIT 1)')  
            ])
            ->select(
                'users.name as nama',
                'users.nisn',
                'kelas.unt_pendidikan as jenjang',
                'kelas.kelas',
                'kelas.kls_identitas as kelas_identitas',
                'kelas.kls_status as status',
                'users.status as status_user',
                'berkas.kk as status_kk',
                'berkas.pas_foto as status_pas_foto',
                'berkas.ijazah_akhir as status_ijazah_akhir',
                'berkas.kip as status_kip',
                'pembayaran.byr_dft_ulang',
                'seleksi.status_seleksi'
                // 'berkas.srt_pernyataan as status_surat'
            )

            ->paginate(10); // Data dengan pagination

        return view('admin.page.seleksi', compact('data'), ['title' => 'Seleksi Siswa']);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = DB::table('users')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->leftJoin('berkas', 'users.id_user', '=', 'berkas.id_user')
            ->select(
                'users.name as nama',
                'users.nisn',
                'kelas.unt_pendidikan as jenjang',
                'kelas.kelas',
                'kelas.kls_identitas as kelas_identitas',
                'kelas.kls_status as status',
                'users.status as status_user',
                'berkas.kk as status_kk',
                'berkas.srt_pernyataan as status_surat'
            )
            ->where('users.name', 'LIKE', "%{$search}%")
            ->orWhere('users.nisn', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('admin.page.seleksi', compact('data'), ['title' => 'Search Results']);
    }

    public function filter(Request $request)
    {
        $filterCategory = [
            'jenjang' => 'kelas.unt_pendidikan',
            'status_user' => 'users.status',
            'kelas' => 'kelas.kelas'
        ];

        $query = DB::table('users')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->leftJoin('berkas', 'users.id_user', '=', 'berkas.id_user')
            ->select(
                'users.name as nama',
                'users.nisn',
                'kelas.unt_pendidikan as jenjang',
                'kelas.kelas',
                'kelas.kls_identitas as kelas_identitas',
                'kelas.kls_status as status',
                'users.status as status_user',
                'berkas.kk as status_kk',
                'berkas.srt_pernyataan as status_surat'
            );

        foreach ($filterCategory as $key => $value) {
            if ($request->filled($key)) {
                $query->where($value, 'LIKE', "%{$request->$key}%");
            }
        }

        // Ambil data dengan pagination
        $data = $query->paginate(10);
        $data->appends($request->all());

        return view('admin.page.seleksi', compact('data'), ['title' => 'Filtered Results']);
    }
}
