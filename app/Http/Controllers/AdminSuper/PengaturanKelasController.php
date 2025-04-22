<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PengaturanKelasController extends Controller
{
    public function showData()
    {
        // Mengambil data dari database termasuk kolom password yang telah dienkripsi sebelumnya
        $all_data = DB::table('kelas')
            ->join('contact', 'kelas.id_contact', '=', 'contact.id_contact')
            ->select( 'id_kelas' , 'unt_pendidikan', 'kelas',  'kls_identitas', 'kls_status',  'contact.nama')
            ->paginate(5);

        $opsi = DB::table('contact')
            ->select('id_contact', 'nama', 'cp')
            ->paginate(5);

            // dd($opsi->all());

        // Dekripsi password untuk setiap item yang diambil (opsional)
        // foreach ($all_data as $item) {
        //     $item->password = Crypt::decryptString($item->password);
        // }


        return view('superAdmin.pengaturanKelas', compact('all_data', 'opsi'), ['title' => 'pengaturan-kelas']);
    }
    public function createData(Request $request): RedirectResponse
    {

        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'nip' => ['required', 'numeric'],
        //     'email' => ['required', 'string', 'max:255', 'email'],
        //     'password' => ['required', Rules\Password::defaults()],
        //     'role' => ['required', 'string'],
        // ]);



        Kelas::create([
            'unt_pendidikan' => $request->unt_pendidikan,
            'kelas' => $request->kelas,
            'kls_identitas' => $request->kls_identitas,
            'kls_status' => $request->kls_status,
            'id_contact' => $request->id_contact

        ]);

        // dd($userAdmin->all());
        // event(new Registered($userAdmin));
        // if ($userAdmin) {
        //     return redirect(route('admin.dashboardSA'))->with('success', 'Admin berhasil ditambahkan!');
        // } else {
        //     return back()->withErrors(['msg' => 'Gagal menambahkan admin, silakan coba lagi.']);
        // }

        return to_route('admin.pengaturanKelas');
    }
    public function deleteData(Request $request, $id)
    {
        DB::table('kelas')
            ->where('id_kelas', '=', $id)
            ->delete();

        return redirect()->route('admin.pengaturanKelas');
    }
}
