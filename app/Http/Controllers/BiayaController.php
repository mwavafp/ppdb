<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiayaController extends Controller
{
    public function ShowDataBiaya(Request $request)
    {

        $rawData = Harga::all();

        $data = [];

        foreach ($rawData as $row) {
            $key = $row->unitPendidikan;

            // Kelompokkan berdasarkan unit, gelombang, dan tipe
            $identifier = $row->id_acara . '|' . $row->tipe_siswa;

            if (!isset($data[$key][$identifier])) {
                $data[$key][$identifier] = [
                    'gelombang' => $row->gelombang,
                    'tipe' => $row->tipe_siswa,
                    'putra' => null,
                    'putri' => null,
                    'dp' => $row->dp_daful,
                    'bonus' => $row->diskon,
                    'acara' => $row->id_acara,
                ];
            }

            if ($row->gender === 'laki-laki') {
                $data[$key][$identifier]['putra'] = $row->total_bayar_daful;
            } elseif ($row->gender === 'perempuan') {
                $data[$key][$identifier]['putri'] = $row->total_bayar_daful;
            }
        }

        return view('frontPage.biaya', [
            'title' => 'Biaya Siswa',
            'data' => $data,
        ]);
    }
}
