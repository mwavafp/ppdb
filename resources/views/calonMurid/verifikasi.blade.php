<x-layout>
    <x-slot:title>test</x-slot:title>

    <div class="w-full m-auto">
        <x-tahapan></x-tahapan>
    </div>

    <main class="container mx-auto mt-10 flex justify-center mb-[130px] px-4">
        <div class="bg-white border-2 shadow-lg rounded-lg overflow-hidden w-full max-w-2xl">
            <!-- Header -->
            <div class="bg-green-500 text-white text-center py-4">
                <h1 class="text-xl font-bold">Verifikasi Data Siswa</h1>
            </div>

            <!-- Tabel Data -->
            <div class="p-6 overflow-x-auto">
                <table class="min-w-full text-sm border border-gray-300">
                    <tbody>
                        <tr class="border border-gray-300">
                            <td class="p-2 font-bold border border-gray-300 w-1/3">Nama</td>
                            <td class="p-2">{{ $all_data[0]->name }}</td>
                        </tr>
                        <tr class="border border-gray-300">
                            <td class="p-2 font-bold border border-gray-300">NISN</td>
                            <td class="p-2">{{ $all_data[0]->nisn }}</td>
                        </tr>
                        <tr class="border border-gray-300">
                            <td class="p-2 font-bold border border-gray-300">Jenjang</td>
                            <td class="p-2">{{ $all_data[0]->unt_pendidikan }}</td>
                        </tr>
                        <tr class="border border-gray-300">
                            <td class="p-2 font-bold border border-gray-300">Kelas</td>
                            <td class="p-2">{{ $all_data[0]->kelas }}</td>
                        </tr>
                        <tr class="border border-gray-300">
                            <td class="p-2 font-bold border border-gray-300">Alamat</td>
                            <td class="p-2">{{ $all_data[0]->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-layout>
