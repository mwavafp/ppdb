<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Kunit;


class PengaturanBeritaController extends Controller
{
    ////////// controller untuk halamana dashboard //////////
    public function show()
    {
        $all_teks = DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori')
            ->join('k_unit', 'k_unit.id_unit', '=', 'berita.id_unit')
            ->select(
                'berita.id_berita',
                'kategori.nama',
                'k_unit.unit',
                'berita.judul',
                'berita.isi',
                'berita.gambar'
            )
            ->paginate(10);

        return view('superAdmin.pengaturanberita', compact('all_teks'), ['title' => 'Home']);
    }

    public function destroy($id)
    {
        DB::table('berita')->where('id_berita', $id)->delete();

        return redirect()->back()->with('success', 'Berita berhasil dihapus.');
    }
    public function create()
    {
        $kategori = DB::table('kategori')->get();
        $unit = DB::table('k_unit')->get();
        return view('superAdmin.createberita', compact('kategori', 'unit'), ['title' => 'Tambah Berita']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_unit' => 'required|exists:k_unit,id_unit',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $validated['gambar'] = $path;
            $validated['created_at'] = now();
            $validated['updated_at'] = now();
        }


        DB::table('berita')->insert($validated);

        return redirect()->route('pengaturanberita')->with('success', 'Berita berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $berita = DB::table('berita')->where('id_berita', $id)->first();
        $kategori = DB::table('kategori')->get();
        $unit = DB::table('k_unit')->get();

        if (!$berita) {
            return redirect()->route('pengaturanberita')->with('error', 'Data tidak ditemukan.');
        }


        return view('superAdmin.editberita', compact('berita', 'kategori', 'unit'), ['title' => 'Edit Berita']);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'id_unit' => 'required|exists:k_unit,id_unit',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');

            $validated['gambar'] = $path;
            $validated['updated_at'] = now();
        }



        DB::table('berita')->where('id_berita', $id)->update($validated);

        return redirect()->route('pengaturanberita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function indexKategori()
    {
        $kategori = DB::table('kategori')->get();
        return view('superAdmin.kategoriindex', compact('kategori'), ['title' => 'Kategori']);
    }

    public function storeKategori(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        DB::table('kategori')->insert([
            'nama' => $request->nama,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function updateKategori(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        DB::table('kategori')->where('id_kategori', $id)->update([
            'nama' => $request->nama,
            'updated_at' => now(),
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroyKategori($id)
    {
        DB::table('kategori')->where('id_kategori', $id)->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
