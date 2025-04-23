<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BiodataController extends Controller
{
    public function showData()
    {
        $catchUser = Auth::id();

        $all_data = DB::table('users')

            ->join('ortu', 'users.id_user', '=', 'ortu.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('contact', 'kelas.id_contact', '=', 'contact.id_contact')
            ->select(
                'users.name',
                'users.alamat',
                'users.nisn',
                'users.gender',
                'users.tmpt_lahir',
                'users.tgl_lahir',
                'users.asl_sekolah',
                'users.id_user',
                'nmr_kk',
                'nm_ayah',
                'nik_ayah',
                'tgl_lhr_ayah',
                'tmpt_lhr_ayah',
                'almt_ayah',
                'pekerjaan_ayah',
                'nmr_ayah_wa',
                'nm_ibu',
                'nik_ibu',
                'tgl_lhr_ibu',
                'tmpt_lhr_ibu',
                'almt_ibu',
                'pekerjaan_ibu',
                'nmr_ibu_wa',
                'contact.nama',
                'contact.cp'
            )
            ->where('users.id_user', '=', $catchUser)
            ->first();

        //kurang nik

        return view('calonMurid.biodata', compact('all_data',), ['title' => 'test']);
    }
    public function updateData(Request $request)
    {
        $userId = Auth::id();

        // Validasi (optional, bisa ditambah sesuai kebutuhan)
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nisn' => 'required|numeric',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Update data di tabel users
        DB::table('users')->where('id_user', $userId)->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'tmpt_lahir' => $request->tmpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'asl_sekolah' => $request->asl_sekolah,
        ]);

        // Update data di tabel ortu
        DB::table('ortu')->where('id_user', $userId)->update([
            'nmr_kk' => $request->nmr_kk,
            'nm_ayah' => $request->nm_ayah,
            'nik_ayah' => $request->nik_ayah,
            'tmpt_lhr_ayah' => $request->tmpt_lhr_ayah,
            'tgl_lhr_ayah' => $request->tgl_lhr_ayah,
            'almt_ayah' => $request->almt_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nmr_ayah_wa' => $request->nmr_ayah_wa,
            'nm_ibu' => $request->nm_ibu,
            'nik_ibu' => $request->nik_ibu,
            'tmpt_lhr_ibu' => $request->tmpt_lhr_ibu,
            'tgl_lhr_ibu' => $request->tgl_lhr_ibu,
            'almt_ibu' => $request->almt_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'nmr_ibu_wa' => $request->nmr_ibu_wa,
        ]);

        return redirect()->route('biodata')->with('success', 'Data berhasil diperbarui!');
    }
}
