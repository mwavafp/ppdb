<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan daftar berita (dengan filter kategori opsional).
     */
    public function index(Request $request)
    {
{
    $query = Berita::with(['kategori', 'kUnit'])->latest();

    // Filter kategori
    if ($request->filled('kategori')) {
        $query->whereHas('kategori', function ($q) use ($request) {
            $q->where('id_kategori', $request->kategori); // pakai id lebih aman
        });
    }

    // Filter unit pendidikan (k_unit)
    if ($request->filled('k_unit')) {
        $query->where('id_unit', $request->k_unit);
    }

    // Filter waktu
    if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
    $query->whereBetween('created_at', [
        $request->tanggal_awal . " 00:00:00",
        $request->tanggal_akhir . " 23:59:59"
    ]);
} elseif ($request->filled('tanggal_awal')) {
    $query->whereDate('created_at', '>=', $request->tanggal_awal);
} elseif ($request->filled('tanggal_akhir')) {
    $query->whereDate('created_at', '<=', $request->tanggal_akhir);
}

    $berita = $query->get();

    return view('frontpage.berita', [
        'title'     => 'Berita Yayasan',
        'berita'    => $berita,
        'kategori'  => \App\Models\Kategori::all(),
        'units'     => \App\Models\Kunit::all(),
    ]);
}

    }

    /**
     * Menampilkan detail berita.
     */
    public function show($id)
    {
$berita = Berita::with(['kategori', 'kUnit'])->findOrFail($id);

        return view('frontpage.beritashow', [
            'title'  => $berita->judul,
            'berita' => $berita
        ]);
    }
}
