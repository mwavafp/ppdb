<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $gender = $request->input('gender', '');
        $status = $request->input('status', '');

        // Query dasar dengan filter pencarian
        $query = User::query();

        if (!empty($search)) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
        }

        if (!empty($gender)) {
            $query->where('gender', $gender);
        }

        if (!empty($status)) {
            $query->where('status', $status);
        }

        $siswa = $query->paginate(10);

        return view('index', [
            'title' => 'Data Siswa',
            'all_data' => $siswa,
        ]);
    }
}
