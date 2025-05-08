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
            ->paginate(10);

        // Dekripsi password untuk setiap item yang diambil (opsional)
        // foreach ($all_data as $item) {
        //     $item->password = Crypt::decryptString($item->password);
        // }


        return view('superAdmin.dataAdminPage', compact('all_data'), ['title' => 'Dashboard SuperAdmin']);
    }
    public function createData(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'required|numeric',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
        ], [
            'email.unique' => 'Email sudah digunakan. Silakan gunakan email yang berbeda.',
        ]);

        Admin::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => $request->password,
            'password2' => Crypt::encrypt($request->password),
            'role' => $request->role,
        ]);

        return to_route('admin.data-admin-Superadmin')->with('success', 'Data berhasil ditambahkan');
    }

    public function deleteData(Request $request, $id)
    {
        DB::table('admins')
            ->where('id_admin', '=', $id)
            ->delete();

        return redirect()->route('admin.data-admin-Superadmin')->with('success', "Data Berhasil Di tambah");
    }
}
