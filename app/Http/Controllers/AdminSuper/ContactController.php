<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function showData()
    {
        // Ambil data untuk id 1 sampai 6 secara individual
        $data1 = DB::table('contact')
            ->join('kelas', 'contact.id_contact', '=', 'kelas.id_kelas')
            ->where('contact.id_contact', 1)
            ->select('contact.id_contact', 'contact.nama', 'contact.cp', 'kelas.unt_pendidikan')
            ->first();

        $data2 = DB::table('contact')
            ->join('kelas', 'contact.id_contact', '=', 'kelas.id_kelas')
            ->where('contact.id_contact', 2)
            ->select('contact.id_contact', 'contact.nama', 'contact.cp', 'kelas.unt_pendidikan')
            ->first();

        $data3 = DB::table('contact')
            ->join('kelas', 'contact.id_contact', '=', 'kelas.id_kelas')
            ->where('contact.id_contact', 3)
            ->select('contact.id_contact', 'contact.nama', 'contact.cp', 'kelas.unt_pendidikan')
            ->first();

        $data4 = DB::table('contact')
            ->join('kelas', 'contact.id_contact', '=', 'kelas.id_kelas')
            ->where('contact.id_contact', 4)
            ->select('contact.id_contact', 'contact.nama', 'contact.cp', 'kelas.unt_pendidikan')
            ->first();

        $data5 = DB::table('contact')
            ->join('kelas', 'contact.id_contact', '=', 'kelas.id_kelas')
            ->where('contact.id_contact', 5)
            ->select('contact.id_contact', 'contact.nama', 'contact.cp', 'kelas.unt_pendidikan')
            ->first();

        $data6 = DB::table('contact')
            ->join('kelas', 'contact.id_contact', '=', 'kelas.id_kelas')
            ->where('contact.id_contact', 6)
            ->select('contact.id_contact', 'contact.nama', 'contact.cp', 'kelas.unt_pendidikan')
            ->first();

        return view('superAdmin.pengaturanCp', [
            'title' => 'pengaturan-cp',
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'data6' => $data6,
        ]);
    }

    public function createData(Request $request)
    {
        DB::table('contact')->insert([
            'nama' => $request->nama,
            'cp' => $request->cp,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return to_route('admin.pengaturanCp');
    }

    public function updateData(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'cp' => 'required|string|max:255',
        ]);

        DB::table('contact')
            ->where('id_contact', $id)
            ->update([
                'nama' => $request->nama,
                'cp' => $request->cp,
                'updated_at' => now(),
            ]);

        return redirect()->route('admin.pengaturanCp')->with('success', 'Data berhasil diperbarui.');
    }
}
