<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\User;
use App\Models\UserGolongan;
use App\Models\UserUnitPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class BiodataController extends Controller
{
    public function showData()
    {
        $catchUser = Auth::id();

        // Daftar kelas tambahan yang bisa didaftar user
        $additionalUnits = ['pondok', 'tpq', 'madin'];

        // Ambil semua unit pendidikan user, trim dan lowercase agar konsisten
        $userUnits = DB::table('user_unit_pendidikan as uup')
            ->join('kelas', 'uup.id_kelas', '=', 'kelas.id_kelas')
            ->join('user_golongan as ug', 'uup.id_uup', '=', 'ug.id_uup')
            ->where('ug.id_user', $catchUser)
            ->pluck('kelas.unt_pendidikan')
            ->map(fn($item) => strtolower(trim($item)))
            ->filter()
            ->toArray();

        // Cari kelas tambahan yang sudah user miliki
        $registeredAdditionalUnits = array_intersect($userUnits, $additionalUnits);

        // Cari kelas tambahan yang BELUM user miliki
        $availableUnits = array_diff($additionalUnits, $registeredAdditionalUnits);

        // Pastikan selalu array, jangan null
        if (!is_array($availableUnits)) {
            $availableUnits = [];
        }

        // dd(compact('userUnits', 'registeredAdditionalUnits', 'availableUnits'));
        $all_data = DB::table('users')

            ->join('ortu', 'users.id_user', '=', 'ortu.id_user')
            ->join('user_golongan', 'users.id_user', '=', 'user_golongan.id_user')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_golongan.id_uup')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('contact', 'kelas.id_contact', '=', 'contact.id_contact')
            ->select(
                'users.name',
                'users.alamat',
                'users.nisn',
                'users.gender',
                'users.tmpt_lahir',
                'users.tgl_lahir',
                'users.asl_sekolah',
                'users.id_user',
                'nmr_kk',
                'nm_ayah',
                'nik_ayah',
                'tgl_lhr_ayah',
                'tmpt_lhr_ayah',
                'almt_ayah',
                'pekerjaan_ayah',
                'nmr_ayah_wa',
                'nm_ibu',
                'nik_ibu',
                'tgl_lhr_ibu',
                'tmpt_lhr_ibu',
                'almt_ibu',
                'pekerjaan_ibu',
                'nmr_ibu_wa',
                'contact.nama',
                'contact.cp',
                'kelas.unt_pendidikan'
            )
            ->where('users.id_user', '=', $catchUser)
            ->first();

        $all_contact = DB::table('user_golongan')
            ->join('user_unit_pendidikan', 'user_golongan.id_uup', '=', 'user_unit_pendidikan.id_uup')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->join('contact', 'kelas.id_contact', '=', 'contact.id_contact')
            ->select(
                'contact.nama',
                'contact.cp',
                'kelas.unt_pendidikan'
            )
            ->where('user_golongan.id_user', '=', $catchUser)
            ->get();



        return view('calonMurid.biodata', compact('all_data', 'all_contact', 'availableUnits', 'userUnits'), ['title' => 'test']);
    }

    public function updateData(Request $request)
    {
        $userId = Auth::id();

        // Validasi (optional, bisa ditambah sesuai kebutuhan)
        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nisn' => 'required|numeric',
            // Tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Update data di tabel users
        DB::table('users')->where('id_user', $userId)->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'tmpt_lahir' => $request->tmpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'asl_sekolah' => $request->asl_sekolah,
        ]);

        // Update data di tabel ortu
        DB::table('ortu')->where('id_user', $userId)->update([
            'nmr_kk' => $request->nmr_kk,
            'nm_ayah' => $request->nm_ayah,
            'nik_ayah' => $request->nik_ayah,
            'tmpt_lhr_ayah' => $request->tmpt_lhr_ayah,
            'tgl_lhr_ayah' => $request->tgl_lhr_ayah,
            'almt_ayah' => $request->almt_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nmr_ayah_wa' => $request->nmr_ayah_wa,
            'nm_ibu' => $request->nm_ibu,
            'nik_ibu' => $request->nik_ibu,
            'tmpt_lhr_ibu' => $request->tmpt_lhr_ibu,
            'tgl_lhr_ibu' => $request->tgl_lhr_ibu,
            'almt_ibu' => $request->almt_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'nmr_ibu_wa' => $request->nmr_ibu_wa,
        ]);

        return redirect()->route('biodata')->with('success', 'Data berhasil diperbarui!');
    }

    public function kelasTambahan(Request $request)
    {
        $userId = Auth::id();

        $userIdentity = DB::table('users')->where('id_user', $userId)->first();
        $userGolongan = DB::table('user_golongan')->select('id_acara')->where('id_user', $userId)->first();
        $hargaId = Harga::where('gender', $userIdentity->gender)
            ->where('tipe_siswa', $userIdentity->tipe_siswa)
            ->where('unitPendidikan', strtolower($request->unt_pendidikan))
            ->where('id_acara', $userGolongan->id_acara)
            ->value('id_harga');

        try {
            // Operasi database
            $pembayaran = Pembayaran::create([]);
            $kelas = Kelas::firstOrCreate([
                'unt_pendidikan' => strtolower($request->unt_pendidikan),
                'id_contact' => $request->cnt,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $uup = UserUnitPendidikan::create([
                'id_bayar' => $pembayaran->id_bayar,
                'id_kelas' => $kelas->id_kelas,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('user_golongan')->insert([
                'id_acara' => $userGolongan->id_acara,
                'id_user' => $userId,
                'id_harga' => $hargaId,
                'id_uup' => $uup->id_uup,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $status = true; // semua berhasil

        } catch (\Exception $e) {
            $status = false; // ada error
        }

        // Redirect dengan pesan sukses / error
        return redirect()->route('biodata')
            ->with(
                $status ? 'success' : 'error',
                $status ? 'Berhasil Daftar Kelas!' : 'Gagal daftar kelas!'
            );
    }
}
