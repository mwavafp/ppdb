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
        $students = DB::table('users')
            ->join('kelas', 'users.id_user', '=', 'kelas.id_kelas')
            ->select(
                'users.name',
                'kelas.kelas',
                'kelas.kls_identitas',
                'kelas.unt_pendidikan',
                'kelas.kls_status',
                'kelas.id_kelas'
            )
            ->paginate(10);

        return view('admin.page.pembagiankelas', compact('students'), ['title' => 'test']);
    }

    /**
     * Show the form for editing a specific resource.
     */
    public function edit($id)
    {
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

        return view('admin.page.modal.edit_pembagian_kelas', compact('students'), ['title' => 'test']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kelas' => 'required|in:-,1,2,3,4,5,6,7,8,9,10,11,12',
            'kls_identitas' => 'required|in:-,A,B,C,D,E,F',
            'unt_pendidikan' => 'required|in:tk,sd,smp,sma,tpq,madin,pondok',
            'kls_status' => 'required|in:Belum Ditentukan,Lolos,Tidak Lolos',
        ]);

        DB::table('kelas')
            ->where('id_kelas', '=', $id)
            ->update([

                'kelas' => $validatedData['kelas'],
                'kls_identitas' => $validatedData['kls_identitas'],
                'kls_status' => $validatedData['kls_status'],
            ]);

        return redirect()->route('pembagiankelas')->with('success', 'Data berhasil diperbarui!', ['title' => 'test']);
    }

    /**
     * Search for specific resources.
     */
    public function search(Request $request)
    {
        $search = $request->search;

        $students = DB::table('users')
            ->join('kelas', 'users.id_user', '=', 'kelas.id_kelas')
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

        return view('admin.page.pembagiankelas', compact('students'), ['title' => 'test']);
    }

    /**
     * Filter resources based on specific criteria.
     */
    public function filter(Request $request)
{
    $query = DB::table('users')
        ->join('kelas', 'users.id_user', '=', 'kelas.id_kelas')
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
