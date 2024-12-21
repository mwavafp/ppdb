<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kelas;  // Pastikan model yang sesuai digunakan
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    // Menampilkan daftar pembagian kelas
    public function index()
    {
        $students = Kelas::all(); // Ambil semua data siswa dari model User
        return view('admin.page.pembagiankelas', compact('students')); // Kirim ke view
    }

    // Update status kelas berdasarkan id
    public function updateStatus(Request $request, $id)
    {
        $user = Kelas::find($id);  // Temukan data berdasarkan ID
        if ($user) {
            $user->kls_status= $request->status;  // Update status siswa
            $user->save();
        }
        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }
}
