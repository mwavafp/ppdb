<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaturanBiayaDaftarController extends Controller
{
    public function showDataBiaya(Request $request)
    {
        $units = ['PONDOK', 'MADIN', 'TPQ', 'TK', 'SD', 'SMP', 'SMA',];
        $data = [];

        foreach ($units as $unit) {
            $data[$unit] = DB::table('harga')
                ->join('acara', 'harga.id_acara', '=', 'acara.id_acara')
                ->where('unitPendidikan', $unit)->paginate(10); // atau pakai paginate kalau mau
        }
        // Ambil semua notes per unit
        $notes = DB::table('note')
            ->whereIn('unit', array_map('strtolower', $units)) // unit di note biasanya lowercase
            ->orderByRaw("FIELD(unit, 'pondok','madin','tpq','tk','sd','smp','sma')")
            ->get();


        return view('superAdmin.pengaturan-biaya-daftar', [
            'title' => 'Pengaturan Biaya Daftar',
            'all_data' => $data,
            'notes' => $notes
        ]);
    }
    public function updateDataBiaya(Request $request, $id)
    {

        $validatedData = $request->validate([

            'total_bayar_daful' => 'required|numeric',
            'dp_daful' => 'required|numeric',
            'diskon' => 'required|numeric',

        ]);

        DB::table('harga')
            ->join('acara', 'harga.id_acara', '=', 'acara.id_acara')
            ->where('id_harga', '=', $id)->update(
                [
                    'total_bayar_daful' => $validatedData['total_bayar_daful'],
                    'dp_daful' => $validatedData['dp_daful'],
                    'diskon' => $validatedData['diskon'],
                ]
            );

        return redirect()->route('superAdmin-biaya-daftar')->with('success', 'Data berhasil diperbarui!');
    }

    public function showNote($id)
    {
        $note = DB::table('note')->where('id_note', $id)->first();

        if (!$note) {
            abort(404);
        }

        return view('superAdmin.pengaturan-biaya-daftar', compact('note'));
    }
    public function index()
    {
        // Units yang dipakai
        $units = ['tk', 'sd', 'smp', 'sma', 'pondok', 'madin', 'tpq'];

        // Ambil semua harga per unit (sesuaikan dengan struktur tabel kamu)
        $data = [];
        foreach ($units as $unit) {
            $data[$unit] = DB::table('harga')
                ->where('unitPendidikan', $unit)
                ->get();
        }

        // Ambil semua notes per unit
        $notes = DB::table('note')
            ->whereIn('unit', $units)
            ->orderByRaw("FIELD(unit, 'tk','sd','smp','sma','pondok','madin','tpq')")
            ->get();

        return view('superAdmin.pengaturan-biaya-daftar', compact('title', 'units', 'data', 'notes'));
    }

    /**
     * Update semua catatan
     */
    public function updateAll(Request $request)
    {
        // Validasi semua field catatan (boleh kosong/null)
        $request->validate([
            'catatan.*' => 'nullable|string|max:255'
        ]);

        // Update per ID note
        foreach ($request->catatan as $id => $text) {
            DB::table('note')
                ->where('id_note', $id)
                ->update([
                    'catatan' => $text,
                    'updated_at' => now()
                ]);
        }

        return redirect()->route('superAdmin-biaya-daftar')
            ->with('success', 'Catatan berhasil diperbarui.');
    }
}
