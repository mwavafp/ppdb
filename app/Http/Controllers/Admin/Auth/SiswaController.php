<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Models\Tahun; // Pastikan mengimpor model Tahun jika diperlukan
use App\Http\Controllers\Controller;
use App\Imports\DataSiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Termwind\Components\Dd;

class SiswaController extends Controller
{
    // public function siswa(Request $request)
    // {

    //     $search = $request->input('search', '');
    //     $gender = $request->input('gender', '');
    //     $status = $request->input('status', '');
    //     $status = $request->input('status', '');

    //     // Query dasar dengan filter pencarian
    //     $query = User::with(['ortu', 'userUnitPendidikan', 'ortu']);
    //     $query = User::select('users.*', 'admins.name as nama_admin')
    //     ->leftJoin('admins', 'users.updated_by', '=', 'admins.id_admin');

    //     $query = User::join('tahun', function ($join) {

    //     })
    //     ->select('users.*', 'tahun.awal', 'tahun.akhir');
    //     if (!empty($search)) {
    //         $query->where('name', 'like', "%{$search}%")
    //             ->orWhere('alamat', 'like', "%{$search}%");
    //         $query->where('users.name', 'like', "%{$search}%")
    //             ->orWhere('users.alamat', 'like', "%{$search}%");
    //     }

    //     // Menambahkan filter berdasarkan gender jika ada
    //     if (!empty($gender)) {
    //         $query->where('gender', $gender);
    //         $query->where('users.gender', $gender);
    //     }

    //     // Menambahkan filter berdasarkan status jika ada
    //     if (!empty($status)) {
    //         $query->where('status', $status);
    //         $query->where('users.status', $status);
    //     }

    //     $query->whereBetween('users.created_at', [
    //         DB::raw('tahun.awal'),
    //         DB::raw('tahun.akhir')
    //     ]);
    //     // Ambil data siswa dengan pagination (halaman 10 data per halaman)
    //     $siswa = $query->paginate(10);
    //     // dd($query->toSql(), $query->getBindings());s
    //     return view('admin.page.siswa', [
    //     'title' => 'DataSiswa',
    //     'all_data' => $siswa,
    // ]);
    // }

    public function siswa(Request $request)
    {
        // Ambil filter dari request
        $search = $request->input('search', '');
        $gender = $request->input('gender', '');
        $status = $request->input('status', '');

        // Ambil data tahun aktif
        $tahun = DB::table('tahun')->orderByDesc('id_tahun')->first();

        $query = DB::table('users')
            ->leftJoin('user_golongan', 'users.id_user', '=', 'user_golongan.id_user')
            ->leftJoin('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->leftJoin('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->leftJoin('admins', 'users.updated_by', '=', 'admins.id_admin')
            ->leftJoin('ortu', 'users.id_user', '=', 'ortu.id_user')
            ->leftJoin('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->select(
                'users.*',
                'admins.name as nama_admin',
                'kelas.kelas',
                'kelas.unt_pendidikan',
                'seleksi.status_seleksi',

                // Data lengkap ortu
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
                'ortu.nmr_ibu_wa'
            );

        // Filter berdasarkan tahun jika ada
        if ($tahun) {
            $query->whereBetween('users.created_at', [$tahun->awal, $tahun->akhir]);
        }

        // Filter pencarian nama/alamat
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('users.name', 'like', "%{$search}%")
                    ->orWhere('users.alamat', 'like', "%{$search}%");
            });
        }

        // Filter gender
        if (!empty($gender)) {
            $query->where('users.gender', '=', $gender);
        }

        // Filter status
        if (!empty($status)) {
            $query->where('users.status', '=', $status);
        }

        // Paginate hasil
        $siswa = $query->paginate(10);

        return view('admin.page.siswa', [
            'title' => 'Data Siswa',
            'all_data' => $siswa,
        ]);
    }


    public function update(Request $request, $id_user)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nisn' => 'required|string|max:20',
            'gender' => 'required|in:laki-laki,perempuan',
            'tmpt_lahir' => 'nullable|string|max:255',
            'tgl_lahir' => 'nullable|date',
            'asl_sekolah' => 'nullable|string|max:255',
            'status' => 'required|in:aktif,tidak_aktif',
            'email' => 'nullable|email|max:255',
            'nm_ayah' => 'nullable|string|max:255',
            'nmr_kk' => 'nullable|string|max:20',
            'nik_ayah' => 'nullable|string|max:20',
            'tgl_lhr_ayah' => 'nullable|date',
            'tmpt_lhr_ayah' => 'nullable|string|max:255',
            'almt_ayah' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'nmr_ayah_wa' => 'nullable|string|max:20',
            'nm_ibu' => 'nullable|string|max:255',
            'nik_ibu' => 'nullable|string|max:20',
            'tgl_lhr_ibu' => 'nullable|date',
            'tmpt_lhr_ibu' => 'nullable|string|max:255',
            'almt_ibu' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'nmr_ibu_wa' => 'nullable|string|max:20',
        ]);

        // Cari data user berdasarkan id_user
        $user = User::findOrFail($id_user);

        // Update data user
        $user->update([
            'name' => $request->input('name'),
            'alamat' => $request->input('alamat'),
            'nisn' => $request->input('nisn'),
            'gender' => $request->input('gender'),
            'tmpt_lahir' => $request->input('tmpt_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'asl_sekolah' => $request->input('asl_sekolah'),
            'status' => $request->input('status'),
            'email' => $request->input('email'),
            'updated_by' => auth('admin')->id(),

        ]);

        // Jika data ortu ada, update data ortu
        if ($user->ortu) {
            $user->ortu->update([
                'nmr_kk' => $request->input('nmr_kk'),
                'nm_ayah' => $request->input('nm_ayah'),
                'nik_ayah' => $request->input('nik_ayah'),
                'tgl_lhr_ayah' => $request->input('tgl_lhr_ayah'),
                'tmpt_lhr_ayah' => $request->input('tmpt_lhr_ayah'),
                'almt_ayah' => $request->input('almt_ayah'),
                'pekerjaan_ayah' => $request->input('pekerjaan_ayah'),
                'nmr_ayah_wa' => $request->input('nmr_ayah_wa'),
                'nm_ibu' => $request->input('nm_ibu'),
                'nik_ibu' => $request->input('nik_ibu'),
                'tgl_lhr_ibu' => $request->input('tgl_lhr_ibu'),
                'tmpt_lhr_ibu' => $request->input('tmpt_lhr_ibu'),
                'almt_ibu' => $request->input('almt_ibu'),
                'pekerjaan_ibu' => $request->input('pekerjaan_ibu'),
                'nmr_ibu_wa' => $request->input('nmr_ibu_wa'),
            ]);
        }
        // Redirect atau kembalikan response setelah update
        return redirect()->route('siswa')->with('success', 'Data Siswa Berhasil Diperbarui!');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new DataSiswaImport, $request->file('file'));
            return response()->json(['message' => 'Data berhasil diimport.'], 200);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validasi gagal.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
}
