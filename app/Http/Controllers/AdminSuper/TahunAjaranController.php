<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tahun;

class TahunAjaranController extends Controller
{
    public function showTahunAjaran()
    {
        $tahunAjaran = Tahun::all();
        return view('superAdmin.tahun-ajaran-pengaturan', compact('tahunAjaran'));
    }

    public function update(Request $request, $id_tahun)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'awal' => 'required|date',
        'akhir' => 'required|date|after:awal',
    ]);

    $tahun = Tahun::where('id_tahun', $id_tahun)->firstOrFail();
    $tahun->update($request->only(['nama', 'awal', 'akhir']));

    return redirect()->route('superAdmin.tahun-ajaran-pengaturan')->with('success', 'Tahun Ajaran berhasil diperbarui.');
}

}
