
<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <!--(x-slot)Digunakan untuk pemanggillan yang dapat disalurkan ke child nya-->
    <div class="section-1 flex justify-center">
        <img src="/images/banner.png" alt="">
    </div>
    <div class="section-2  -">
        <div class="text-3xl text-center font-bold bg-gradient-to-r from-orange to-reds text-white mb-8 rounded-b-full">
            <p class="py-8">Jenjang Pendidikan</p>
        </div>
        <div class="flex justify-center mb-8">
            <x-card-sekolah>TK</x-card-sekolah>
            <x-card-sekolah>SD</x-card-sekolah>
            <x-card-sekolah>SMP</x-card-sekolah>
            <x-card-sekolah>SMA</x-card-sekolah>
        </div>
        <div class="flex justify-center mb-8">
            <x-card-sekolah>TPQ</x-card-sekolah>
            <x-card-sekolah>MADIN</x-card-sekolah>
            <x-card-sekolah>PONDOK</x-card-sekolah>
        </div>
    </div>
    <div class="section-3 ">
        <div class="background flex bg-gradient-to-r from-orange to-reds text-white p-16 ">
            <div class="content-1 flex-1 mr-8">
                <p class="text-right text-xl font-bold mb-8">Selamat Datang Di PMB Yayasan Nurul Huda</p>
                <p class="text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                <div class=" w-72 mx-16 my-8">
                    <img src="/images/book.png" alt="" class="w-32 h-32 mx-auto mb-12">
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
            </div>
            
        </div>
    </div>
    <div class="section-5 ">
        <div class="background flex bg-gradient-to-r from-orange to-reds text-white px-16 py-8 ">
            <div class="content-1 flex-iinitial items-center flex mr-14">
                <img src="/images/gambar-1.png" alt="" width="800" class="mx-auto my-auto rounded-xl ">
            </div>
            <div class="content-2 flex-initial ">
                <p class="text-center text-xl font-bold mb-8">VISI & MISI</p>
                <p class="text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
            
        </div>
    </div>
    <div class="section-6 ">
        <div class="background flex bg-gradient-to-r from-blue to-purple text-white px-16 py-8 ">
            <div class="content-1 flex-1 mr-8 ">
                <p class="text-center text-xl font-bold mb-8">KEUNGGULAN KAMI</p>
                <p class="text-justify ">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
                    <p class="text-justify text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                <div class=" w-72 mx-8  text-center">
                    <div class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                        <p class="text-center text-3xl text-white font-bold">2</p>
                    </div>
                    <p class="text-xl font-bold mb-4 ">Membawa Kk</p>
                    <p class="text-justify text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                <div class=" w-72 mx-8  text-center">
                    <div class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                        <p class="text-center text-3xl text-white font-bold">3</p>
                    </div>
                    <p class="text-xl font-bold mb-4 ">Membawa Kk</p>
                    <p class="text-justify text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                <div class=" w-72 mx-8  text-center">
                    <div class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                        <p class="text-center text-3xl text-white font-bold">4</p>
                    </div>
                    <p class="text-xl font-bold mb-4 ">Membawa Kk</p>
                    <p class="text-justify text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                </div>
                <div class=" w-72 mx-8  text-center">
                    <div class="w-20 h-20 mb-4 mx-auto bg-gradient-to-r from-blue to-purple rounded-full flex items-center justify-center">
                        <p class="text-center text-3xl text-white font-bold">5</p>
                    </div>
                    <p class="text-xl font-bold mb-4 ">Membawa Kk</p>
                    <p class="text-justify text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
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
  
</x-layout>