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
                    <div
                        class="content-2 flex-1 flex items-center justify-center object-cover transition-transform duration-300 hover:scale-120">
                        <img src="{{ asset('storage/' . $teks->image_pondok) }}"
                            class="rounded-xl max-w-full max-h-[600px] object-cover object-center " alt="">
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
                    <span class="text-[oklch(62.7%_0.194_149.214)]">Gallery Kegiatan</span>
                </p>
                <div id="gallery-photo" class="max-w-full mx-auto px-4 py-8 max-h-1/2">
                    <div class="columns-1 sm:columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
                        @foreach ($all_teks as $data)
                            @php
                                $photos = [
                                    $data->gallery_pondok_a,
                                    $data->gallery_pondok_b,
                                    $data->gallery_pondok_c,
                                    $data->gallery_pondok_d,
                                    $data->gallery_pondok_e,
                                    $data->gallery_pondok_f,
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

                <div id="" class='flex flex-col'>
                    <div class="flex ">
                        <div class="sma mr-4 ">
                            <div class="bg-white p-6 rounded-md shadow-md  mb-4 tabel-1">
                                <h2 class="text-[oklch(62.7%_0.194_149.214)] text-lg font-bold mb-4">
                                    JADWAL PENDAFTARAN PONDOK + SMA
                                </h2>
                                <ul class="space-y-2 mb-4">
                                    @foreach ($acara as $gelombang)
                                        <li>
                                            <strong>{{ $gelombang->namaAcara }}</strong><br />
                                            {{ $gelombang->awal_acara }} - {{ $gelombang->akhir_acara }}
                                        </li>
                                    @endforeach
                                    <br>
                                    <a href='/form?unit_pendidikan=PONDOK_SMA&cnt=1'
                                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded-md">
                                        DAFTAR KLIK DISINI
                                    </a>
                            </div>
                        </div>
                        <div class="smp ml-4">
                            <div class="bg-white  p-6 rounded-md shadow-md mb-4 tabel-1">
                                <h2 class="text-[oklch(62.7%_0.194_149.214)] text-lg font-bold mb-4">
                                    JADWAL PENDAFTARAN PONDOK + SMP
                                </h2>
                                <ul class="space-y-2 mb-4">
                                    @foreach ($acara as $gelombang)
                                        <li>
                                            <strong>{{ $gelombang->namaAcara }}</strong><br />
                                            {{ $gelombang->awal_acara }} - {{ $gelombang->akhir_acara }}
                                        </li>
                                    @endforeach
                                    <br>
                                    <a href='/form?unit_pendidikan=PONDOK_SMP&cnt=1'
                                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded-md">
                                        DAFTAR KLIK DISINI
                                    </a>
                            </div>
                        </div>
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
    </div>
</x-layout>
