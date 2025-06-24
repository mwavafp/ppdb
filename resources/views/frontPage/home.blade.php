<x-layout>
    <link rel="stylesheet" href="{{ asset('css/tiptap.css') }}">
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="section-1 flex justify-center">
        <img src="{{ asset('storage/' . $all_teks[0]->image_banner) }}"
            class="rounded-xl w-full max-h-[300px] object-cover object-center " alt="Banner">
    </div>

    <div class="section-2">
        <div
            class="text-3xl text-center font-bold bg-[oklch(62.7%_0.194_149.214)] text-white mb-8 lg:rounded-b-full rounded-b-2xl">
            <p class="py-8">Jenjang Pendidikan</p>
        </div>
        <div class="flex flex-wrap justify-center gap-4 mb-8 lg:flex-none">

            <x-card-sekolah href="/tk">TK</x-card-sekolah>
            <x-card-sekolah href="/sd">SD</x-card-sekolah>

            <x-card-sekolah href="/smp">SMP</x-card-sekolah>
            <x-card-sekolah href="/sma">SMA</x-card-sekolah>


        </div>
        <div class="flex flex-wrap justify-center gap-4 mb-8">
           
            <x-card-sekolah href="/madin">MADIN & TPQ</x-card-sekolah>
            <x-card-sekolah href="/pondok">PONDOK</x-card-sekolah>
        </div>
    </div>

    <div class="section-3">
        <div
            class="background flex flex-col md:flex-row bg-gradient-to-r from-[oklch(62.7%_0.194_149.214)] to-[oklch(90.5%_0.182_98.111)] text-white p-8 md:p-16">
            <div class="content-1 flex-1 mb-8 md:mb-0 md:mr-8">
                <p class="text-right text-xl font-bold mb-8">Selamat Datang Di PMB Yayasan Nurul Huda</p>
                @foreach ($all_teks as $teks)
                    <p class="text-justify"> {!! $teks->deskripsi !!}</p>
            </div>
            <div class="content-2 flex-1 flex items-center justify-center">
                <img src="{{ asset('storage/' . $teks->image_selamat_datang) }}"
                    class="rounded-xl w-full max-w-[600px] h-auto object-cover transition-transform duration-300 hover:scale-120"
                    alt="Banner">
            </div>

        </div>
    </div>

    <div class="section-4">
        <div class="box p-4 md:p-12">
            <div class="text-center font-bold text-3xl mb-12">
                <p>Alasan Memilihi Yayasan Nurul Huda</p>
            </div>
            <div class="card-box flex flex-wrap justify-center">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="w-full sm:w-72 mx-4 sm:mx-8 my-8">
                        <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                        <p class="text-justify">{!! $teks->{'alasan_memilih_' . $i} !!}</p>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="section-5">
        <div
            class="background flex flex-col lg:flex-row bg-gradient-to-r from-[oklch(62.7%_0.194_149.214)] to-[oklch(90.5%_0.182_98.111)] text-white px-4 md:px-16 py-8">
            <div class="content-2 flex-1 flex items-center justify-center ">
                <img src="{{ asset('storage/' . $teks->image_visi) }}"
                    class="rounded-xl w-full max-w-[600px] h-auto object-cover transition-transform duration-300 hover:scale-120"
                    alt="Banner">
            </div>
            <div class="content-2  flex-1 pl-6 ">
                <p class="text-center text-xl font-bold mb-8">VISI & MISI</p>
                <p class="text-justify">{!! $teks->visi_misi !!}</p>
            </div>
        </div>
    </div>

    <div class="section-6">
        <div
            class="background flex flex-col md:flex-row bg-gradient-to-r from-[oklch(45.7%_0.24_277.023)] to-[oklch(51.8%_0.253_323.949)] text-white px-4 md:px-16 py-8">
            <div class="content-1 flex-1 mb-8 md:mb-0 md:mr-8 ">
                <p class="text-center text-xl font-bold mb-8">KEUNGGULAN KAMI</p>
                <p class="text-justify">{!! $teks->keunggulan !!}</p>
            </div>
            <div class="content-2 flex-1 flex items-center justify-center ">
                <img src="{{ asset('storage/' . $teks->image_keunggulan) }}"
                    class="rounded-xl w-full max-w-[600px] h-auto object-cover transition-transform duration-300 hover:scale-120"
                    alt="Banner">
            </div>
        </div>
    </div>

    <div class="section-7">
        <div class="box p-4 md:p-12">
            <p class="text-center text-4xl font-bold mb-12"><span class="text-orange">Alur</span>
                <span>Pendaftaran</span>
            </p>
            <div class="card-box flex flex-wrap justify-center ">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="w-full sm:w-1/3 sm:text-center text-center p-4">
                        <div
                            class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-[oklch(45.7%_0.24_277.023)] to-[oklch(51.8%_0.253_323.949)] rounded-full flex items-center justify-center">
                            <p class="text-3xl text-white font-bold">{{ $i }}</p>
                        </div>
                        <p class="text-xl font-bold mb-4">Membawa Kk</p>
                        <p class="text-center text-sm">{!! $teks->{'alur_pendaftaran_' . $i} !!}</p>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="section-8">
        <div class="background flex flex-col md:flex-row px-4 md:px-16 py-12 bg-gray-50">
            <div class="content-1 flex-1 mb-8 md:mb-0 md:mr-8">
                <p class="text-left text-4xl font-bold mb-8"><span class="text-orange">Syarat</span>
                    <span>Pendaftaran</span>
                </p>
                <p class="text-lg font-normal mb-12">Untuk memenuhi persyaratan pendaftaran santri baru, perlu beberapa
                    berkas yang harus disiapkan:</p>
                <ul>
                    <li class="mb-8 flex items-center">
                        <img src="/images/checklist.png" alt="" class="w-8 h-8 mr-4">
                        <div><span class="text-xl font-bold mr-4">Membawa KTP</span><span class="text-lg">sebanyak 3
                                lembar</span></div>
                    </li>
                    <li class="mb-8 flex items-center">
                        <img src="/images/checklist.png" alt="" class="w-8 h-8 mr-4">
                        <div><span class="text-xl font-bold mr-4">Membawa KTP</span><span class="text-lg">sebanyak 3
                                lembar</span></div>
                    </li>
                    <li class="mb-8 flex items-center">
                        <img src="/images/checklist.png" alt="" class="w-8 h-8 mr-4">
                        <div><span class="text-xl font-bold mr-4">Membawa Kk</span><span class="text-lg">sebanyak 3
                                lembar</span></div>
                    </li>
                    <li class="mb-8 flex items-center">
                        <img src="/images/checklist.png" alt="" class="w-8 h-8 mr-4">
                        <div><span class="text-xl font-bold mr-4">Membawa BPJS</span><span class="text-lg">sebanyak 3
                                lembar</span></div>
                    </li>
                </ul>
            </div>
            <div class="content-2 flex-1 flex items-center justify-center">
                <img src="{{ asset('storage/' . $teks->image_daftar) }}"
                    class="rounded-xl w-full max-w-[600px] h-auto object-cover transition-transform duration-300 hover:scale-120"
                    alt="Banner">
            </div>
        </div>
    </div>
    @endforeach
</x-layout>
