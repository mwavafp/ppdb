<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Kelas;
use App\Models\User;
use App\Models\UserGolongan;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    public function saver(Request $request)
    {
        $unitPendidikan = $request->query('unit_pendidikan', ''); // Nilai default kosong jika tidak ada parameter
        $getGelombang = Acara::select('id_acara', 'namaAcara')->where('status', '=', 'aktif')->first();

        return view('frontPage.formRegister', ['title' => 'test'], compact('unitPendidikan', 'getGelombang'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'alamat' => $request->alamat,
            'nisn' => $request->nisn,
            'gender' => $request->gender,
            'tmpt_lahir' => $request->tmpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'asl_sekolah' => $request->asl_sekolah,
            'tipe_siswa' => $request->tipe_siswa,

        ]);
        $id_harga = DB::table('harga')
            ->join('user_golongan', 'harga.id_harga', '=', 'user_golongan.id_harga')  // Pastikan 'harga' di-join dengan 'user_golongan'
            ->join('users', 'user_golongan.id_user', '=', 'users.id_user')  // Join 'users' dengan 'user_golongan'
            ->join('user_unit_pendidikan', 'users.id_user', '=', 'user_unit_pendidikan.id_user')
            ->join('kelas', 'user_unit_pendidikan.id_kelas', '=', 'kelas.id_kelas')
            ->where('harga.gender', '=', $request->gender)
            ->where('harga.tipe_siswa', '=', $request->tipe_siswa)
            ->where('harga.unitPendidikan', '=', $request->unt_pendidikan)
            ->select('harga.id_harga')  // Ambil id_harga dari tabel harga
            ->first();


        UserGolongan::create([
            'id_acara' => $request->id_acara,
            'id_user' => $user->id_user,
            'id_harga' => $id_harga->id_harga


        ]);

        $user->ortu()->create([
            'id_user' => $user->id_user,
            'nmr_kk' => $request->nmr_kk,
            'nm_ayah' => $request->nm_ayah,
            'nik_ayah' => $request->nik_ayah,
            'tgl_lhr_ayah' => $request->tgl_lhr_ayah,
            'tmpt_lhr_ayah' => $request->tmpt_lhr_ayah,
            'almt_ayah' => $request->almt_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'nmr_ayah_wa' => $request->nmr_ayah_wa,
            'nm_ibu' => $request->nm_ibu,
            'nik_ibu' => $request->nik_ibu,
            'tgl_lhr_ibu' => $request->tgl_lhr_ibu,
            'tmpt_lhr_ibu' => $request->tmpt_lhr_ibu,
            'almt_ibu' => $request->almt_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'nmr_ibu_wa' => $request->nmr_ibu_wa,


        ]);

        $user->seleksi()->create([
            'id_user' => $user->id_user,
        ]);

        $kelas = Kelas::create([
            'unt_pendidikan' => strtolower($request->unt_pendidikan)
        ]);
        $user->userUnitPendidikan()->create([
            'id_user' => $user->id_user,
            'id_kelas' => $kelas->id_kelas,
        ]);
        $user->berkas()->create([
            'id_user' => $user->id_user,
        ]);
        $user->pembayaran()->create([
            'id_user' => $user->id_user,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('biodata', absolute: false));
    }
}
