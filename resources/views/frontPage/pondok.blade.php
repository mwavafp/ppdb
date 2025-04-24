<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="section-2">
        <div
            class="text-3xl text-center font-bold bg-[oklch(62.7%_0.194_149.214)] text-white mb-8 lg:rounded-b-full rounded-b-2xl">
            <p class="py-8">INFORMASI PONDOK</p>
        </div>

        @foreach ($all_teks as $teks)
            <div class="section-3 px-2">
                <div class="background flex flex-col lg:flex-row bg-white p-6 md:p-12 rounded-xl gap-6">
                    <div class="content-1 flex-1">
                        <p class="text-3xl md:text-4xl font-bold mb-6 text-center text-green-600">
                            Selamat Datang di <br> Pondok Pesantren Nurul Huda
                        </p>
                        <div class="bg-gray-100 p-4 md:p-6 rounded-md shadow-lg transition-transform hover:scale-105">
                            <p class="text-justify text-black">
                                {!! $teks->deskripsi !!}
                            </p>
                        </div>
                    </div>
                    <div class="content-2 flex-1 flex items-center justify-center">
                        <img src="/images/compo_pondok.jpg" alt="" class="rounded-xl max-w-full h-auto">
                    </div>
                </div>
            </div>

            <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 mx-8">
                <div class="bg-gray-100 p-4 rounded-md shadow-md">
                    <h2 class="text-green-600 text-lg font-bold mb-4 text-center">VISI</h2>
                    <p class="text-black">{!! $teks->visi !!}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow-md">
                    <h2 class="text-green-600 text-lg font-bold mb-4 text-center">MISI</h2>
                    <p class="text-black text-justify leading-relaxed">
                        {!! $teks->misi !!}
                    </p>
                </div>
            </section>
        @endforeach

        <div class="section-7 mt-12">
            <div class="box px-4 md:px-12">
                <p class="text-3xl md:text-4xl font-bold mb-8 text-center">
                    <span class="text-orange">Jenis</span> <span>Kegiatan</span>
                </p>
                <div class="flex flex-wrap justify-center gap-8">
                    @foreach (['OSIS', 'Futsal', 'English Club', 'Paskibra', 'Hadroh/Banjari'] as $i => $kegiatan)
                        <div class="w-full sm:w-72 text-center">
                            <div
                                class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-[oklch(45.7%_0.24_277.023)] to-[oklch(51.8%_0.253_323.949)] rounded-full flex items-center justify-center">
                                <p class="text-3xl text-white font-bold">{{ $i + 1 }}</p>
                            </div>
                            <p class="text-xl font-bold mb-4">{{ $kegiatan }}</p>
                            <img src="/images/compro_tk.jpg" alt="Gambar {{ $kegiatan }}"
                                class="w-full h-auto mb-4" />
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-6">
                <div class="bg-white p-6 rounded-md shadow-md">
                    <h2 class="text-[oklch(62.7%_0.194_149.214)] text-lg font-bold mb-4">
                        ALUR PENDAFTARAN
                    </h2>
                    <ul class="space-y-4">
                        @foreach ([['DAFTAR', 'Selesai mendaftar...'], ['ISI FORMULIR PENDAFTARAN', 'Isi dan lengkapi...'], ['PEMBAYARAN', 'Lakukan pembayaran...'], ['ISI BIODATA', 'Lengkapi biodata...'], ['CETAK KARTU', 'Lakukan cetak kartu...']] as $step)
                            <li class="flex items-start">
                                <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)] mt-1"></i>
                                <div class="ml-2">
                                    <strong>STEP {{ $loop->iteration }} - {{ $step[0] }}</strong>
                                    <p>{{ $step[1] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex flex-col gap-4">
                    <div class="bg-white p-6 rounded-md shadow-md">
                        <h2 class="text-[oklch(62.7%_0.194_149.214)] text-lg font-bold mb-4">
                            JADWAL PENDAFTARAN
                        </h2>
                        <ul class="space-y-2 mb-4 text-sm">
                            <li>Gelombang 1 :<br>2 Desember 2024 - 28 Februari 2025</li>
                            <li>Gelombang 2 :<br>1 Maret - 31 Mei 2025</li>
                            <li>Gelombang 3 :<br>1 Juni - 14 Juli 2025</li>
                        </ul>
                        <a href="/form?unit_pendidikan=PONDOK&cnt=1"
                            class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded-md block text-center">
                            DAFTAR KLIK DISINI
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-md shadow-md">
                        <h2 class="text-[oklch(62.7%_0.194_149.214)] text-lg font-bold mb-4">
                            BERKAS YANG HARUS DISIAPKAN
                        </h2>
                        <ul class="space-y-2 text-sm">
                            @foreach (['Fotocopy Ijazah 3 Lembar', 'Fotocopy SKHUN 3 Lembar', 'Fotocopy Akte Kelahiran 3 Lembar', 'Fotocopy KK 3 Lembar', 'Foto 3x4 3 Lembar'] as $berkas)
                                <li class="flex items-center">
                                    <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)]"></i>
                                    <span class="ml-2">{{ $berkas }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
