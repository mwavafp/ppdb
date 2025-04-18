<?php

namespace Database\Seeders;

use App\Models\Acara;
use App\Models\Admin;
use App\Models\Berkas;
use App\Models\Harga;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Seleksi;
use App\Models\User;
use App\Models\Ortu;
use App\Models\Tahun;
use App\Models\UserGolongan;
use App\Models\UserUnitPendidikan;
use Database\Factories\AdminsFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\BerkasFactory;
use Database\Factories\PengaturanTablesFactory;
use Database\Factories\TahunFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        Acara::factory()->create(

            [
                'namaAcara' => 'Gelombang1',
                'status' => 'aktif',
                'awal_acara' => '2024-12-03',
                'akhir_acara' => '2024-12-03',

            ],

        );
        Harga::factory()->createMany(
            [
                [
                    'unitPendidikan' => 'sd',
                    'gender' => 'perempuan',
                    'tipe_siswa' => 'umum',
                    'total_bayar_daful' => 1000000,
                    'dp_daful' => 500000,
                    'diskon' => 200000,
                    'id_acara' => 1
                ],
                [
                    'unitPendidikan' => 'sd',
                    'gender' => 'laki-laki',
                    'tipe_siswa' => 'umum',
                    'total_bayar_daful' => 1000000,
                    'dp_daful' => 500000,
                    'diskon' => 200000,
                    'id_acara' => 1
                ],
            ]
        );


        $user = User::factory()->create([
            'username' => 'user',
            'password' => Hash::make('user1234'),
            'name' => 'User Prasetyo',
            'alamat' => 'Jalan User Tenggara no.23, welington, DC',
            'nisn' => 123456,
            'tgl_lahir' => '2024-12-03',
            'tmpt_lahir' => 'DC',
            'asl_sekolah' => 'sdn Pekalongan DC',

        ]);
        $kelas = Kelas::factory()->create([
            'unt_pendidikan' => 'sma',
            'kelas' => '8',
            'kls_identitas' => 'A',
            'kls_status' => 'Siswa Aktif'
        ]);
        Admin::factory()->createMany(
            [
                [
                    'name' => 'cahyo',
                    'nip' => 1231232,
                    'email' => 'cahyo@gmail.com',
                    'password' => bcrypt('cahyo123'),
                    'password2' => Crypt::encrypt(('cahyo123')), // Jangan lupa hash password
                    'role' => 'admin'
                ],
                [
                    'name' => 'super',
                    'nip' => 1231232,
                    'email' => 'super@gmail.com',
                    'password' => bcrypt('super'), // Jangan lupa hash password
                    'role' => 'superAdmin'
                ]
            ]
        );

        Tahun::factory()->create([
            'nama' => 'Tahun Ajaran',
            'awal' => '2024-12-12',
            'akhir' => '2025-12-12'
        ]);



        Ortu::factory()->create([
            'id_user' => $user->id_user,
            'nmr_kk' => 123456,
            'nm_ayah' => 'User Sunjarya',
            'nik_ayah' => 123456,
            'tgl_lhr_ayah' => '2024-12-03',
            'tmpt_lhr_ayah' => 'DC Cakung',
            'almt_ayah' => 'DC Cakung',
            'pekerjaan_ayah' => "penguasa",
            'nmr_ayah_wa' => 123456,
            'nm_ibu' => 'User Wenty',
            'nik_ibu' => 123456,
            'tgl_lhr_ibu' => '2024-12-03',
            'tmpt_lhr_ibu' => 'DC MU',
            'almt_ibu' => 'MU',
            'pekerjaan_ibu' => 'rhs',
            'nmr_ibu_wa' => 123445
        ]);

        Pembayaran::factory()->create([
            'id_user' => $user->id_user,
            'byr_dft_ulang' => 'lunas',
            'status' => 'Lunas',
            'jmlh_byr' => 300000
        ]);

        UserUnitPendidikan::factory()->create([
            'id_user' => $user->id_user,
            'id_kelas' => $kelas->id_kelas,
            'status' => 'Siswa Aktif',
            'tgl_mulai' => '2024-12-03',
            'tgl_berakhir' => '2024-12-11'

        ]);

        Berkas::factory()->create([
            'id_user' => $user->id_user,
            'kk' => 'belum_diserahkan',
            'pas_foto' => 'belum_diserahkan',
            'ijazah_akhir' => 'belum_diserahkan',
            'kip' => 'belum_diserahkan'

            // Berkas::factory()->create([
            //     'id_user' => $user->id_user,
            //     'kk' => 'belum_diserahkan',
            //     'pas_foto' => 'belum_diserahkan',
            //     'ijazah_akhir' => 'belum_diserahkan',
            //     'kip' => 'belum_diserahkan'


        ]);
        Seleksi::factory()->create([
            'id_user' => $user->id_user,
            'status_seleksi' => 'TIDAK LOLOS'
        ]);
        UserGolongan::create([
            'id_acara' => 1,
            'id_harga' => 1,
            'id_user' => 1
        ]);

        //Automatic 100 dummy

        // User::factory(1000000)->create()->each(function ($user) {
        //     Ortu::factory()->create([
        //         'id_user' => $user->id_user, //penimpaan data
        //     ]);
        //     Pembayaran::factory()->create([
        //         'id_user' => $user->id_user, //penimpaan data
        //     ]);
        //     UserUnitPendidikan::factory()->create([
        //         'id_user' => $user->id_user, //penimpaan data
        //     ]);
        //     Seleksi::factory()->create([
        //         'id_user' => $user->id_user, //penimpaan data
        //     ]);
        //     Berkas::factory()->create([
        //         'id_user' => $user->id_user, //penimpaan data
        //     ]);
        // });
        Kelas::factory()->create()->each(function ($kelas) {
            UserUnitPendidikan::factory()->create([
                'id_kelas' => $kelas->id_kelas, //penimpaan data
            ]);
        });
        $factoryData = PengaturanTablesFactory::new()->definition();

        DB::table('yayasan')->insert($factoryData['yayasan']);
        DB::table('tk')->insert($factoryData['tk']);
        DB::table('sd')->insert($factoryData['sd']);
        DB::table('smp')->insert($factoryData['smp']);
        DB::table('sma')->insert($factoryData['sma']);
        DB::table('tpq')->insert($factoryData['tpq']);
        DB::table('madin')->insert($factoryData['madin']);
        DB::table('pondok')->insert($factoryData['pondok']);
    }
}
