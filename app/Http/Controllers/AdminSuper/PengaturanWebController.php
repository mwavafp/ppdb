<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Yayasan;
use App\Models\Tk;
use App\Models\Sd;
use App\Models\Smp;
use App\Models\Sma;
use App\Models\Tpq;
use App\Models\Madin;
use App\Models\Pondok;
use App\Models\Acara;

class PengaturanWebController extends Controller
{

    public function showpage()
    {
        return view('superAdmin.pengaturanweb');
    }

    ////////// controller untuk halamana dashboard //////////
    public function showDatahome()
    {
        $all_teks = DB::table('yayasan')
            ->select('id_yayasan', 'deskripsi', 'keunggulan', 'visi_misi', 'alasan_memilih_1', 'alasan_memilih_2', 'alasan_memilih_3', 'alasan_memilih_4', 'alasan_memilih_5', 'alasan_memilih_6', 'alur_pendaftaran_1', 'alur_pendaftaran_2', 'alur_pendaftaran_3', 'alur_pendaftaran_4', 'alur_pendaftaran_5')
            ->get();

        return view('frontPage.home', compact('all_teks'), ['title' => 'Home']);
    }

    public function edithome()
    {
        $data = DB::table('yayasan')
            ->select('id_yayasan', 'deskripsi', 'keunggulan', 'visi_misi', 'alasan_memilih_1', 'alasan_memilih_2', 'alasan_memilih_3', 'alasan_memilih_4', 'alasan_memilih_5', 'alasan_memilih_6', 'alur_pendaftaran_1', 'alur_pendaftaran_2', 'alur_pendaftaran_3', 'alur_pendaftaran_4', 'alur_pendaftaran_5')
            ->first();

        return view('superAdmin.pengaturanwebhome', compact('data'), ['title' => 'Edit Yayasan']);
    }

    public function updatehome(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'keunggulan' => 'nullable|string',
            'visi_misi' => 'nullable|string',
            'alasan_memilih_1' => 'nullable|string',
            'alasan_memilih_2' => 'nullable|string',
            'alasan_memilih_3' => 'nullable|string',
            'alasan_memilih_4' => 'nullable|string',
            'alasan_memilih_5' => 'nullable|string',
            'alasan_memilih_6' => 'nullable|string',
            'alur_pendaftaran_1' => 'nullable|string',
            'alur_pendaftaran_2' => 'nullable|string',
            'alur_pendaftaran_3' => 'nullable|string',
            'alur_pendaftaran_4' => 'nullable|string',
            'alur_pendaftaran_5' => 'nullable|string',
        ]);

        DB::table('yayasan')
            ->where('id_yayasan', $request->id_yayasan)
            ->update([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'keunggulan' => $validatedData['keunggulan'] ?? null,
                'visi_misi' => $validatedData['visi_misi'] ?? null,
                'alasan_memilih_1' => $validatedData['alasan_memilih_1'] ?? null,
                'alasan_memilih_2' => $validatedData['alasan_memilih_2'] ?? null,
                'alasan_memilih_3' => $validatedData['alasan_memilih_3'] ?? null,
                'alasan_memilih_4' => $validatedData['alasan_memilih_4'] ?? null,
                'alasan_memilih_5' => $validatedData['alasan_memilih_5'] ?? null,
                'alasan_memilih_6' => $validatedData['alasan_memilih_6'] ?? null,
                'alur_pendaftaran_1' => $validatedData['alur_pendaftaran_1'] ?? null,
                'alur_pendaftaran_2' => $validatedData['alur_pendaftaran_2'] ?? null,
                'alur_pendaftaran_3' => $validatedData['alur_pendaftaran_3'] ?? null,
                'alur_pendaftaran_4' => $validatedData['alur_pendaftaran_4'] ?? null,
                'alur_pendaftaran_5' => $validatedData['alur_pendaftaran_5'] ?? null,
            ]);
        return redirect()->route('pengaturanhome-edit')->with('success', 'Data berhasil diperbarui!');
    }


    ///////// Controller untuk halamanan TK //////////
    public function showDatatk()
    {
        $all_teks = DB::table('tk')
            ->select('id_tk', 'deskripsi', 'visi', 'misi')
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.tk', compact('all_teks', 'acara'), ['title' => 'TK Information Page']);
    }
    public function edittk()
    {
        $data = DB::table('tk')
            ->select('id_tk', 'deskripsi', 'visi', 'misi')
            ->first();

        return view('superAdmin.pengaturanwebtk', compact('data'), ['title' => 'Edit Tk']);
    }
    public function updatetk(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        DB::table('tk')
            ->where('id_tk', $request->id_tk)
            ->update([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ]);
        return redirect()->route('pengaturantk-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ////////// Controller untuk Halaman SD //////////
    public function showDatasd()
    {
        $all_teks = DB::table('sd')
            ->select('id_sd', 'deskripsi', 'visi', 'misi')
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.sd', compact('all_teks', 'acara'), ['title' => 'SD Information Page']);
    }
    public function editsd()
    {
        $data = DB::table('sd')
            ->select('id_sd', 'deskripsi', 'visi', 'misi')
            ->first();

        return view('superAdmin.pengaturanwebsd', compact('data'), ['title' => 'Edit SD']);
    }
    public function updatesd(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        DB::table('sd')
            ->where('id_sd', $request->id_sd)
            ->update([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ]);
        return redirect()->route('pengaturansd-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman SMP //////////
    public function showDatasmp()
    {
        $all_teks = DB::table('smp')
            ->select('id_smp', 'deskripsi', 'visi', 'misi')
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.smp', compact('all_teks', 'acara'), ['title' => 'SMP Information Page']);
    }
    public function editsmp()
    {
        $data = DB::table('smp')
            ->select('id_smp', 'deskripsi', 'visi', 'misi')
            ->first();

        return view('superAdmin.pengaturanwebsmp', compact('data'), ['title' => 'Edit SMP']);
    }
    public function updatesmp(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        DB::table('smp')
            ->where('id_smp', $request->id_smp)
            ->update([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ]);
        return redirect()->route('pengaturansmp-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman SMA //////////
    public function showDatasma()
    {
        $all_teks = DB::table('sma')
            ->select('id_sma', 'deskripsi', 'visi', 'misi')
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.sma', compact('all_teks', 'acara'), ['title' => 'SMA Information Page']);
    }
    public function editsma()
    {
        $data = DB::table('sma')
            ->select('id_sma', 'deskripsi', 'visi', 'misi')
            ->first();

        return view('superAdmin.pengaturanwebsma', compact('data'), ['title' => 'Edit SMA']);
    }
    public function updatesma(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        DB::table('sma')
            ->where('id_sma', $request->id_sma)
            ->update([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ]);
        return redirect()->route('pengaturansma-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman TPQ //////////
    public function showDatatpq()
    {
        $all_teks = DB::table('tpq')
            ->select('id_tpq', 'deskripsi', 'visi', 'misi')
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.tpq', compact('all_teks', 'acara'), ['title' => 'TPQ Information Page']);
    }
    public function edittpq()
    {
        $data = DB::table('tpq')
            ->select('id_tpq', 'deskripsi', 'visi', 'misi')
            ->first();

        return view('superAdmin.pengaturanwebtpq', compact('data'), ['title' => 'Edit TPQ']);
    }
    public function updatetpq(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        DB::table('tpq')
            ->where('id_tpq', $request->id_tpq)
            ->update([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ]);
        return redirect()->route('pengaturantpq-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman MADIN //////////
    public function showDatamadin()
    {
        $all_teks = DB::table('madin')
            ->select('id_madin', 'deskripsi', 'visi', 'misi')
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.madin', compact('all_teks', 'acara'), ['title' => 'Madin Information Page']);
    }
    public function editmadin()
    {
        $data = DB::table('madin')
            ->select('id_madin', 'deskripsi', 'visi', 'misi')
            ->first();

        return view('superAdmin.pengaturanwebmadin', compact('data'), ['title' => 'Edit MADIN']);
    }
    public function updatemadin(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        DB::table('madin')
            ->where('id_madin', $request->id_madin)
            ->update([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ]);
        return redirect()->route('pengaturanmadin-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman PONDOK //////////
    public function showDatapondok()
    {
        $all_teks = DB::table('pondok')
            ->select('id_pondok', 'deskripsi', 'visi', 'misi')
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.pondok', compact('all_teks', 'acara'), ['title' => 'PONDOK Information Page']);
    }
    public function editpondok()
    {
        $data = DB::table('pondok')
            ->select('id_pondok', 'deskripsi', 'visi', 'misi')
            ->first();

        return view('superAdmin.pengaturanwebpondok', compact('data'), ['title' => 'Edit PONDOK']);
    }
    public function updatepondok(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
        ]);

        DB::table('pondok')
            ->where('id_pondok', $request->id_pondok)
            ->update([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ]);
        return redirect()->route('pengaturanpondok-edit')->with('success', 'Data berhasil diperbarui!');
    }
    public function showGelombangSD()
    {
        $acara = Acara::all();
        return view('frontPage.sd', compact('acara'));
    }
}
