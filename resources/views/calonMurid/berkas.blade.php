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
        <!-- Baris 1 -->
        <tr class="bg-white hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2 text-center">1</td>
            <td class="border border-gray-300 px-4 py-2">Fotokopi Kartu Identitas</td>
            
            <td class="border border-gray-300 px-4 py-2 text-center">
                <label class="flex items-center justify-center">
                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum</span>
                </label>
            </td>
        </tr>
        <!-- Baris 2 -->
        <tr class="bg-white hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2 text-center">2</td>
            <td class="border border-gray-300 px-4 py-2">Pas Foto 3x4 (2 Lembar)</td>
            
            <td class="border border-gray-300 px-4 py-2 text-center">
                <label class="flex items-center justify-center">
                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum</span>
                </label>
            </td>
        </tr>
        <!-- Baris 3 -->
        <tr class="bg-white hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2 text-center">3</td>
            <td class="border border-gray-300 px-4 py-2">Fotokopi Ijazah Terakhir</td>
            
            <td class="border border-gray-300 px-4 py-2 text-center">
                <label class="flex items-center justify-center">
                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum</span>
                </label>
            </td>
        </tr>
        <!-- Baris 4 -->
        <tr class="bg-white hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2 text-center">4</td>
            <td class="border border-gray-300 px-4 py-2">Surat Pernyataan</td>
        
            <td class="border border-gray-300 px-4 py-2 text-center">
                <label class="flex items-center justify-center">
                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum</span>
                </label>
            </td>
        </tr>
        <!-- Baris 5 -->
        <tr class="bg-white hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2 text-center">5</td>
            <td class="border border-gray-300 px-4 py-2">Surat Keterangan Sehat</td>
            
            <td class="border border-gray-300 px-4 py-2 text-center">
                <label class="flex items-center justify-center">
                    <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum</span>
                </label>
            </td>
        </tr>
    </tbody>
</table>
        </div>
   
    </x-layout>
