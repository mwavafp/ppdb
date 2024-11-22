<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Selamat Datang</h2>
    <x-tahapan></x-tahapan>
    
    
        <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
            
            
            <!-- Informasi Pendaftar -->
            <div class="mb-4">
                <p class="text-gray-600">Nama: <span class="border-b border-gray-400">__________________________</span></p>
                <p class="text-gray-600">Nomor Pendaftaran: <span class="border-b border-gray-400">_______________</span></p>
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
                    @php
                        $documents = [
                            'Fotokopi Kartu Identitas',
                            'Pas Foto 3x4 (2 Lembar)',
                            'Fotokopi Ijazah Terakhir',
                            'Surat Pernyataan',
                            'Surat Keterangan Sehat',
                        ];
   
                    @endphp
    
                    @foreach ($documents as $index => $document)
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $document }} </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <label class="flex items-center justify-center">
                                <span  class="text-gray-600">Belum</span>
                            </label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
            <!-- Informasi Tambahan -->
            <div class="mt-6">
                <p class="text-gray-600">Tanggal: <span class="border-b border-gray-400">_______________</span></p>
                <p class="text-gray-600">Petugas Verifikasi: <span class="border-b border-gray-400">__________________________</span></p>
            </div>
        </div>
   
    </x-layout>
