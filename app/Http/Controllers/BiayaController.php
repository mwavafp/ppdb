<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiayaController extends Controller
{
    public function ShowDataBiaya(Request $request)
    {
        // $rawData = Harga::all();
        $rawData = DB::table('harga')
            ->join('acara', 'harga.id_acara', '=', 'acara.id_acara')
            ->select('id_harga', 'unitPendidikan', 'gender', 'tipe_siswa', 'dp_daful', 'total_bayar_daful', 'diskon', 'acara.id_acara', 'acara.namaAcara')
            ->paginate(1000);


        $notesRaw = DB::table('note')
            ->select('id_note', 'unit', 'catatan')
            ->get(); // gunakan get() daripada paginate() karena kita mau olah semua data

        $notes = [];

        foreach ($notesRaw as $note) {
            $unit = $note->unit;

            // Masukkan catatan per unit
            if (!isset($notes[$unit])) {
                $notes[$unit] = [];
            }

            $notes[$unit][] = [
                'id_note' => $note->id_note,
                'catatan' => $note->catatan
            ];
        }




        $data = [];


        foreach ($rawData as $row) {
            $key = $row->unitPendidikan;

            // Kelompokkan berdasarkan unit, gelombang, dan tipe
            $identifier = $row->id_acara . '|' . $row->tipe_siswa;

            if (!isset($data[$key][$identifier])) {
                $data[$key][$identifier] = [
                    // 'gelombang' => $row->gelombang,
                    'tipe' => $row->tipe_siswa,
                    'putra' => null,
                    'putri' => null,
                    'dp' => $row->dp_daful,
                    'bonus' => $row->diskon,
                    'acara' => $row->id_acara,
                    'nama' => $row->namaAcara,
                ];
            }
            // dd($rawData);

            if ($row->gender === 'laki-laki') {
                $data[$key][$identifier]['putra'] = $row->total_bayar_daful;
            } elseif ($row->gender === 'perempuan') {
                $data[$key][$identifier]['putri'] = $row->total_bayar_daful;
            }
        }
        // dd($notes);

        return view('frontPage.biaya', [
            'title' => 'Biaya Siswa',
            'data' => $data,
            'notes' => $notes
        ]);
    }
   
}
