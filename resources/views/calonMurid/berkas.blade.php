<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-tahapan></x-tahapan>


    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10 h-[100vh]">


        <!-- Informasi Pendaftar -->
        <div class="mb-4">
            <p class="text-gray-600">Nama: <span class="border-b border-gray-400"> {{ $all_data->name }}</span></p>

        </div>
        <!-- Tabel Checklist -->
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">No.</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Jenis Berkas</th>
                    <th class="border border-gray-300 px-4 py-2 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Baris 1 -->
                <tr class="bg-white hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2 text-center">1</td>
                    <td class="border border-gray-300 px-4 py-2"> Fotocopy Kartu Keluarga</td>

                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($all_data->kk === 'diserahkan')
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-green-600 rounded-lg">Sudah</span>
                        @else
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum</span>
                        @endif
                    </td>

                    <!-- Baris 2 -->
                <tr class="bg-white hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2 text-center">3</td>
                    <td class="border border-gray-300 px-4 py-2">Pas Foto 3x4 (2 Lembar) </td>

                    <td class="border border-gray-300 px-4 py-2 text-center">
                        @if ($all_data->pas_foto === 'diserahkan')
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-green-600 rounded-lg">Sudah</span>
                        @else
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum</span>
                        @endif
                    </td>
                </tr>
                <!-- Baris 3 -->
                <tr class="bg-white hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2 text-center">4</td>
                    <td class="border border-gray-300 px-4 py-2">Ijazah Akhir</td>

                    <td class="border border-gray-300 px-4 py-2 text-center">

                        @if ($all_data->ijazah_akhir === 'diserahkan')
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-green-600 rounded-lg">Sudah</span>
                        @else
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum</span>
                        @endif
                    </td>
                </tr>
                <!-- Baris 4 -->
                <tr class="bg-white hover:bg-gray-50">
                    <td class="border border-gray-300 px-4 py-2 text-center">5</td>
                    <td class="border border-gray-300 px-4 py-2">KIP</td>

                    <td class="border border-gray-300 px-4 py-2 text-center">

                        @if ($all_data->kip === 'diserahkan')
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-green-600 rounded-lg">Sudah</span>
                        @else
                            <span
                                class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum</span>
                        @endif

                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</x-layout>
