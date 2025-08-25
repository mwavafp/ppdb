<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengumumanController extends Controller
{
    public function showDatasma()
    {
        // Status seleksi yang ingin ditampilkan

        $sma = 'sma';
        // Mengambil data pengguna yang lolos seleksi tanpa filter pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $sma)
            ->where('seleksi.status_seleksi', '=', 'LOLOS')
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumansma', compact('all_data'), ['title' => 'Pengumuman SMA']);
    }
    public function searchsma(Request $request)
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $sma = 'sma';

        // Mengambil kata kunci pencarian
        $search = $request->input('search');

        // Mengambil data pengguna yang sesuai dengan kata kunci pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $sma)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->where(function ($query) use ($search) {
                $query->where('users.name', 'like', "%{$search}%")
                    ->orWhere('users.nisn', 'like', "%{$search}%");
            })
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumansma', compact('all_data'), ['title' => 'Pengumuman SMA']);
    }

    public function showDatasmp()
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $smp = 'smp';
        // Mengambil data pengguna yang lolos seleksi tanpa filter pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $smp)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumansmp', compact('all_data'), ['title' => 'Pengumuman SMP']);
    }

    public function searchsmp(Request $request)
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $smp = 'smp';

        // Mengambil kata kunci pencarian
        $search = $request->input('search');

        // Mengambil data pengguna yang sesuai dengan kata kunci pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $smp)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->where(function ($query) use ($search) {
                $query->where('users.name', 'like', "%{$search}%")
                    ->orWhere('users.nisn', 'like', "%{$search}%");
            })
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumansmp', compact('all_data'), ['title' => 'Pengumuman SMP']);
    }

    public function showDatatk()
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $tk = 'tk';
        // Mengambil data pengguna yang lolos seleksi tanpa filter pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $tk)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumantk', compact('all_data'), ['title' => 'Pengumuman TK']);
    }

    public function searchtk(Request $request)
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $tk = 'tk';

        // Mengambil kata kunci pencarian
        $search = $request->input('search');

        // Mengambil data pengguna yang sesuai dengan kata kunci pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $tk)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->where(function ($query) use ($search) {
                $query->where('users.name', 'like', "%{$search}%")
                    ->orWhere('users.nisn', 'like', "%{$search}%");
            })
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumantk', compact('all_data'), ['title' => 'Pengumuman TK']);
    }

    public function showDatasd()
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $sd = 'sd';
        // Mengambil data pengguna yang lolos seleksi tanpa filter pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $sd)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumansd', compact('all_data'), ['title' => 'Pengumuman SD']);
    }

    public function searchsd(Request $request)
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $sd = 'sd';

        // Mengambil kata kunci pencarian
        $search = $request->input('search');

        // Mengambil data pengguna yang sesuai dengan kata kunci pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $sd)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->where(function ($query) use ($search) {
                $query->where('users.name', 'like', "%{$search}%")
                    ->orWhere('users.nisn', 'like', "%{$search}%");
            })
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumansd', compact('all_data'), ['title' => 'Pengumuman SD']);
    }

    public function showDatatpq()
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $tpq = 'tpq';
        // Mengambil data pengguna yang lolos seleksi tanpa filter pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $tpq)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumantpq', compact('all_data'), ['title' => 'Pengumuman TPQ']);
    }

    public function searchtpq(Request $request)
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $tpq = 'tpq';

        // Mengambil kata kunci pencarian
        $search = $request->input('search');

        // Mengambil data pengguna yang sesuai dengan kata kunci pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $tpq)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->where(function ($query) use ($search) {
                $query->where('users.name', 'like', "%{$search}%")
                    ->orWhere('users.nisn', 'like', "%{$search}%");
            })
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumantpq', compact('all_data'), ['title' => 'Pengumuman TPQ']);
    }

    public function showDatamadin()
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $madin = 'madin';
        $tpq = 'tpq';
        // Mengambil data pengguna yang lolos seleksi tanpa filter pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $madin)
            ->where('kelas.unt_pendidikan', '=', $tpq)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumanmadin', compact('all_data'), ['title' => 'Pengumuman MADIN & TPQ']);
    }

    public function searchmadin(Request $request)
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $madin = 'madin';
        $tpq = 'tpq';
        // Mengambil kata kunci pencarian
        $search = $request->input('search');

        // Mengambil data pengguna yang sesuai dengan kata kunci pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $madin)
            ->where('kelas.unt_pendidikan', '=', $tpq)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->where(function ($query) use ($search) {
                $query->where('users.name', 'like', "%{$search}%")
                    ->orWhere('users.nisn', 'like', "%{$search}%");
            })
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumanmadin', compact('all_data'), ['title' => 'Pengumuman MADIN & TPQ']);
    }

    public function showDatapondok()
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $pondok = 'pondok';
        // Mengambil data pengguna yang lolos seleksi tanpa filter pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $pondok)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumanpondok', compact('all_data'), ['title' => 'Pengumuman PONDOK']);
    }

    public function searchpondok(Request $request)
    {
        // Status seleksi yang ingin ditampilkan
        $lolos = 'LOLOS';
        $pondok = 'pondok';

        // Mengambil kata kunci pencarian
        $search = $request->input('search');

        // Mengambil data pengguna yang sesuai dengan kata kunci pencarian
        $all_data = DB::table('user_golongan')
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.nisn', 'users.alamat', 'seleksi.status_seleksi', 'kelas.unt_pendidikan')
            ->crossJoin('tahun')
            ->whereBetween('users.created_at', [DB::raw('tahun.awal'), DB::raw('tahun.akhir')])
            ->where('kelas.unt_pendidikan', '=', $pondok)
            ->where('seleksi.status_seleksi', '=', $lolos)
            ->where(function ($query) use ($search) {
                $query->where('users.name', 'like', "%{$search}%")
                    ->orWhere('users.nisn', 'like', "%{$search}%");
            })
            ->paginate(10);

        // Mengirim data ke tampilan
        return view('frontPage.pengumumanpondok', compact('all_data'), ['title' => 'Pengumuman PONDOK']);
    }
}
