<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="section-2">
        <div
            class="text-3xl text-center font-bold bg-[oklch(62.7%_0.194_149.214)] text-white mb-8 lg:rounded-b-full rounded-b-2xl">
            <p class="py-8">INFORMASI PONDOK</p>
        </div>

        @foreach ($all_teks as $teks)
            <div class="section-3 ">
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
                            class="rounded-xl w-full max-h-[600] object-cover " alt="">
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
              <div id="gallery-photo" class="max-w-full mx-auto px-4 py-8">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
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
                                        class="aspect-[13/9] overflow-hidden rounded-xl transition-transform duration-300 hover:scale-120">
                                        <img src="{{ asset('storage/' . $photo) }}" class="w-full h-full object-cover"
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
                                    JADWAL PENDAFTARAN PONDOK
                                </h2>
                                <ul class="space-y-2 mb-4">
                                    @foreach ($acara as $gelombang)
                                        <li>
                                            <strong>{{ $gelombang->namaAcara }}</strong><br />
                                            {{ $gelombang->awal_acara }} - {{ $gelombang->akhir_acara }}
                                        </li>
                                    @endforeach
                                    <br>
                                    <a href='/form?unit_pendidikan=PONDOK&cnt=1'
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
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)]">
                                </i>
                                <span class="ml-2">
                                    Fotocopy Kartu Keluarga Sebanyak 2 Lembar
                                </span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)]">
                                </i>
                                <span class="ml-2">
                                    Fotocopy Akte Kelahiran Sebanyak 2 Lembar
                                </span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check text-[oklch(62.7%_0.194_149.214)]">
                                </i>
                                <span class="ml-2">
                                    Foto Berwarna 3x4 Sebanyak 2 Lembar
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>
    </div>
    </div>
</x-layout>
