<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Kelas;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{

    public function showUser()
    {

        $all_user = User::count();
        $user_pondok = Kelas::where('unt_pendidikan', '=', 'pondok')->count();
        $user_madin = Kelas::where('unt_pendidikan', '=', 'madin')->count();
        $user_tpq = Kelas::where('unt_pendidikan', '=', 'tpq')->count();
        $user_tk = Kelas::where('unt_pendidikan', '=', 'tk')->count();
        $user_sd = Kelas::where('unt_pendidikan', '=', 'sd')->count();
        $user_smp = Kelas::where('unt_pendidikan', '=', 'smp')->count();
        $user_sma = Kelas::where('unt_pendidikan', '=', 'sma')->count();
        //gender
        $gender_laki = User::where('gender', '=', 'laki-laki')->count();
        $gender_perempuan = User::where('gender', '=', 'perempuan')->count();
        //
        $tipe_user = [
            ['title' => 'Jumlah Pendaftar PONDOK', 'fungsi' => $user_pondok],
            ['title' => 'Jumlah Pendaftar MADIN', 'fungsi' => $user_madin],
            ['title' => 'Jumlah Pendaftar TPQ', 'fungsi' => $user_tpq],
            ['title' => 'Jumlah Pendaftar TK', 'fungsi' => $user_tk],
            ['title' => 'Jumlah Pendaftar SD', 'fungsi' => $user_sd],
            ['title' => 'Jumlah Pendaftar SMP', 'fungsi' => $user_smp],
            ['title' => 'Jumlah Pendaftar SMA', 'fungsi' => $user_sma]
        ];
        return view('admin.page.dashboard', compact(
            'all_user',
            'tipe_user',
            'gender_laki',
            'gender_perempuan'
        ), ['title' => 'test']);
    }
    public function showUserSuperAdmin()
    {

        $all_user = User::count();
        $user_pondok = Kelas::where('unt_pendidikan', '=', 'pondok')->count();
        $user_madin = Kelas::where('unt_pendidikan', '=', 'madin')->count();
        $user_tpq = Kelas::where('unt_pendidikan', '=', 'tpq')->count();
        $user_tk = Kelas::where('unt_pendidikan', '=', 'tk')->count();
        $user_sd = Kelas::where('unt_pendidikan', '=', 'sd')->count();
        $user_smp = Kelas::where('unt_pendidikan', '=', 'smp')->count();
        $user_sma = Kelas::where('unt_pendidikan', '=', 'sma')->count();
        //gender
        $gender_laki = User::where('gender', '=', 'laki-laki')->count();
        $gender_perempuan = User::where('gender', '=', 'perempuan')->count();
        //
        $tipe_user = [
            ['title' => 'Jumlah Pendaftar PONDOK', 'fungsi' => $user_pondok],
            ['title' => 'Jumlah Pendaftar MADIN', 'fungsi' => $user_madin],
            ['title' => 'Jumlah Pendaftar TPQ', 'fungsi' => $user_tpq],
            ['title' => 'Jumlah Pendaftar TK', 'fungsi' => $user_tk],
            ['title' => 'Jumlah Pendaftar SD', 'fungsi' => $user_sd],
            ['title' => 'Jumlah Pendaftar SMP', 'fungsi' => $user_smp],
            ['title' => 'Jumlah Pendaftar SMA', 'fungsi' => $user_sma]
        ];
        return view('superAdmin.dashboardSuperAdmin', compact(
            'all_user',
            'tipe_user',
            'gender_laki',
            'gender_perempuan'
        ), ['title' => 'test']);
    }
}
