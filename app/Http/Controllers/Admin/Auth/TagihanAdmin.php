<?php


namespace App\Http\Controllers\Admin\Auth;

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


        $all_data = DB::table('pembayaran')
            ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
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
                'pembayaran.jmlh_byr',
                'seleksi.status_seleksi'
            )
            ->where('seleksi.status_seleksi', '=', 'LOLOS')
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
            'status' => 'required|in:DP,Lunas,Cicil',
        ]);

        DB::table('pembayaran')
            ->where('id_user', '=', $id)
            ->update([

                'jmlh_byr' => $validatedData['jmlh_byr'],
                'status' => $validatedData['status'],
            ]);

        return redirect()->route('tagihan-admin')->with('success', 'Data berhasil diperbarui!');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $all_data = DB::table('pembayaran')
            ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->select('users.name', 'users.id_user', 'pembayaran.id_bayar', 'kelas.unt_pendidikan', 'pembayaran.byr_dft_ulang', 'pembayaran.status', 'jmlh_byr')
            ->where('users.name', 'LIKE', "%{$search}%")
            ->where('seleksi.status_seleksi', '=', 'LOLOS')
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
        $query = DB::table('pembayaran')
            ->join('users', 'pembayaran.id_user', '=', 'users.id_user')
            ->join('seleksi', 'users.id_user', '=', 'seleksi.id_user')
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->select(
                'users.name',
                'users.id_user',
                'pembayaran.id_bayar',
                'kelas.unt_pendidikan',
                'pembayaran.byr_dft_ulang',
                'pembayaran.status',
                'pembayaran.jmlh_byr'
            )->where('seleksi.status_seleksi', '=', 'LOLOS');


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
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
