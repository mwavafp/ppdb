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
            ->select(
                'id_yayasan',
                'image_banner',
                'image_selamat_datang',
                'image_visi',
                'image_keunggulan',
                'image_daftar',
                'image_login',
                'deskripsi',
                'keunggulan',
                'visi_misi',
                'alasan_memilih_1',
                'alasan_memilih_2',
                'alasan_memilih_3',
                'alasan_memilih_4',
                'alasan_memilih_5',
                'alasan_memilih_6',
                'alur_pendaftaran_1',
                'alur_pendaftaran_2',
                'alur_pendaftaran_3',
                'alur_pendaftaran_4',
                'alur_pendaftaran_5'
            )
            ->get();

        return view('frontPage.home', compact('all_teks'), ['title' => 'Home']);
    }

    public function edithome()
    {
        $data = DB::table('yayasan')
            ->select(
                'id_yayasan',
                'image_banner',
                'image_selamat_datang',
                'image_visi',
                'image_keunggulan',
                'image_daftar',
                'image_login',
                'deskripsi',
                'keunggulan',
                'visi_misi',
                'alasan_memilih_1',
                'alasan_memilih_2',
                'alasan_memilih_3',
                'alasan_memilih_4',
                'alasan_memilih_5',
                'alasan_memilih_6',
                'alur_pendaftaran_1',
                'alur_pendaftaran_2',
                'alur_pendaftaran_3',
                'alur_pendaftaran_4',
                'alur_pendaftaran_5'
            )
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
            'image_banner' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_selamat_datang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_visi' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_keunggulan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_daftar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_login' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $imageFields = [
            'image_banner',
            'image_selamat_datang',
            'image_visi',
            'image_keunggulan',
            'image_daftar',
            'image_login'
        ];
        $uploadData = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage'), $filename);
                $uploadData[$field] = $filename;
            }
        }
        DB::table('yayasan')
            ->where('id_yayasan', $request->id_yayasan)
            ->update(array_merge([
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
            ], $uploadData));
        return redirect()->route('pengaturanhome-edit')->with('success', 'Data berhasil diperbarui!');
    }


    ///////// Controller untuk halamanan TK //////////
    public function showDatatk()
    {
        $all_teks = DB::table('tk')
            ->select(
                'id_tk',
                'deskripsi',
                'visi',
                'misi',
                'image_tk',
                'gallery_tk_a',
                'gallery_tk_b',
                'gallery_tk_c',
                'gallery_tk_d',
                'gallery_tk_e',
                'gallery_tk_f',
            )
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.tk', compact('all_teks', 'acara'), ['title' => 'TK Information Page']);
    }
    public function edittk()
    {
        $data = DB::table('tk')
            ->select(
                'id_tk',
                'deskripsi',
                'visi',
                'misi',
                'image_tk',
                'gallery_tk_a',
                'gallery_tk_b',
                'gallery_tk_c',
                'gallery_tk_d',
                'gallery_tk_e',
                'gallery_tk_f',
            )
            ->first();

        return view('superAdmin.pengaturanwebtk', compact('data'), ['title' => 'Edit Tk']);
    }
    public function updatetk(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'image_tk' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tk_a' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tk_b' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tk_c' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tk_d' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tk_e' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tk_f' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $imageFields = [
            'image_tk',
            'gallery_tk_a',
            'gallery_tk_b',
            'gallery_tk_c',
            'gallery_tk_d',
            'gallery_tk_e',
            'gallery_tk_f',
        ];
        $uploadData = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage'), $filename);
                $uploadData[$field] = $filename;
            }
        }
        DB::table('tk')
            ->where('id_tk', $request->id_tk)
            ->update(array_merge([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ], $uploadData));
        return redirect()->route('pengaturantk-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ////////// Controller untuk Halaman SD //////////
    public function showDatasd()
    {
        $all_teks = DB::table('sd')
            ->select(
                'id_sd',
                'deskripsi',
                'visi',
                'misi',
                'image_sd',
                'gallery_sd_a',
                'gallery_sd_b',
                'gallery_sd_c',
                'gallery_sd_d',
                'gallery_sd_e',
                'gallery_sd_f',
            )
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.sd', compact('all_teks', 'acara'), ['title' => 'SD Information Page']);
    }
    public function editsd()
    {
        $data = DB::table('sd')
            ->select(
                'id_sd',
                'deskripsi',
                'visi',
                'misi',
                'image_sd',
                'gallery_sd_a',
                'gallery_sd_b',
                'gallery_sd_c',
                'gallery_sd_d',
                'gallery_sd_e',
                'gallery_sd_f',
            )
            ->first();

        return view('superAdmin.pengaturanwebsd', compact('data'), ['title' => 'Edit SD']);
    }
    public function updatesd(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'image_sd' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sd_a' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sd_b' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sd_c' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sd_d' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sd_e' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sd_f' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $imageFields = [
            'image_sd',
            'gallery_sd_a',
            'gallery_sd_b',
            'gallery_sd_c',
            'gallery_sd_d',
            'gallery_sd_e',
            'gallery_sd_f',
        ];
        $uploadData = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage'), $filename);
                $uploadData[$field] = $filename;
            }
        }
        DB::table('sd')
            ->where('id_sd', $request->id_sd)
            ->update(array_merge([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ], $uploadData));
        return redirect()->route('pengaturansd-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman SMP //////////
    public function showDatasmp()
    {
        $all_teks = DB::table('smp')
            ->select(
                'id_smp',
                'deskripsi',
                'visi',
                'misi',
                'image_smp',
                'gallery_smp_a',
                'gallery_smp_b',
                'gallery_smp_c',
                'gallery_smp_d',
                'gallery_smp_e',
                'gallery_smp_f',
            )
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.smp', compact('all_teks', 'acara'), ['title' => 'SMP Information Page']);
    }
    public function editsmp()
    {
        $data = DB::table('smp')
            ->select(
                'id_smp',
                'deskripsi',
                'visi',
                'misi',
                'image_smp',
                'gallery_smp_a',
                'gallery_smp_b',
                'gallery_smp_c',
                'gallery_smp_d',
                'gallery_smp_e',
                'gallery_smp_f',
            )
            ->first();

        return view('superAdmin.pengaturanwebsmp', compact('data'), ['title' => 'Edit SMP']);
    }
    public function updatesmp(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'image_smp' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_smp_a' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_smp_b' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_smp_c' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_smp_d' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_smp_e' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_smp_f' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $imageFields = [
            'image_smp',
            'gallery_smp_a',
            'gallery_smp_b',
            'gallery_smp_c',
            'gallery_smp_d',
            'gallery_smp_e',
            'gallery_smp_f',
        ];
        $uploadData = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage'), $filename);
                $uploadData[$field] = $filename;
            }
        }
        DB::table('smp')
            ->where('id_smp', $request->id_smp)
            ->update(array_merge([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ], $uploadData));
        return redirect()->route('pengaturansmp-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman SMA //////////
    public function showDatasma()
    {
        $all_teks = DB::table('sma')
            ->select(
                'id_sma',
                'deskripsi',
                'visi',
                'misi',
                'image_sma',
                'gallery_sma_a',
                'gallery_sma_b',
                'gallery_sma_c',
                'gallery_sma_d',
                'gallery_sma_e',
                'gallery_sma_f',
            )
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.sma', compact('all_teks', 'acara'), ['title' => 'SMA Information Page']);
    }
    public function editsma()
    {
        $data = DB::table('sma')
            ->select(
                'id_sma',
                'deskripsi',
                'visi',
                'misi',
                'image_sma',
                'gallery_sma_a',
                'gallery_sma_b',
                'gallery_sma_c',
                'gallery_sma_d',
                'gallery_sma_e',
                'gallery_sma_f',
            )
            ->first();

        return view('superAdmin.pengaturanwebsma', compact('data'), ['title' => 'Edit SMA']);
    }
    public function updatesma(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'image_sma' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sma_a' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sma_b' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sma_c' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sma_d' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sma_e' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_sma_f' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $imageFields = [
            'image_sma',
            'gallery_sma_a',
            'gallery_sma_b',
            'gallery_sma_c',
            'gallery_sma_d',
            'gallery_sma_e',
            'gallery_sma_f',
        ];
        $uploadData = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage'), $filename);
                $uploadData[$field] = $filename;
            }
        }
        DB::table('sma')
            ->where('id_sma', $request->id_sma)
            ->update(array_merge([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ], $uploadData));
        return redirect()->route('pengaturansma-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman TPQ //////////
    public function showDatatpq()
    {
        $all_teks = DB::table('tpq')
            ->select(
                'id_tpq',
                'deskripsi',
                'visi',
                'misi',
                'image_tpq',
                'gallery_tpq_a',
                'gallery_tpq_b',
                'gallery_tpq_c',
                'gallery_tpq_d',
                'gallery_tpq_e',
                'gallery_tpq_f',
            )
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.tpq', compact('all_teks', 'acara'), ['title' => 'TPQ Information Page']);
    }
    public function edittpq()
    {
        $data = DB::table('tpq')
            ->select(
                'id_tpq',
                'deskripsi',
                'visi',
                'misi',
                'image_tpq',
                'gallery_tpq_a',
                'gallery_tpq_b',
                'gallery_tpq_c',
                'gallery_tpq_d',
                'gallery_tpq_e',
                'gallery_tpq_f',
            )
            ->first();

        return view('superAdmin.pengaturanwebtpq', compact('data'), ['title' => 'Edit TPQ']);
    }
    public function updatetpq(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'image_tpq' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tpq_a' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tpq_b' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tpq_c' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tpq_d' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tpq_e' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_tpq_f' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $imageFields = [
            'image_tpq',
            'gallery_tpq_a',
            'gallery_tpq_b',
            'gallery_tpq_c',
            'gallery_tpq_d',
            'gallery_tpq_e',
            'gallery_tpq_f',
        ];
        $uploadData = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage'), $filename);
                $uploadData[$field] = $filename;
            }
        }
        DB::table('tpq')
            ->where('id_tpq', $request->id_tpq)
            ->update(array_merge([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ], $uploadData));
        return redirect()->route('pengaturantpq-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman MADIN //////////
    public function showDatamadin()
    {
        $all_teks = DB::table('madin')
            ->select(
                'id_madin',
                'deskripsi',
                'visi',
                'misi',
                'image_madin',
                'gallery_madin_a',
                'gallery_madin_b',
                'gallery_madin_c',
                'gallery_madin_d',
                'gallery_madin_e',
                'gallery_madin_f',
            )
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.madin', compact('all_teks', 'acara'), ['title' => 'Madin Information Page']);
    }
    public function editmadin()
    {
        $data = DB::table('madin')
            ->select(
                'id_madin',
                'deskripsi',
                'visi',
                'misi',
                'image_madin',
                'gallery_madin_a',
                'gallery_madin_b',
                'gallery_madin_c',
                'gallery_madin_d',
                'gallery_madin_e',
                'gallery_madin_f',
            )
            ->first();

        return view('superAdmin.pengaturanwebmadin', compact('data'), ['title' => 'Edit MADIN']);
    }
    public function updatemadin(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'image_madin' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_madin_a' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_madin_b' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_madin_c' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_madin_d' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_madin_e' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_madin_f' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $imageFields = [
            'image_madin',
            'gallery_madin_a',
            'gallery_madin_b',
            'gallery_madin_c',
            'gallery_madin_d',
            'gallery_madin_e',
            'gallery_madin_f',

        ];
        $uploadData = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage'), $filename);
                $uploadData[$field] = $filename;
            }
        }
        DB::table('madin')
            ->where('id_madin', $request->id_madin)
            ->update(array_merge([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ], $uploadData));
        return redirect()->route('pengaturanmadin-edit')->with('success', 'Data berhasil diperbarui!');
    }

    ///////// Controller untuk Halaman PONDOK //////////
    public function showDatapondok()
    {
        $all_teks = DB::table('pondok')
            ->select(
                'id_pondok',
                'deskripsi',
                'visi',
                'misi',
                'image_pondok',
                'gallery_pondok_a',
                'gallery_pondok_b',
                'gallery_pondok_c',
                'gallery_pondok_d',
                'gallery_pondok_e',
                'gallery_pondok_f',
            )
            ->get();

        $acara = Acara::where('status', '=', 'aktif')->get();

        return view('frontPage.pondok', compact('all_teks', 'acara'), ['title' => 'PONDOK Information Page']);
    }
    public function editpondok()
    {
        $data = DB::table('pondok')
            ->select(
                'id_pondok',
                'deskripsi',
                'visi',
                'misi',
                'image_pondok',
                'gallery_pondok_a',
                'gallery_pondok_b',
                'gallery_pondok_c',
                'gallery_pondok_d',
                'gallery_pondok_e',
                'gallery_pondok_f',
            )
            ->first();

        return view('superAdmin.pengaturanwebpondok', compact('data'), ['title' => 'Edit PONDOK']);
    }
    public function updatepondok(Request $request)
    {
        $validatedData = $request->validate([
            'deskripsi' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'image_pondok' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_pondok_a' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_pondok_b' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_pondok_c' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_pondok_d' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_pondok_e' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'gallery_pondok_f' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $imageFields = [
            'image_pondok',
            'gallery_pondok_a',
            'gallery_pondok_b',
            'gallery_pondok_c',
            'gallery_pondok_d',
            'gallery_pondok_e',
            'gallery_pondok_f',
        ];
        $uploadData = [];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('storage'), $filename);
                $uploadData[$field] = $filename;
            }
        }
        DB::table('pondok')
            ->where('id_pondok', $request->id_pondok)
            ->update(array_merge([
                'deskripsi' => $validatedData['deskripsi'] ?? null,
                'visi' => $validatedData['visi'] ?? null,
                'misi' => $validatedData['misi'] ?? null,
            ], $uploadData));
        return redirect()->route('pengaturanpondok-edit')->with('success', 'Data berhasil diperbarui!');
    }
    public function showGelombangSD()
    {
        $acara = Acara::all();
        return view('frontPage.sd', compact('acara'));
    }
}
