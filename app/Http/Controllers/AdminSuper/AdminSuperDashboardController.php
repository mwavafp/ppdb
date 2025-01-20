<?php

namespace App\Http\Controllers\AdminSuper;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSuperDashboardController extends Controller
{
    public function showData()
    {
        $all_data = DB::table('admins')
            ->select('name', 'nip', 'email', 'password', 'role', 'created_at')
            ->where('role', '=', 'admin')
            ->get();
        return view('superAdmin.dashboardSA', compact('all_data',), ['title' => 'Dashboard SuperAdmin']);
    }
}
