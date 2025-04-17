<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaturanBiayaDaftarController extends Controller
{
<<<<<<< HEAD
    public function showDataBiaya()
    {
        $all_data = DB::table('harga')->paginate(10);;
        return view('superAdmin.pengaturan-biaya-daftar', compact('all_data'), ['title' => 'Pengaturan Biaya Daftar']);
=======
    public function showDataBiaya(Request $request)
    {
        $units = ['TK', 'SD', 'SMP', 'SMA', 'PONDOK'];
        $data = [];

        foreach ($units as $unit) {
            $data[$unit] = DB::table('harga')
                ->join('acara', 'harga.id_acara', '=', 'acara.id_acara')
                ->where('unitPendidikan', $unit)->paginate(10); // atau pakai paginate kalau mau
        }

        return view('superAdmin.pengaturan-biaya-daftar', [
            'title' => 'Pengaturan Biaya Daftar',
            'all_data' => $data
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
>>>>>>> b9e00e98f0fd8f61ee0aa755bd13ac306594ab44
    }
}
