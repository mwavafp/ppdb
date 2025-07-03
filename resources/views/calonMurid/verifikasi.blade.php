<x-layout-login>
    <x-slot:title>test</x-slot:title>

    <div class="w-full m-auto">
        <x-tahapan></x-tahapan>
    </div>

    <main class="container mx-auto mt-10 flex justify-center mb-16 px-4 ">
        <div class="bg-white border-2 shadow-lg rounded-lg overflow-hidden w-full max-w-2xl">
            <!-- Header -->
            <div class="bg-green-500 text-white text-center py-4">
                <h1 class="text-xl font-bold">Pengumuman Data Siswa</h1>
            </div>

            <!-- Tabel Data -->
            <div class="p-6 overflow-x-auto">
                <table class="w-full text-sm border border-gray-300  mb-10">
                    <tbody>
                        <tr class="border border-gray-300">
                            <td class="p-2 font-bold border border-gray-300 w-1/3">Nama</td>
                            <td class="p-2">{{ $all_data->name }}</td>
                        </tr>
                        <tr class="border border-gray-300">
                            <td class="p-2 font-bold border border-gray-300">NISN</td>
                            <td class="p-2">{{ $all_data->nisn }}</td>
                        </tr>
                        @foreach ($kelas as $item)
                            <div>
                                <tr class="border border-gray-300">
                                    <td class="p-2 font-bold border border-gray-300">Jenjang</td>
                                    <td class="p-2">{{ strtoupper($item->unt_pendidikan) }}</td>
                                </tr>
                                <tr class="border border-gray-300">
                                    <td class="p-2 font-bold border border-gray-300">Kelas</td>
                                    <td class="p-2">{{ $item->kelas }}{{ $item->kls_identitas }}</td>
                                </tr>
                            </div>
                        @endforeach


                        <tr class="border border-gray-300">
                            <td class="p-2 font-bold border border-gray-300">Alamat</td>
                            <td class="p-2">{{ $all_data->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
                @if (
                    $seleksi_user->akta_lahir === 'diserahkan' &&
                        $seleksi_user->kk === 'diserahkan' &&
                        $seleksi_user->byr_dft_ulang === 'lunas')
                    <div class=" my-8">
                        <p class="bg-green-500 text-center text-white py-4 w-full rounded-lg font-bold">SELAMAT ANDA
                            TELAH DINYATAKAN LOLOS SELEKSI PPDB</p>

                    </div>
                @elseif($gelombang_user->akhir_acara >= date('Y-m-d'))
                    <div class=" my-8">
                        <p class="bg-blue-500 text-center text-white py-4 w-full rounded-lg font-bold"> MOHON UNTUK
                            MENYELESAIKAN ADMINISTRASI SELEKSI PPDB</p>

                    </div>
                @else
                    <div class=" my-8">
                        <p class="bg-red-500 text-center text-white py-4 w-full rounded-lg font-bold"> MOHON MAAF
                            DINYATAKAN TIDAK LOLOS SELEKSI PPDB</p>

                    </div>
                @endif

            </div>
        </div>
    </main>
</x-layout-login>
