<?php

namespace App\Http\Controllers;

use App\Models\Tahun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunAjaranController extends Controller
{
    public function showData()
    {
        $alldata = DB::table('tahun')->select('id_tahun', 'awal', 'akhir')->first();


        return view('superAdmin.tahunAjaran', compact('alldata'), ['title' => 'Tahun Ajaran']);
    }
    public function editId()
    {
        $alldata = DB::table('tahun')
            ->select('id_tahun', 'awal', 'akhir')
            ->first();


        return view('');
    }
    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([

            'awal' => 'required|date',
            'akhir' => 'required|date',
        ]);
        DB::table('tahun')
            ->where('id_tahun', '=', $id)
            ->update([
                'awal' => $validatedData['awal'],
                'akhir' => $validatedData['akhir']
            ]);

        return redirect()->route('tahun-ajaran');
    }
}
