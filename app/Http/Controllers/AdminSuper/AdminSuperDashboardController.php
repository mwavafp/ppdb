<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSuperDashboardController extends Controller
{
    public function showData()
    {
        // Mengambil data dari database termasuk kolom password yang telah dienkripsi sebelumnya
        $all_data = DB::table('admins')
            ->select('id_admin', 'name', 'nip', 'email', 'password', 'password2', 'role', 'created_at')
            ->where('role', '=', 'admin')
            ->paginate(5);

        // Dekripsi password untuk setiap item yang diambil (opsional)
        // foreach ($all_data as $item) {
        //     $item->password = Crypt::decryptString($item->password);
        // }


        return view('superAdmin.dataAdminPage', compact('all_data'), ['title' => 'Dashboard SuperAdmin']);
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



        Admin::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' =>   $request->password,
            'password2' =>   Crypt::encrypt($request->password),
            'role' => $request->role,
        ]);

        // dd($userAdmin->all());
        // event(new Registered($userAdmin));
        // if ($userAdmin) {
        //     return redirect(route('admin.dashboardSA'))->with('success', 'Admin berhasil ditambahkan!');
        // } else {
        //     return back()->withErrors(['msg' => 'Gagal menambahkan admin, silakan coba lagi.']);
        // }

        return to_route('admin.dataAdminPage')->with('success', "Data Berhasil Di tambah");
    }
    public function deleteData(Request $request, $id)
    {
        DB::table('admins')
            ->where('id_admin', '=', $id)
            ->delete();

        return redirect()->route('admin.dataAdminPage')->with('success', "Data Berhasil Di tambah");
    }
}
