<?php


namespace App\Http\Controllers\Admin\Auth;

use App\Exports\TagihanExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class TagihanAdmin extends Controller
{
    public function showData()
    {
        // Ambil pembayaran terakhir berdasarkan id_bayar per user + kelas
        $latestPembayaran = DB::table('user_unit_pendidikan as uup')
            ->join('pembayaran as p1', 'uup.id_bayar', '=', 'p1.id_bayar')
            ->select(
                'uup.id_uup',
                DB::raw('MAX(p1.id_bayar) as latest_id_bayar')
            )
            ->groupBy('uup.id_uup');

        // Join utama
        $all_data = DB::table('user_unit_pendidikan')
    ->join('user_golongan', 'user_unit_pendidikan.id_uup', '=', 'user_golongan.id_uup')
    ->join('users', 'user_golongan.id_user', '=', 'users.id_user')
    ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
    ->join('harga', 'user_golongan.id_harga', '=', 'harga.id_harga')
    ->leftJoin('seleksi', 'users.id_user', '=', 'seleksi.id_user')

    // join subquery pembayaran terakhir
    ->leftJoinSub($latestPembayaran, 'latest_pembayaran', function ($join) {
        $join->on('user_unit_pendidikan.id_uup', '=', 'latest_pembayaran.id_uup');
    })
    ->leftJoin('pembayaran', 'pembayaran.id_bayar', '=', 'latest_pembayaran.latest_id_bayar')
    ->leftJoin('admins', 'admins.id_admin', '=', 'pembayaran.updated_by')

            ->whereBetween('users.created_at', [
                DB::raw('(SELECT awal FROM tahun LIMIT 1)'),
                DB::raw('(SELECT akhir FROM tahun LIMIT 1)')
            ])
            ->select(
                'users.name',
        'users.id_user',
        'kelas.unt_pendidikan',
        'kelas.kelas',
        'harga.total_bayar_daful',
        'harga.diskon',
        'pembayaran.byr_dft_ulang',
        'pembayaran.status',
        'pembayaran.id_bayar',
        'pembayaran.jmlh_byr',
        'pembayaran.jmlh_byr2',
        'pembayaran.jmlh_byr3',
        'pembayaran.jmlh_byr4',
        'pembayaran.updated_at',
        'admins.name as nama_admin'
            )
            ->orderBy('users.name')
            ->paginate(10);

        return view('admin.page.tagihan', compact('all_data'), ['title' => 'test']);
    }









    public function updateData(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jmlh_byr' => 'required|numeric',
            'jmlh_byr2' => 'required|numeric',
            'jmlh_byr3' => 'required|numeric',
            'jmlh_byr4' => 'required|numeric',

        ]);

        $pembayaran = DB::table('pembayaran')
            ->where('id_bayar', $id)->first();
        $harga = DB::table('harga')
            ->join('user_golongan', 'harga.id_harga', '=', 'user_golongan.id_harga')
            ->join('user_unit_pendidikan as uup', 'user_golongan.id_uup', '=', 'uup.id_uup')
            ->join('pembayaran as p', 'uup.id_bayar', '=', 'p.id_bayar')
            ->where('p.id_bayar', $id)
            ->select('harga.total_bayar_daful', 'harga.diskon')
            ->first();

        $byr_dft_ulang = $validatedData['jmlh_byr'] + $validatedData['jmlh_byr2'] + $validatedData['jmlh_byr3'] + $validatedData['jmlh_byr4'] >= $pembayaran->jmlh_byr ? 'lunas' : 'belum';
        $statusByr = $pembayaran->status; // default ke status lama
        if ($validatedData['jmlh_byr'] + $validatedData['jmlh_byr2'] + $validatedData['jmlh_byr3'] + $validatedData['jmlh_byr4'] + $harga->diskon >= $harga->total_bayar_daful) {
            $statusByr = 'Lunas';
        } else {
            $statusByr = 'Cicil';
        }

        DB::table('pembayaran')
            ->where('id_bayar', $id)
            ->update([
                'jmlh_byr' => $validatedData['jmlh_byr'],
                'jmlh_byr2' => $validatedData['jmlh_byr2'],
                'jmlh_byr3' => $validatedData['jmlh_byr3'],
                'jmlh_byr4' => $validatedData['jmlh_byr4'],
                'status' => $statusByr,
                'byr_dft_ulang' => $byr_dft_ulang,
                'updated_by' => auth('admin')->id()
            ]);
        return redirect()->route('tagihan-admin')->with('success', 'Data berhasil disimpan!');
    }

    public function showDetail()
    {
        $data = DB::table('pembayaran')
            ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->leftJoin('admins', 'admins.id_admin', '=', 'pembayaran.updated_by')
            ->select(
                'pembayaran.*',
                'users.name',
                'kelas.unt_pendidikan',
                'admins.name as nama_admin',
                'pembayaran.updated_at'
            )
            ->orderBy('pembayaran.updated_at', 'desc')
            ->paginate(10); // bisa disesuaikan

        return redirect()->route('tagihan-admin', compact('data'), ['title' => 'Detail Pembayaran']);
    }


    public function search(Request $request)
    {
        $search = $request->search;
        $all_data = DB::table('harga')
            ->join('user_golongan', 'harga.id_harga', '=', 'user_golongan.id_harga')  // Pastikan 'harga' di-join dengan 'user_golongan'
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')  // Join 'users' dengan 'user_golongan'
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('pembayaran', 'users.id_user', '=', 'pembayaran.id_user')
            // ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            // ->join('users', 'user_golongan.id_user', '=', 'users.id_user')

            // ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')

            // ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->whereBetween('users.created_at', [
                DB::raw('(SELECT awal FROM tahun LIMIT 1)'),
                DB::raw('(SELECT akhir FROM tahun LIMIT 1)')
            ])
            ->select(
                'users.name',
                'users.id_user',
                'pembayaran.id_bayar',
                'kelas.unt_pendidikan',
                'pembayaran.byr_dft_ulang',
                'pembayaran.status',
                'jmlh_byr',
                'harga.total_bayar_daful',
                'harga.dp_daful',
                'harga.diskon'
            )

            ->where('users.name', 'LIKE', "%{$search}%")
            ->paginate(10);


        return view('admin.page.tagihan', compact('all_data'), ['title' => 'Search Results']);
    }

    public function filter(Request $request)
    {
        $filterCategory = [
            'unt_pendidikan' => 'kelas.unt_pendidikan',
            'status' => 'pembayaran.status',
            'dft_ulang' => 'pembayaran.byr_dft_ulang'

        ];
        $query = DB::table('harga')
            ->join('user_golongan', 'harga.id_harga', '=', 'user_golongan.id_harga')  // Pastikan 'harga' di-join dengan 'user_golongan'
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')  // Join 'users' dengan 'user_golongan'
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('pembayaran', 'users.id_user', '=', 'pembayaran.id_user')
            ->select(
                'users.name',
                'users.id_user',
                'users.gender',
                'pembayaran.id_bayar',
                'kelas.unt_pendidikan',
                'pembayaran.byr_dft_ulang',
                'pembayaran.status',
                'pembayaran.jmlh_byr',
                'harga.total_bayar_daful',
                'harga.dp_daful',
                'harga.diskon'

            );
        //  DB::table('pembayaran')
        //     ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
        //     ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
        //     ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
        //     ->select(
        //         'users.name',
        //         'users.id_user',
        //         'pembayaran.id_bayar',
        //         'kelas.unt_pendidikan',
        //         'pembayaran.byr_dft_ulang',
        //         'pembayaran.status',
        //         'pembayaran.jmlh_byr'
        //     );


        foreach ($filterCategory as $key => $value) {
            if ($request->filled($key)) {
                $query->where($value, 'LIKE', "%{$request->$key}%");
            }
        }


        // Ambil data dengan pagination
        $all_data = $query->paginate(10);
        $all_data->appends($request->all());

        return view('admin.page.tagihan', compact('all_data'), ['title' => 'Search Results']);
    }
    // public function export()
    // {
    //     return Excel::download(new TagihanExport, 'Tagihan PPDB.xlsx');
    // }
}
