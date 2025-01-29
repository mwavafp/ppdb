<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Kelas;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{

    public function showUser()
    {
        $data_query = DB::table('pembayaran')
            ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas');

        $total_bayar_tpq = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'tpq')
            ->sum('pembayaran.jmlh_byr');
        $all_user = User::count();
        $total_bayar = Pembayaran::sum('jmlh_byr');

        $user_pondok = Kelas::where('unt_pendidikan', '=', 'pondok')->count();
        $total_bayar_pondok = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'pondok')
            ->sum('pembayaran.jmlh_byr');
        $user_madin = Kelas::where('unt_pendidikan', '=', 'madin')->count();
        $total_bayar_madin = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'madin')
            ->sum('pembayaran.jmlh_byr');
        $user_tpq = Kelas::where('unt_pendidikan', '=', 'tpq')->count();
        $user_tk = Kelas::where('unt_pendidikan', '=', 'tk')->count();
        $total_bayar_tk = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'TK')
            ->sum('pembayaran.jmlh_byr');
        $user_sd = Kelas::where('unt_pendidikan', '=', 'SD')->count();
        $total_bayar_sd = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'sd')
            ->sum('pembayaran.jmlh_byr');
        $user_smp = Kelas::where('unt_pendidikan', '=', 'smp')->count();
        $total_bayar_smp = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'smp')
            ->sum('pembayaran.jmlh_byr');
        $user_sma = Kelas::where('unt_pendidikan', '=', 'sma')->count();
        $total_bayar_sma = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'sma')
            ->sum('pembayaran.jmlh_byr');
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
            'gender_perempuan',
            'total_bayar',
            'total_bayar_tpq',
            'total_bayar_tk',
            'total_bayar_pondok',
            'total_bayar_smp',
            'total_bayar_sma',
            'total_bayar_sd',
            'total_bayar_madin',

        ), ['title' => 'test']);
    }
    public function showUserSuperAdmin()
    {
        $data_query = DB::table('pembayaran')
            ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas');

        $total_bayar_tpq = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'tpq')
            ->sum('pembayaran.jmlh_byr');
        $all_user = User::count();
        $total_bayar = Pembayaran::sum('jmlh_byr');

        $user_pondok = Kelas::where('unt_pendidikan', '=', 'pondok')->count();
        $total_bayar_pondok = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'pondok')
            ->sum('pembayaran.jmlh_byr');
        $user_madin = Kelas::where('unt_pendidikan', '=', 'madin')->count();
        $total_bayar_madin = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'madin')
            ->sum('pembayaran.jmlh_byr');
        $user_tpq = Kelas::where('unt_pendidikan', '=', 'tpq')->count();
        $user_tk = Kelas::where('unt_pendidikan', '=', 'tk')->count();
        $total_bayar_tk = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'TK')
            ->sum('pembayaran.jmlh_byr');
        $user_sd = Kelas::where('unt_pendidikan', '=', 'SD')->count();
        $total_bayar_sd = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'sd')
            ->sum('pembayaran.jmlh_byr');
        $user_smp = Kelas::where('unt_pendidikan', '=', 'smp')->count();
        $total_bayar_smp = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'smp')
            ->sum('pembayaran.jmlh_byr');
        $user_sma = Kelas::where('unt_pendidikan', '=', 'sma')->count();
        $total_bayar_sma = (clone $data_query)
            ->where('kelas.unt_pendidikan', '=', 'sma')
            ->sum('pembayaran.jmlh_byr');
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
            'gender_perempuan',
            'total_bayar',
            'total_bayar_tpq',
            'total_bayar_tk',
            'total_bayar_pondok',
            'total_bayar_smp',
            'total_bayar_sma',
            'total_bayar_sd',
            'total_bayar_madin',

        ), ['title' => 'test']);
    }
}
