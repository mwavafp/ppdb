<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function showData()
    {
        // Mengambil data dari database termasuk kolom password yang telah dienkripsi sebelumnya
        $all_data = DB::table('contact')
            ->join('kelas', 'contact.id_contact', '=', 'kelas.id_kelas')
            ->select('contact.id_contact',
                     'contact.nama',
                     'contact.cp',
                     'contact.created_at',
                     'kelas.unt_pendidikan')
            ->get();

        // Dekripsi password untuk setiap item yang diambil (opsional)
        // foreach ($all_data as $item) {
        //     $item->password = Crypt::decryptString($item->password);
        // }


        return view('superAdmin.pengaturanCp', compact('all_data'), ['title' => 'pengaturan-cp']);
    }
    public function createData(Request $request): RedirectResponse
    {
        // dd($request->all());

        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'nip' => ['required', 'numeric'],
        //     'email' => ['required', 'string', 'max:255', 'email'],
        //     'password' => ['required', Rules\Password::defaults()],
        //     'role' => ['required', 'string'],
        // ]);



        Contact::create([
            'nama' => $request->nama,
            'cp' => $request->cp

        ]);

        // dd($userAdmin->all());
        // event(new Registered($userAdmin));
        // if ($userAdmin) {
        //     return redirect(route('admin.dashboardSA'))->with('success', 'Admin berhasil ditambahkan!');
        // } else {
        //     return back()->withErrors(['msg' => 'Gagal menambahkan admin, silakan coba lagi.']);
        // }

        return to_route('admin.pengaturanCp');
    }
        public function updateData(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'cp' => 'required|string|max:20',
        ]);

        DB::table('contact')
            ->where('id_contact', $id)
            ->update([
                'nama' => $request->nama,
                'cp' => $request->cp,
                'updated_at' => now(),
            ]);

        return redirect()->route('admin.pengaturanCp')->with('success', 'Data berhasil diperbarui.');
    }

}
