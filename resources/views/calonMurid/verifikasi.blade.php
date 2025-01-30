<x-layout>
    <x-slot:title>test</x-slot:title>
    <div class="w-full m-auto">
        <x-tahapan></x-tahapan>
    </div>

    <main class="container mx-auto mt-10 flex justify-center h-[80vh]  ">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden w-full max-w-2xl">
            <div class="bg-green-500 text-white text-center py-4">
                <h1 class="text-xl font-bold"> Verifikasi Data Siswa </h1>
            </div>

            <div class="p-6 flex">
                <!-- Gambar profil, bisa diisi dengan path gambar jika tersedia -->
                <div>
                    <p class="text-lg"><span class="font-bold"> Nama : </span> {{ $all_data[0]->name }}</p>
                    <p class="text-lg"><span class="font-bold"> NISN: </span> {{ $all_data[0]->nisn }}</p>
                    <p class="text-lg"><span class="font-bold"> Jenjang: </span> {{ $all_data[0]->unt_pendidikan }}</p>
                    <p class="text-lg"><span class="font-bold"> Kelas: </span> {{ $all_data[0]->kelas }}</p>
                    <p class="text-lg"><span class="font-bold"> Alamat: </span> {{ $all_data[0]->alamat }}</p>
                </div>
            </div>
        </div>
    </main>
</x-layout>
