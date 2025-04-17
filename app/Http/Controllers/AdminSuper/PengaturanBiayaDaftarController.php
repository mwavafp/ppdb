<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use App\Models\Harga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaturanBiayaDaftarController extends Controller
{
    public function showDataBiaya()
    {
        $all_data = DB::table('harga')->paginate(10);;
        return view('superAdmin.pengaturan-biaya-daftar', compact('all_data'), ['title' => 'Pengaturan Biaya Daftar']);
    }
}
