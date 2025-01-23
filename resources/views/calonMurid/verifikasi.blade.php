<x-layout>
    <x-slot:title>Verifikasi Data Siswa</x-slot:title>
    <x-tahapan></x-tahapan>
    <main class="container mx-auto mt-10 flex justify-center">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full max-w-2xl">
            <div class="bg-green-500 text-white text-center py-4">
                <h1 class="text-xl font-bold"> Verifikasi Data Siswa </h1>
            </div>

            <div class="p-6 flex">
                <img alt="Foto Profil" class="h-24 w-24 bg-gray-300 rounded-md mr-6" />
                <div>
                    <p class="text-lg"><span class="font-bold"> Nama </span>: Mas Rusdi</p>
                    <p class="text-lg"><span class="font-bold"> NISN </span>: 9999999</p>
                    <p class="text-lg"><span class="font-bold"> No. Pendaftaran </span>: 01010101</p>
                    <p class="text-lg"><span class="font-bold"> Jenjang </span>: TK</p>
                    <p class="text-lg"><span class="font-bold"> Kelas </span>: 2A</p>
                    <p class="text-lg"><span class="font-bold"> Alamat </span>: Jl. Ngawi</p>
                </div>
            </div>

            <div class="border-t p-6">
                <!-- Tombol Pemberkasan -->
                <p class="text-lg mb-4">
                    <span class="font-bold">Pemberkasan</span>:
                    <a href="{{ $pemberkasanLengkap ? : '/berkas' }}" 
                       class="px-3 py-1 rounded text-white font-semibold {{ $pemberkasanLengkap ? 'bg-green-500' : 'bg-red-500' }}">
                        {{ $pemberkasanLengkap ? 'LENGKAP' : 'BELUM LENGKAP' }}
                    </a>
                </p>

                <!-- Tombol Status Pembayaran -->
                <p class="text-lg">
                    <span class="font-bold">Status Pembayaran</span>:
                    <a href="{{ $pembayaranLunas ? : '/pembayaran' }}" 
                       class="px-3 py-1 rounded text-white font-semibold {{ $pembayaranLunas ? 'bg-green-500' : 'bg-red-500' }}">
                        {{ $pembayaranLunas ? 'LUNAS' : 'BELUM LUNAS' }}
                    </a>
                </p>
            </div>
        </div>
    </main>
</x-layout>
