<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Seleksi PPDB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">

    <!-- Header -->
    <div class="bg-green-500 text-white text-center py-5 font-bold">
        <h1>Yayasan Nurul Huda</h1>
    </div>

    <!-- Container -->
    <div class="container mx-auto my-8 bg-white border border-gray-300 p-6 rounded-md shadow-md">
        
        <!-- Menu -->
        <div class="flex justify-between mb-6">
            <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Biodata</button>
            <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Informasi Pembayaran</button>
            <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Seleksi</button>
            <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Verifikasi Data</button>
            <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">Daftar Ulang</button>
        </div>

        <!-- Title -->
        <div class="text-center text-green-700 font-bold text-xl mb-4">
            <h2>SELAMAT! ANDA DINYATAKAN LULUS SELEKSI PPDB</h2>
        </div>

        <!-- Data Table -->
        <div class="mb-6">
            <table class="w-full border-collapse border border-gray-300">
                <tr>
                    <th class="bg-orange-500 text-white py-2 px-4 border border-gray-300">Nama</th>
                    <td class="py-2 px-4 border border-gray-300">Nama Contoh</td>
                </tr>
                <tr>
                    <th class="bg-orange-500 text-white py-2 px-4 border border-gray-300">No Pendaftaran</th>
                    <td class="py-2 px-4 border border-gray-300">123456</td>
                </tr>
            </table>
        </div>

        <!-- Documents Table -->
        <div>
            <h3 class="font-bold text-lg mb-2">Berkas yang telah dikumpulkan untuk Daftar Ulang:</h3>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="bg-orange-500 text-white py-2 px-4 border border-gray-300">Jenis Dokumen</th>
                        <th class="bg-orange-500 text-white py-2 px-4 border border-gray-300">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 px-4 border border-gray-300">Ijazah</td>
                        <td class="py-2 px-4 border border-gray-300 text-green-500">&#10004;</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border border-gray-300">Akta Kelahiran</td>
                        <td class="py-2 px-4 border border-gray-300 text-red-500">&#10008;</td>
                    </tr>
                    <tr>
                        <td class="py-2 px-4 border border-gray-300">Kartu Keluarga</td>
                        <td class="py-2 px-4 border border-gray-300 text-green-500">&#10004;</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
</x-layout>