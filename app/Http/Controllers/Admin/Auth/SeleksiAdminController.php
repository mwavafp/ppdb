<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeleksiAdminController extends Controller
{
    public function showData(Request $request)
    {
        $query = DB::table('users')
            ->join('pembayaran', 'users.id_user', '=', 'pembayaran.id_bayar')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_bayar')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->leftJoin('berkas', 'users.id_user', '=', 'berkas.id_user')
            ->leftJoin('admins', 'berkas.updated_by', '=', 'admins.id_admin')
            ->whereBetween('users.created_at', [
                DB::raw('(SELECT awal FROM tahun LIMIT 1)'),
                DB::raw('(SELECT akhir FROM tahun LIMIT 1)')
            ])
            ->select(
                'users.id_user',
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
                'berkas.akta_lahir as status_akta',
                'berkas.updated_at',
                'admins.name as nama_admin',
                'pembayaran.byr_dft_ulang',
                'seleksi.status_seleksi',
            );

        if ($request->filled('status')) {
            $query->where('seleksi.status_seleksi', $request->status);
        }

        if ($request->filled('jenjang')) {
            $query->where('kelas.unt_pendidikan', $request->jenjang);
        }

        $data = $query->paginate(10);

        return view('admin.page.seleksi', compact('data'), ['title' => 'Seleksi Siswa']);
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $data = DB::table('users')
            ->join('pembayaran', 'users.id_user', '=', 'pembayaran.id_user')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->leftJoin('berkas', 'users.id_user', '=', 'berkas.id_user')
            ->leftJoin('admins', 'berkas.updated_by', '=', 'admins.id_admin')
            ->select(
                'users.id_user',
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
                'berkas.updated_at',
                'admins.name as nama_admin',
                'berkas.akta_lahir as status_akta',
                'pembayaran.byr_dft_ulang',
                'seleksi.status_seleksi'
            )
            ->where('users.name', 'LIKE', "%{$search}%")
            ->orWhere('users.nisn', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('admin.page.seleksi', compact('data'), ['title' => 'Search Results']);
    }

    public function filter(Request $request)
    {
        $query = DB::table('users')
            ->join('pembayaran', 'users.id_user', '=', 'pembayaran.id_user')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->leftJoin('berkas', 'users.id_user', '=', 'berkas.id_user')
            ->leftJoin('admins', 'berkas.updated_by', '=', 'admins.id_admin')
            ->select(
                'users.id_user',
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
                'berkas.akta_lahir as status_akta',
                'berkas.updated_at',
                'admins.name as nama_admin',
                'pembayaran.byr_dft_ulang',
                'seleksi.status_seleksi'
            );

        if ($request->filled('jenjang')) {
            $query->where('kelas.unt_pendidikan', $request->jenjang);
        }

        if ($request->filled('status')) {
            $query->where('seleksi.status_seleksi', $request->status);
        }

        $data = $query->paginate(10);
        $data->appends($request->all());

        return view('admin.page.seleksi', compact('data'), ['title' => 'Filtered Results']);
    }

    public function editData($id)
    {
        $data = DB::table('users')
            ->join('pembayaran', 'users.id_user', '=', 'pembayaran.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->leftJoin('berkas', 'users.id_user', '=', 'berkas.id_user')
            ->leftJoin('admins', 'berkas.updated_by', '=', 'admins.id_admin')

            ->select(
                'user_unit_pendidikan.id_user',
                'seleksi.id_user',
                'kelas.id_kelas',
                'users.id_user',
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
                'berkas.akta_lahir as status_akta',
                'berkas.updated_by',
                'berkas.updated_at',
                'pembayaran.byr_dft_ulang',
                'seleksi.status_seleksi as status_seleksi',
                'admins.name as nama_admin',

            )
            ->where('users.id_user', $id)
            ->first();

        if (!$data) {
            return redirect()->route('seleksi.index')->with('error', 'Data siswa tidak ditemukan.');
        }

        return view('admin.page.modal.edit_seleksi', compact('data'), ['title' => 'Edit Data']);
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'kelas' => 'required|integer|min:1',
    //         'status_seleksi' => 'required|string|max:20',
    //         'status_kk' => 'required|string', // pastikan validasi untuk berkas
    //         'status_ijazah_akhir' => 'required|string',
    //         'status_pas_foto' => 'required|string',
    //         'status_kip' => 'required|string',
    //         'status_akta' => 'required|string',
    //         'status' => 'required|string',
    //     ]);

    //     $update1 = DB::table('kelas as k1')
    //         ->join('user_unit_pendidikan as uup', 'uup.id_kelas', '=', 'k1.id_kelas')
    //         ->where('uup.id_user', $id) // Menggunakan id_user dari tabel user_unit_pendidikan
    //         ->update([
    //             'k1.kelas' => $request->kelas, // Update kolom kelas pada tabel k1
    //         ]);


    //     // Update status seleksi
    //     $update2 = DB::table('seleksi')->where('id_user', $id)->update([
    //         'status_seleksi' => $request->status_seleksi,
    //     ]);
    //     $update4 = DB::table('users')->where('id_user', $id)->update([
    //         'status' => $request->status,
    //     ]);

    //     // Update status berkas
    //     $update3 = DB::table('berkas')->where('id_user', $id)->update([
    //         'kk' => $request->status_kk,
    //         'ijazah_akhir' => $request->status_ijazah_akhir,
    //         'pas_foto' => $request->status_pas_foto,
    //         'kip' => $request->status_kip,
    //         'akta_lahir' => $request->status_akta,
    //         'updated_by' => auth('admin')->id(),
    //         'updated_at' => now(),
    //     ]);

    //     if ($update1 || $update2 || $update3 || $update4) {
    //         // Jika salah satu update berhasil
    //         return redirect()->route('seleksi.index')->with('success', 'Data berhasil Diperbarui!');
    //     } else {
    //         // Jika tidak ada baris yang diperbarui
    //         return redirect()->route('seleksi.index')->with('error', 'Tidak ada perubahan data.');
    //     }
    // }

    public function update(Request $request, $id)
{
    $request->validate([
        'kelas' => 'required|integer|min:1',
        'status_seleksi' => 'required|string|max:20',
        'status_kk' => 'required|string',
        'status_ijazah_akhir' => 'required|string',
        'status_pas_foto' => 'required|string',
        'status_kip' => 'required|string',
        'status_akta' => 'required|string',
        'status' => 'required|string', // tambahkan validasi status user jika perlu
    ]);

    // Cari id_kelas berdasarkan id_user lewat join user_golongan dan user_unit_pendidikan
    $idKelas = DB::table('user_golongan as ug')
        ->join('user_unit_pendidikan as uup', 'ug.id_uup', '=', 'uup.id_uup')
        ->where('ug.id_user', $id)
        ->value('uup.id_kelas');

    if ($idKelas) {
        // Update kelas di tabel kelas
        DB::table('kelas')
            ->where('id_kelas', $idKelas)
            ->update(['kelas' => $request->kelas]);
    } else {
        // Jika id_kelas tidak ditemukan, kamu bisa handle error di sini
        return redirect()->route('seleksi.index')->with('error', 'Data kelas tidak ditemukan untuk user ini.');
    }

    // Update status seleksi
    $updateSeleksi = DB::table('seleksi')
        ->where('id_user', $id)
        ->update(['status_seleksi' => $request->status_seleksi]);

    // Update status user
    $updateUser = DB::table('users')
        ->where('id_user', $id)
        ->update(['status' => $request->status]);

    // Update status berkas
    $updateBerkas = DB::table('berkas')
        ->where('id_user', $id)
        ->update([
            'kk' => $request->status_kk,
            'ijazah_akhir' => $request->status_ijazah_akhir,
            'pas_foto' => $request->status_pas_foto,
            'kip' => $request->status_kip,
            'akta_lahir' => $request->status_akta,
            'updated_by' => auth('admin')->id(),
            'updated_at' => now(),
        ]);

    if ($updateSeleksi || $updateUser || $updateBerkas) {
        return redirect()->route('seleksi.index')->with('success', 'Data berhasil diperbarui!');
    } else {
        return redirect()->route('seleksi.index')->with('error', 'Tidak ada perubahan data.');
    }
}
}
