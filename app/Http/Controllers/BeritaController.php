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
        $query = Berita::with(['kategori', 'kUnit'])->latest();

        if ($request->has('kategori')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('nama', $request->kategori);
            });
        }   

        $berita = $query->get();

        return view('frontpage.berita', [
            'title'  => 'Berita Yayasan',
            'berita' => $berita
        ]);
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
