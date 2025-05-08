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
                'users.gender',
                'pembayaran.id_bayar',
                'kelas.unt_pendidikan',
                'pembayaran.byr_dft_ulang',
                'pembayaran.status',
                'pembayaran.jmlh_byr',
                'harga.total_bayar_daful',
                'harga.dp_daful',
                'harga.diskon'

            )
            ->paginate(10);


        return view('admin.page.tagihan', compact('all_data',), ['title' => 'test']);
    }


    public function editData($id)
    {

        $pembayaran = DB::table('pembayaran')
            ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select('users.name', 'users.id_user', 'pembayaran.id_bayar', 'kelas.unt_pendidikan', 'pembayaran.byr_dft_ulang', 'pembayaran.status', 'jmlh_byr')
            ->where('pembayaran.id_bayar', '=', $id)
            ->first();

        return view('admin.page.modal.edit_tagihan', compact('pembayaran'), ['title' => 'tes']);
    }
    public function updateData(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jmlh_byr' => 'required|numeric',

        ]);

        $pembayaran = DB::table('pembayaran')
            ->where('id_bayar', $id)->first();
        $harga = DB::table('harga')
            ->join('user_golongan', 'harga.id_harga', '=', 'user_golongan.id_harga')
            ->join('pembayaran', 'user_golongan.id_user', '=', 'pembayaran.id_user')
            ->where('pembayaran.id_bayar', $id)
            ->select('harga.total_bayar_daful', 'harga.diskon')

            ->first();

        $byr_dft_ulang = $validatedData['jmlh_byr'] >= $pembayaran->jmlh_byr ? 'lunas' : 'belum';
        $statusByr = $pembayaran->status; // default ke status lama
        if ($validatedData['jmlh_byr'] + $harga->diskon >= $harga->total_bayar_daful) {
            $statusByr = 'Lunas';
        } else {
            $statusByr = 'Cicil';
        }

        DB::table('pembayaran')
            ->where('id_bayar', $id)
            ->update([
                'jmlh_byr' => $validatedData['jmlh_byr'],
                'status' => $statusByr,
                'byr_dft_ulang' => $byr_dft_ulang,
            ]);
        return redirect()->route('tagihan-admin')->with('success', 'Data berhasil disimpan!');
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
    public function export()
    {
        return Excel::download(new TagihanExport, 'Tagihan PPDB.xlsx');
    }
}
