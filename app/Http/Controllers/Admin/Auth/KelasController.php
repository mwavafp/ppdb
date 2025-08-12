<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showData()
    {
        $adminUnit = auth('admin')->user()->unit;
        $students = DB::table('user_golongan')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')

            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')

            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])

            // Kalau bukan super, filter unit pendidikan
            ->when($adminUnit !== 'super', function ($query) use ($adminUnit) {
                $query->where('kelas.unt_pendidikan', $adminUnit);
            })
            ->select(
                'users.name',
                'kelas.kelas',
                'kelas.kls_identitas',
                'kelas.unt_pendidikan',
                'kelas.kls_status',
                'kelas.id_kelas'
            )
            ->orderBy('users.name')
            ->paginate(10);
        // dd($students);

        return view('admin.page.pembagiankelas', compact('students'), ['title' => 'test']);
    }

    /**
     * Show the form for editing a specific resource.
     */
    public function edit($id)
    {
        // Mengambil data kelas berdasarkan ID kelas
        $student = DB::table('kelas')
            ->join('users', 'kelas.id_kelas', '=', 'users.id_user')
            ->select(
                'users.name',
                'kelas.kelas',
                'kelas.kls_identitas',
                'kelas.unt_pendidikan',
                'kelas.kls_status',
                'kelas.id_kelas'
            )
            ->where('kelas.id_kelas', '=', $id)
            ->first();

        // Pastikan jika data ditemukan
        if (!$student) {
            return redirect()->route('pembagiankelas');
        }

        return view('admin.page.modal.edit_pembagian_kelas', compact('student'), ['title' => 'Edit Pembagian Kelas']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'kelas' => 'required|in:-,1,2,3,4,5,6,7,8,9,10,11,12',
            'kls_identitas' => 'required|in:-,A,B,C,D,E,F',

        ]);

        // Pastikan update pada kelas yang benar berdasarkan id_kelas
        DB::table('kelas')
            ->where('id_kelas', '=', $id)  // Memperbaiki ID yang digunakan
            ->update([
                'kelas' => $validated['kelas'],
                'kls_identitas' => $validated['kls_identitas'], // Menambahkan 'unt_pendidikan' untuk pembaruan

            ]);

        // Redirect dengan pesan sukses setelah pembaruan
        return redirect()->route('pembagiankelas')->with('success', 'Data Berhasil Diperbarui!');
    }

    /**
     * Search for specific resources.
     */
    public function search(Request $request)
    {
        $search = $request->search;
        $adminUnit = auth('admin')->user()->unit;
        $students = DB::table('users')
            ->join('kelas', 'users.id_user', '=', 'kelas.id_kelas')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            // Kalau bukan super, filter unit pendidikan
            ->when($adminUnit !== 'super', function ($query) use ($adminUnit) {
                $query->where('kelas.unt_pendidikan', $adminUnit);
            })
            ->select(
                'users.name',
                'kelas.kelas',
                'kelas.kls_identitas',
                'kelas.unt_pendidikan',
                'kelas.kls_status',
                'kelas.id_kelas'
            )
            ->where('users.name', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('admin.page.pembagiankelas', compact('students'), ['title' => 'Search Results']);
    }

    /**
     * Filter resources based on specific criteria.
     */
    public function filter(Request $request)
    {
        $adminUnit = auth('admin')->user()->unit;
        $query = DB::table('users')
            ->join('kelas', 'users.id_user', '=', 'kelas.id_kelas')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            // Kalau bukan super, filter unit pendidikan
            ->when($adminUnit !== 'super', function ($query) use ($adminUnit) {
                $query->where('kelas.unt_pendidikan', $adminUnit);
            })
            ->select(
                'users.name',
                'kelas.kelas',
                'kelas.kls_identitas',
                'kelas.unt_pendidikan',
                'kelas.kls_status',
                'kelas.id_kelas'
            );

        // Tambahkan filter berdasarkan unit pendidikan jika ada
        if ($request->filled('unt_pendidikan')) {
            $query->where('kelas.unt_pendidikan', '=', $request->unt_pendidikan);
        }

        // Tambahkan filter berdasarkan status jika ada
        if ($request->filled('status')) {
            $query->where('kelas.kls_status', '=', $request->status);
        }

        // Ambil data dengan pagination
        $students = $query->paginate(10);

        // Pastikan parameter pencarian tetap pada link pagination
        $students->appends($request->all());

        return view('admin.page.pembagiankelas', compact('students'), ['title' => 'Search Results']);
    }
}
