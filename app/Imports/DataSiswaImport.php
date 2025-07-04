<?php

namespace App\Imports;

use App\Models\Kelas;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Encryption\Encrypter as EncryptionEncrypter;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Worksheet\Validations;

class DataSiswaImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $rows->shift(); // skip header

        foreach ($rows as $index => $row) {
            DB::transaction(function () use ($row, $index) {
                // Validasi dan parsing tanggal
                try {
                    $tglLahir = Carbon::parse($row[5]);
                    $tglLhrAyah = Carbon::parse($row[12]);
                    $tglLhrIbu = Carbon::parse($row[19]);
                } catch (\Exception $e) {
                    throw ValidationException::withMessages([
                        'tanggal' => 'Format tanggal salah pada baris ' . ($index + 2) . ': ' . $e->getMessage(),
                    ]);
                }

                // Validasi tipe siswa
                $tipeSiswa = trim(strtolower($row[7]));
                if ($tipeSiswa === '') {
                    throw ValidationException::withMessages([
                        'tipe_siswa' => 'Kolom tipe siswa kosong pada baris ' . ($index + 2),
                    ]);
                }
                if (!in_array($tipeSiswa, ['umum', 'alumni'])) {
                    throw ValidationException::withMessages([
                        'tipe_siswa' => 'Tipe siswa tidak valid: ' . $row[7] . ' pada baris ' . ($index + 2),
                    ]);
                }

                // Generate dan validasi username unik
                $baseUsername = 'user' . (is_numeric($row[2]) ? $row[2] : Str::random(5));
                $username = $baseUsername;
                $suffix = 1;

                while (DB::table('users')->where('username', $username)->exists()) {
                    $username = $baseUsername . $suffix;
                    $suffix++;
                }

                // Generate password random
                $passwordPlain = Str::random(8);

                // Simpan ke tabel users
                $lastId = DB::table('users')->max('id_user');
                $newId = $lastId + 1;
                $userId = DB::table('users')->insertGetId([
                    'id_user' => $newId,
                    'username' => $username,
                    'password' => Hash::make($passwordPlain),
                    'password2' => Crypt::encrypt($passwordPlain),
                    'name' => $row[0],
                    'alamat' => $row[1],
                    'nisn' => $row[2],
                    'gender' => $row[3],
                    'tmpt_lahir' => $row[4],
                    'tgl_lahir' => $tglLahir,
                    'asl_sekolah' => $row[6],
                    'tipe_siswa' => $tipeSiswa,
                    'status' => $row[8],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Simpan ke tabel ortu
                DB::table('ortu')->insert([
                    'id_user' => $userId,
                    'nmr_kk' => $row[9],
                    'nm_ayah' => $row[10],
                    'nik_ayah' => $row[11],
                    'tgl_lhr_ayah' => $tglLhrAyah,
                    'tmpt_lhr_ayah' => $row[13],
                    'almt_ayah' => $row[14],
                    'pekerjaan_ayah' => $row[15],
                    'nmr_ayah_wa' => $row[16],
                    'nm_ibu' => $row[17],
                    'nik_ibu' => $row[18],
                    'tgl_lhr_ibu' => $tglLhrIbu,
                    'tmpt_lhr_ibu' => $row[20],
                    'almt_ibu' => $row[21],
                    'pekerjaan_ibu' => $row[22],
                    'nmr_ibu_wa' => $row[23],
                ]);

                // Validasi jenjang pendidikan & kelas
                $jenjang = strtolower(trim((string) $row[24]));
                $kelasNama = strtolower(trim((string) $row[25]));

                if ($jenjang === '' || $kelasNama === '') {
                    throw ValidationException::withMessages([
                        'kelas' => 'Kolom jenjang pendidikan atau kelas kosong pada baris ' . ($index + 2),
                    ]);
                }

                $mapUnit = [
                    'tk' => 1,
                    'sd' => 2,
                    'smp' => 3,
                    'sma' => 4,
                    'madin' => 5,
                    'pondok_smp' => 6,
                    'pondok_sma' => 7,
                ];
                $idContact = $mapUnit[$jenjang] ?? null;

                if (!$idContact) {
                    throw ValidationException::withMessages([
                        'jenjang' => "Unit pendidikan '$jenjang' tidak dikenali pada baris " . ($index + 2),
                    ]);
                }

                $kelas = DB::table('kelas')->where([
                    'unt_pendidikan' => $jenjang,
                    'kelas' => $kelasNama,
                    'id_contact' => $idContact,
                ])->first();

                if(!$kelas){
                    $idKelas = DB::table('kelas')->insertGetId([
                        'unt_pendidikan'=>$jenjang,
                        'kelas'=>$kelasNama,
                        'id_contact' =>$idContact,
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ]);
                }else{
                    $idKelas = $kelas->id_kelas;
                }

                if (!$kelas) {
                    throw ValidationException::withMessages([
                        'kelas' => 'Jenjang pendidikan dan kelas tidak ditemukan: ' . $jenjang . ' - ' . $kelasNama . ' pada baris ' . ($index + 2),
                    ]);
                }

                $idBayar = DB::table('pembayaran')->insertGetId([
                    // 'id_user'=>$userId,
                    'jmlh_byr'=>0,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);

                $idUup = DB::table('user_unit_pendidikan')->insertGetId([
                    // 'id_user' => $userId,
                    'id_bayar' => $idBayar,
                    'id_kelas' => $idKelas,
                    'created_at'=> now(),
                    'updated_at'=> now(),
                ]);

                $acara = DB::table('acara')->first();
                if(!$acara){
                    throw ValidationException::withMessages(['acara'=>'Tidak Ada Acara Aktif.',]);
                }

                $hargaId = DB::table('harga')->where([
                    'gender'=>$row[3],
                    'tipe_siswa'=>$tipeSiswa,
                    'unitPendidikan'=>$jenjang,
                    'id_acara'=>$acara->id_acara,
                ])->value('id_harga');

                if(!$hargaId){
                    throw ValidationException::withMessages(['harga'=>'Harga tidak ditemukan pada baris '.($index+2),]);
                }

                DB::table('user_golongan')->insert([
                    'id_user'=>$userId,
                    'id_acara'=>$acara->id_acara,
                    'id_harga'=>$hargaId,
                    'id_uup'=>$idUup,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]);


            });
        }
    }
}
