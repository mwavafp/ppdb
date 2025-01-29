
<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <!--(x-slot)Digunakan untuk pemanggillan yang dapat disalurkan ke child nya-->
    <div class="section-1 flex justify-center">
        <img src="/images/banner.png" alt="">
    </div>
    <div class="section-2  -">
        <div class="text-3xl text-center font-bold bg-primary  text-white mb-8 rounded-b-full">
            <p class="py-8">Jenjang Pendidikan</p>
        </div>
        <div class="flex justify-center mb-8 x">
            <x-card-sekolah href="/tk">TK</x-card-sekolah>
            <x-card-sekolah href="/sd">SD</x-card-sekolah>
            <x-card-sekolah href="/smp">SMP</x-card-sekolah>
            <x-card-sekolah href="/sma">SMA</x-card-sekolah>
        </div>
        <div class="flex justify-center mb-8">
            <x-card-sekolah href="/tpq">TPQ</x-card-sekolah>
            <x-card-sekolah href="/madin">MADIN</x-card-sekolah>
            <x-card-sekolah href="/pondok">PONDOK</x-card-sekolah>
        </div>
    </div>
    <div class="section-3 ">
        <div class="background flex bg-gradient-to-r from-primary to-secondary text-white p-16 ">
            <div class="content-1 flex-1 mr-8">
                <p class="text-right text-xl font-bold mb-8">Selamat Datang Di PMB Yayasan Nurul Huda</p>
                @foreach ($all_teks as $teks)
                <p class="text-justify">
                {{ $teks->deskripsi }}
                </p>
            </div>
            <div class="content-2 flex-1 items-center flex ">
                <img src="/images/gambar-1.png" alt="" class="mx-auto my-auto rounded-xl ">
            </div>
        </div>
    </div>
    <div class="section-4">
        <div class="box p-12">
            <div class="text-center font-bold text-3xl mb-12"><p>Alasan Memilihi Yayasan Nurul Huda</p></div>
            <div class="card-box flex flex-wrap justify-center ">
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">{{ $teks->alasan_memilih_1 }}</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">{{ $teks->alasan_memilih_2 }}</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">{{ $teks->alasan_memilih_3 }}</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">{{ $teks->alasan_memilih_4 }}</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">{{ $teks->alasan_memilih_5 }}</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">{{ $teks->alasan_memilih_6 }}</p>
                </div>
            </div>
            
        </div>
    </div>
    <div class="section-5 ">
        <div class="background flex bg-gradient-to-r from-primary to-secondary text-white px-16 py-8 ">
            <div class="content-1 flex-initial items-center flex mr-14">
                <img src="/images/gambar-1.png" alt="" width="800" class="mx-auto my-auto rounded-xl ">
            </div>
            <div class="content-2 flex-initial ">
                <p class="text-center text-xl font-bold mb-8">VISI & MISI</p>
                <p class="text-justify">
                {{ $teks->visi_misi }}
                </p>
            </div>

        </div>
    </div>
    <div class="section-6 ">
        <div class="background flex bg-gradient-to-r from-blue to-purple text-white px-16 py-8 ">
            <div class="content-1 flex-1 mr-8 ">
                <p class="text-center text-xl font-bold mb-8">KEUNGGULAN KAMI</p>
                <p class="text-justify ">
                {{ $teks->keunggulan }}
                </p>
            </div>
            <div class="content-2 flex-1 items-center flex">
                <img src="/images/gambar-1.png" alt="" class="mx-auto my-auto rounded-xl ">
            </div>
            
            
        </div>
    </div>
    <div class="section-7">
        <div class="box p-12">
            <p class="text-left text-4xl font-bold mb-12 text-center"><span class="text-orange">Alur</span> <span>Pendaftaran</span></p>
            <div class="card-box flex  justify-center">
                <div class=" w-72 mx-8  text-center">
                    <div class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                        <p class="text-center text-3xl text-white font-bold">1</p>
                    </div>
                    <p class="text-xl font-bold mb-4 ">Membawa Kk</p>
                    <p class="text-justify text-sm">{{ $teks->alur_pendaftaran_1 }}</p>
                </div>
                <div class=" w-72 mx-8  text-center">
                    <div class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                        <p class="text-center text-3xl text-white font-bold">2</p>
                    </div>
                    <p class="text-xl font-bold mb-4 ">Membawa Kk</p>
                    <p class="text-justify text-sm">{{ $teks->alur_pendaftaran_2 }}</p>
                </div>
                <div class=" w-72 mx-8  text-center">
                    <div class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                        <p class="text-center text-3xl text-white font-bold">3</p>
                    </div>
                    <p class="text-xl font-bold mb-4 ">Membawa Kk</p>
                    <p class="text-justify text-sm">{{ $teks->alur_pendaftaran_3 }}</p>
                </div>
                <div class=" w-72 mx-8  text-center">
                    <div class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                        <p class="text-center text-3xl text-white font-bold">4</p>
                    </div>
                    <p class="text-xl font-bold mb-4 ">Membawa Kk</p>
                    <p class="text-justify text-sm">{{ $teks->alur_pendaftaran_4 }}</p>
                </div>
                <div class=" w-72 mx-8  text-center">
                    <div class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                        <p class="text-center text-3xl text-white font-bold">5</p>
                    </div>
                    <p class="text-xl font-bold mb-4 ">Membawa Kk</p>
                    <p class="text-justify text-sm">{{ $teks->alur_pendaftaran_5 }}</p>
                </div>
            </div>
            
        </div>
    </div>
    <div class="section-8 ">
        <div class="background flex  px-16 py-12 bg-gray-50 ">
            <div class="content-1 flex-1 mr-8 ">
                <p class="text-left text-4xl font-bold mb-8"><span class="text-orange">Syarat</span> <span>Pendaftaran</span></p>
                <p class="text-lg font-normal mb-12">Untuk memenuhi persyaratan pendaftaran santri baru, perlu beberapa berkas
                    yang harus disiapkan:</p>

                <ul>
                    <li>
                        <div class="flex items-center mb-8">
                            <img src="/images/checklist.png" alt="" class="w-8 h-8 mr-8">
                            <span class="text-xl font-bold mr-8">Membawa KTP</span><span class="text-lg">sebanyak 3 lembar</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center mb-8">
                            <img src="/images/checklist.png" alt="" class="w-8 h-8 mr-8">
                            <span class="text-xl font-bold mr-8">Membawa KTP</span><span class="text-lg">sebanyak 3 lembar</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center mb-8">
                            <img src="/images/checklist.png" alt="" class="w-8 h-8 mr-8">
                            <span class="text-xl font-bold mr-8">Membawa Kk</span><span class="text-lg">sebanyak 3 lembar</span>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center mb-8">
                            <img src="/images/checklist.png" alt="" class="w-8 h-8 mr-8">
                            <span class="text-xl font-bold mr-8">Membawa BPJS</span><span class="text-lg">sebanyak 3 lembar</span>
                        </div>
                    </li>
                   
                </ul>
                
            </div>
            <div class="content-2 flex-1 items-center flex">
                <img src="/images/gambar-1.png" alt="" class="mx-auto my-auto rounded-tl-larges rounded-tr-xl rounded-br-larges rounded-bl-xl">
            </div>    
        </div>
    </div>
@endforeach
  
</x-layout>