<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Harga;
use App\Models\Kelas;
use App\Models\User;
use App\Models\UserGolongan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Barryvdh\DomPDF\PDF;

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
        $cnt = $request->query('cnt', '');
        $getGelombang = Acara::select('id_acara', 'namaAcara')->where('status', '=', 'aktif')->first();

        return view('frontPage.formRegister', ['title' => 'test'], compact('unitPendidikan', 'getGelombang', 'cnt'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'username' => ['required', 'string', 'max:255'],
    //         'password' => ['required', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'username' => $request->username,
    //         'password' => Hash::make($request->password),
    //         'name' => $request->name,
    //         'alamat' => $request->alamat,
    //         'nisn' => $request->nisn,
    //         'gender' => $request->gender,
    //         'tmpt_lahir' => $request->tmpt_lahir,
    //         'tgl_lahir' => $request->tgl_lahir,
    //         'asl_sekolah' => $request->asl_sekolah,
    //         'tipe_siswa' => $request->tipe_siswa,

    //     ]);
    //     $harga_id = Harga::where('gender', $request->gender)
    //         ->where('tipe_siswa', $request->tipe_siswa)
    //         ->where('unitPendidikan', $request->unt_pendidikan)
    //         ->where('id_acara', $request->id_acara)
    //         ->value('id_harga');



    //     UserGolongan::create([
    //         'id_acara' => $request->id_acara,
    //         'id_user' => $user->id_user,
    //         'id_harga' => $harga_id


    //     ]);

    //     $user->ortu()->create([
    //         'id_user' => $user->id_user,
    //         'nmr_kk' => $request->nmr_kk,
    //         'nm_ayah' => $request->nm_ayah,
    //         'nik_ayah' => $request->nik_ayah,
    //         'tgl_lhr_ayah' => $request->tgl_lhr_ayah,
    //         'tmpt_lhr_ayah' => $request->tmpt_lhr_ayah,
    //         'almt_ayah' => $request->almt_ayah,
    //         'pekerjaan_ayah' => $request->pekerjaan_ayah,
    //         'nmr_ayah_wa' => $request->nmr_ayah_wa,
    //         'nm_ibu' => $request->nm_ibu,
    //         'nik_ibu' => $request->nik_ibu,
    //         'tgl_lhr_ibu' => $request->tgl_lhr_ibu,
    //         'tmpt_lhr_ibu' => $request->tmpt_lhr_ibu,
    //         'almt_ibu' => $request->almt_ibu,
    //         'pekerjaan_ibu' => $request->pekerjaan_ibu,
    //         'nmr_ibu_wa' => $request->nmr_ibu_wa,


    //     ]);
    //     $identity = [
    //         "plainPassword" => $request->password,
    //         "unitPendidikan" => $request->unt_pendidikan,
    //         "tipeSiswa" => $request->tipe_siswa
    //     ];


    //     $user->seleksi()->create([
    //         'id_user' => $user->id_user,
    //     ]);

    //     $kelas = Kelas::create([
    //         'unt_pendidikan' => strtolower($request->unt_pendidikan),
    //         'id_contact' => $request->cnt
    //     ]);
    //     $user->userUnitPendidikan()->create([
    //         'id_user' => $user->id_user,
    //         'id_kelas' => $kelas->id_kelas,
    //     ]);
    //     $user->berkas()->create([
    //         'id_user' => $user->id_user,
    //     ]);
    //     $user->pembayaran()->create([
    //         'id_user' => $user->id_user,
    //     ]);

    //     $pdf = $this->generatePDF($user, $identity);
    //     $pdfContent = $pdf->output(); // hasil binary PDF
    //     $pdfName = 'KARTU_AKUN_' . $request->name . '.pdf';

    //     // Simpan sekali ke session flash
    //     session()->flash('pdf_download', [
    //         'content' => base64_encode($pdfContent),
    //         'filename' => $pdfName
    //     ]);

    //     Auth::login($user);
    //     return redirect()->route('biodata');
    // }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            // USER
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
            'nisn' => ['required', 'digits:10'],

            // ORTU
            'nmr_kk' => ['required', 'digits:16'],
            'nm_ayah' => ['required', 'string', 'max:255'],
            'nik_ayah' => ['required', 'digits:16'],
            'tgl_lhr_ayah' => ['required', 'date'],
            'tmpt_lhr_ayah' => ['required', 'string', 'max:255'],
            'almt_ayah' => ['required', 'string'],
            'pekerjaan_ayah' => ['required', 'string'],
            'nmr_ayah_wa' => ['required', 'digits_between:12,13'],
            'nm_ibu' => ['required', 'string', 'max:255'],
            'nik_ibu' => ['required', 'digits:16'],
            'tgl_lhr_ibu' => ['required', 'date'],
            'tmpt_lhr_ibu' => ['required', 'string', 'max:255'],
            'almt_ibu' => ['required', 'string'],
            'pekerjaan_ibu' => ['required', 'string'],
            'nmr_ibu_wa' => ['required', 'digits_between:12,13'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.digits' => 'NISN harus 10 digit.',
            'nmr_kk.required' => 'Nomor KK wajib diisi.',
            'nmr_kk.digits' => 'Nomor KK harus 16 digit.',
            'nik_ayah.required' => 'NIK Ayah wajib diisi.',
            'nik_ayah.digits' => 'NIK Ayah harus 16 digit.',
            'nik_ibu.required' => 'NIK Ibu wajib diisi.',
            'nik_ibu.digits' => 'NIK Ibu harus 16 digit.',
            'nmr_ayah_wa.digits_between' => 'Nomor WA Ayah harus 12-13 digit.',
            'nmr_ibu_wa.digits_between' => 'Nomor WA Ibu harus 12-13 digit.',
            'tgl_lhr_ayah.date' => 'Tanggal lahir Ayah harus format tanggal.',
            'tgl_lhr_ibu.date' => 'Tanggal lahir Ibu harus format tanggal.',
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

        $harga_id = Harga::where('gender', $request->gender)
            ->where('tipe_siswa', $request->tipe_siswa)
            ->where('unitPendidikan', $request->unt_pendidikan)
            ->where('id_acara', $request->id_acara)
            ->value('id_harga');

        UserGolongan::create([
            'id_acara' => $request->id_acara,
            'id_user' => $user->id_user,
            'id_harga' => $harga_id,
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

        $identity = [
            "plainPassword" => $request->password,
            "unitPendidikan" => $request->unt_pendidikan,
            "tipeSiswa" => $request->tipe_siswa,
        ];

        $user->seleksi()->create([
            'id_user' => $user->id_user,
        ]);

        $kelas = Kelas::create([
            'unt_pendidikan' => strtolower($request->unt_pendidikan),
            'id_contact' => $request->cnt,
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

        $pdf = $this->generatePDF($user, $identity);
        $pdfContent = $pdf->output();
        $pdfName = 'KARTU_AKUN_' . $request->name . '.pdf';

        session()->flash('pdf_download', [
            'content' => base64_encode($pdfContent),
            'filename' => $pdfName,
        ]);

        Auth::login($user);
        return redirect()->route('biodata');
    }
    private function generatePDF($user, $identity)
    {
        return \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.registration', compact('user', 'identity'));
    }
}
