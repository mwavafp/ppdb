<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnValue;

class PengaturanGelombang extends Controller {

    public function showGelombang(){
        $acara = Acara::all();
        return view ('superAdmin.pengaturanGelombang', compact('acara'));
    }
    public function updateGelombang(Request $request) {
        $request->validate([
            'id_acara' => 'required|exists:acara,id_acara',
            'namaAcara' => 'required|string',
            'status' => 'required|in:aktif,tidak_aktif',
            'awal_acara' => 'required|date',
            'akhir_acara' => 'required|date|after_or_equal:awal_acara',
        ]);

        $acara = Acara::findOrFail($request->id_acara);

        // Jika status yang dikirim adalah "aktif" dan sebelumnya bukan aktif
        if ($request->status === 'aktif' && $acara->status !== 'aktif') {
            // Nonaktifkan semua gelombang lain
            Acara::where('id_acara', '!=', $request->id_acara)->update(['status' => 'tidak_aktif']);
        }
        
        $acara = Acara::find($request->id_acara);
        $acara->namaAcara = $request->namaAcara;
        $acara->status = $request->status;
        $acara->awal_acara = $request->awal_acara;
        $acara->akhir_acara = $request->akhir_acara;
        $acara->save();

        return redirect()->route('superAdmin.gelombang')->with('success', 'Data berhasil diupdate!');
    }


}
