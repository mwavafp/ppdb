<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="section-2  -">
        <div class="text-3xl text-center font-bold bg-[oklch(62.7%_0.194_149.214)]  text-white mb-8 rounded-b-full">
            <p class="py-8">INFORMASI SD</p>
        </div>
        @foreach ($all_teks as $teks)
            <div class="section-3">
                <div class="background flex bg-white p-16"> <!-- Mengubah bg-gradient menjadi bg-white -->
                    <div class="content-1 flex-1 mr-8">
                        <p class="text-left text-4xl font-bold mb-9 text-center text-green-600">
                            <!-- Mengubah warna teks menjadi hijau -->
                            Selamat Datang di <br> SD Nurul Huda
                        </p>
                        <div class="bg-gray-100 p-6 rounded-md shadow-lg transform transition-transform hover:scale-105">
                            <!-- Kotak kolom timbul -->
                            <p class="text-justify text-black">
                                {!! ($teks->deskripsi) !!}
                            </p>
                        </div>
                    </div>
                    <div class="content-2 flex-1 items-center flex">
                        <img src="/images/Compro_sd.jpg" alt="" class="mx-auto my-auto rounded-xl">
                    </div>
                </div>
            </div>

            <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div class="bg-gray-100 p-4 rounded-md shadow-md"> <!-- Mengubah bg-white menjadi bg-teal-400 -->
                    <center>
                        <h2 class="text-green-600 text-lg font-bold mb-4"> <!-- Mengubah warna teks menjadi putih -->
                            VISI
                        </h2>
                    </center>
                    <p class="mt-4 text-black"> <!-- Mengubah warna teks menjadi putih -->
                        {!! ($teks->visi) !!}
                    </p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow-md"> <!-- Mengubah bg-white menjadi bg-teal-400 -->
                    <center>
                        <h2 class="text-green-600 text-lg font-bold mb-4"> <!-- Mengubah warna teks menjadi putih -->
                            MISI
                        </h2>
                    </center>
                    <p style="line-height: 1.5; text-align: justify; color: black;">
                        <!-- Mengubah warna teks menjadi putih -->
                        {!! ($teks->misi) !!}
                    </p>
                </div>
            </section>
        @endforeach
        <div class="section-7">
            <div class="box p-12">
                <p class="text-left text-4xl font-bold mb-9 text-center"><span class="text-orange">Ekstra</span>
                    <span>Kurikuler</span>
                </p>
                <div class="card-box flex  justify-center">
                    <div class=" w-72 mx-8  text-center">
                        <div
                            class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                            <p class="text-center text-3xl text-white font-bold">1</p>
                        </div>
                        <p class="text-xl font-bold mb-4 ">BTQ (Baca Tulis Qur'an) </p>
                        <img src="/images/compro_tk.jpg" alt="Deskripsi Gambar" class="w-full h-auto mb-4" />
                    </div>
                    <div class=" w-72 mx-8  text-center">
                        <div
                            class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                            <p class="text-center text-3xl text-white font-bold">2</p>
                        </div>
                        <p class="text-xl font-bold mb-4 ">Tahfidzul Qur'an</p>
                        <img src="/images/compro_tk.jpg" alt="Deskripsi Gambar" class="w-full h-auto mb-4" />
                    </div>
                    <div class=" w-72 mx-8  text-center">
                        <div
                            class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                            <p class="text-center text-3xl text-white font-bold">3</p>
                        </div>
                        <p class="text-xl font-bold mb-4 ">Samroh dan Banjari</p>
                        <img src="/images/compro_tk.jpg" alt="Deskripsi Gambar" class="w-full h-auto mb-4" />
                    </div>
                    <div class=" w-72 mx-8  text-center">
                        <div
                            class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                            <p class="text-center text-3xl text-white font-bold">4</p>
                        </div>
                        <p class="text-xl font-bold mb-4 ">Pencak Silat (Pagar Nusa)</p>
                        <img src="/images/compro_tk.jpg" alt="Deskripsi Gambar" class="w-full h-auto mb-4" />
                    </div>
                    <div class=" w-72 mx-8  text-center">
                        <div
                            class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                            <p class="text-center text-3xl text-white font-bold">5</p>
                        </div>
                        <p class="text-xl font-bold mb-4 ">Komputer</p>
                        <img src="/images/compro_tk.jpg" alt="Deskripsi Gambar" class="w-full h-auto mb-4" />
                    </div>
                </div>

            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-6">

            <div class="bg-white p-6 rounded-md shadow-md">
                <h2 class="text-[oklch(62.7%_0.194_149.214)] text-lg font-bold mb-4">
                    ALUR PENDAFTARAN
                </h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1">
                        </i>
                        <div class="ml-2">
                            <strong>
                                STEP 1 - DAFTAR
                            </strong>
                            <p>
                                Selesai mendaftar, pendaftar akan menerima notifikasi whatsapp untuk melanjutkan proses
                                pembayaran
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1">
                        </i>
                        <div class="ml-2">
                            <strong>
                                STEP 2 - ISI FORMULIR PENDAFTARAN
                            </strong>
                            <p>
                                Isi dan lengkapi isi formulir pendaftaran dan pilih tujuan daftar (Daycare, Playgroup,
                                TK).
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1">
                        </i>
                        <div class="ml-2">
                            <strong>
                                STEP 3 - PEMBAYARAN
                            </strong>
                            <p>
                                Lakukan pembayaran sesuai nominal dan nomer rekening yang tertera
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1">
                        </i>
                        <div class="ml-2">
                            <strong>
                                STEP 4 - ISI BIODATA
                            </strong>
                            <p>
                                Lengkapi biodata calon murid dan orang tua guna pendataan.
                            </p>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-green-500 mt-1">
                        </i>
                        <div class="ml-2">
                            <strong>
                                STEP 5 - CETAK KARTU
                            </strong>
                            <p>
                                Lakukan cetak kartu dan simpan sebagai bukti pada saat registrasi ulang.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class='flex flex-col'>
                <div class="bg-white p-6 rounded-md shadow-md mb-4 tabel-1">
                    <h2 class="text-[oklch(62.7%_0.194_149.214)] text-lg font-bold mb-4">
                        JADWAL PENDAFTARAN
                    </h2>
                    <ul class="space-y-2 mb-4">
                        <li>
                            Gelombang 1 :
                            <br />
                            2 Desember 2024 - 28 Februari 2025
                        </li>
                        <li>
                            Gelombang 2 :
                            <br />
                            1 Maret - 31 Mei 2025
                        </li>
                        <li>
                            Gelombang 3 :
                            <br />
                            1 Juni - 14 Juli 2025
                        </li>
                    </ul>
                    <a href='/form?unit_pendidikan=SD'
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded-md">
                        DAFTAR KLIK DISINI
                    </a>
                </div>
                <div class="bg-white p-6 rounded-md shadow-md  tabel-2">
                    <h2 class="text-[oklch(62.7%_0.194_149.214)] text-lg font-bold mt-6 mb-4">
                        BERKAS YANG HARUS DISIAPKAN
                    </h2>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)]">
                            </i>
                            <span class="ml-2">
                                Fotocopy KK 2 Lembar
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)]">
                            </i>
                            <span class="ml-2">
                                Fotocopy Akte Kelahiran 2 Lembar
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)]">
                            </i>
                            <span class="ml-2">
                                Foto Berwarna 3x4 2 Lembar
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        </main>
    </div>

</x-layout>
