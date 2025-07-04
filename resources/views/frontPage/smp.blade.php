<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="section-2  -">
        <div class="text-3xl text-center font-bold bg-[oklch(62.7%_0.194_149.214)]  text-white mb-8 rounded-b-full">
            <p class="py-8">INFORMASI SMP</p>
        </div>
        @foreach ($all_teks as $teks)
            <div class="section-3">
                <div class="background flex bg-white p-16"> <!-- Mengubah bg-gradient menjadi bg-white -->
                    <div class="content-1 flex-1 mr-8">
                        <p class="text-4xl font-bold mb-9 text-center text-green-600">
                            <!-- Mengubah warna teks menjadi hijau -->
                            Selamat Datang di <br> SMP YPP Nurul Huda
                        </p>
                        <div class="bg-gray-100 p-6 rounded-md shadow-lg transform transition-transform hover:scale-105">
                            <!-- Kotak kolom timbul -->
                            <p class="text-justify text-black">
                                {!! $teks->deskripsi !!}
                            </p>
                        </div>
                    </div>
                    <div
                        class="content-2 flex-1 flex items-center justify-center object-cover transition-transform duration-300 hover:scale-120">
                        <img src="{{ asset('storage/' . $teks->image_smp) }}"
                            class="rounded-xl max-w-full max-h-[600px] object-cover object-center " alt="">
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
                        {!! $teks->visi !!}
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
                        {!! $teks->misi !!}
                    </p>
                </div>
            </section>
        @endforeach
        <div class="section-7 mt-12">
            <div class="box px-4 md:px-12">
                <p class="text-3xl md:text-4xl font-bold mb-8 text-center">
                    <span class="text-[oklch(62.7%_0.194_149.214)]">Gallery Kegiatan</span>
                </p>
                <div id="gallery-photo" class="max-w-full mx-auto px-4 py-8 max-h-1/2">
                    <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
                        @foreach ($all_teks as $data)
                            @php
                                $photos = [
                                    $data->gallery_smp_a,
                                    $data->gallery_smp_b,
                                    $data->gallery_smp_c,
                                    $data->gallery_smp_d,
                                    $data->gallery_smp_e,
                                    $data->gallery_smp_f,
                                ];
                            @endphp

                            @foreach ($photos as $photo)
                                @if ($photo)
                                    <div
                                        class="overflow-hidden rounded-xl break-inside-avoid object-cover transition-transform duration-300 hover:scale-120">
                                        <img src="{{ asset('storage/' . $photo) }}" class="w-full h-auto  "
                                            alt="">
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
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
                        @foreach ($acara as $gelombang)
                            <li>
                                <strong>{{ $gelombang->namaAcara }}</strong><br />
                                {{ $gelombang->awal_acara }} - {{ $gelombang->akhir_acara }}
                            </li>
                        @endforeach
                        <br>
                    </ul>
                    <a href="/form?unit_pendidikan=SMP&cnt=5"
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
                                Fotocopy Ijazah SD/MI Yang di legalisir 2 Lembar
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)]">
                            </i>
                            <span class="ml-2">
                                Fotocopy SKHUN SD/MI Yang di legalisir 2 Lembar
                            </span>
                        </li>
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
                                Foto Hitam Putih 3x4 2 Lembar
                            </span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)]">
                            </i>
                            <span class="ml-2">
                                Lembar NISN
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        </main>
    </div>

</x-layout>
