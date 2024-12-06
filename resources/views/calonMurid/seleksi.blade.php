<x-layout>
    <x-slot:title>Hasil Seleksi</x-slot:title>

    <div class="bg-gradient-to-r from-orange to-reds p-4 flex justify-center items-center">
        <h1 class="text-white text-xl font-bold">Hasil Seleksi</h1>
    </div>

    <main class="flex-grow w-full px-10 my-7 p-4">
        <div class="bg-white shadow-lg w-11/12 mx-auto rounded-lg h-auto">
            <div class="bg-green-500 text-center text-white py-4 w-full rounded-t-lg font-bold">
                SELAMAT ANDA TELAH DINYATAKAN LULUS SELEKSI PPDB
            </div>
            <div class="p-8">
                <div class="flex mt-1">
                    <p class="pr-24">Nama</p>
                    <p class="pr-2">:</p>
                    <p>Fatwa</p>
                </div>
                <div class="flex mt-3">
                    <p class="pr-6">No. Pendaftaran</p>
                    <p class="pr-2">:</p>
                    <p>12345</p>
                </div>
                <p class="mt-9 font-bold">• Berkas Yang Telah Dikumpulkan Untuk Daftar Ulang</p>
                    <table class="w-full border-collapse border mt-5 border-gray-300">
                        <thead>
                            <tr class="bg-gray-100 text-black">
                                <th class="border border-gray-500 py-2">Jenis Dokumen</th>
                                <th class="border border-gray-500 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-gray-500 py-2 text-center">Ijazah</td>
                                <td class="border border-gray-500 py-2 text-center">
                                    <img src="https://github.com/0xcu8e5p4c3/Contact-Page/blob/master/img/check-icon.png?raw=true" alt="Cross Icon" class="h-6 w-6 mx-auto">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-500 py-2 text-center">Akta Kelahiran</td>
                                <td class="border border-gray-500 py-2 text-center">
                                    <img src="https://github.com/0xcu8e5p4c3/Contact-Page/blob/master/img/check-icon.png?raw=true" alt="Check Icon" class="h-6 w-6 mx-auto">
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-gray-500 py-2 text-center">Kartu Keluarga</td>
                                <td class="border border-gray-500 py-2 text-center">
                                    <img src="https://github.com/0xcu8e5p4c3/Contact-Page/blob/master/img/remove-icon.png?raw=true" alt="Check Icon" class="h-6 w-6 mx-auto">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-8">
                    <div class="bg-gray-100 p-4 rounded-md mt-6">
                        <p class="font-bold">Langkah-Langkah Selanjutnya:</p>
                        <ul class="list-disc pl-6 mt-3">
                            <li>Pastikan dokumen yang belum diunggah segera dilengkapi.</li>
                            <li>Datang ke sekolah untuk proses verifikasi data pada jadwal yang telah ditentukan.</li>
                            <li>Bawa seluruh dokumen asli untuk pengecekan oleh panitia.</li>
                            <li>Untuk informasi lebih lanjut, silakan hubungi panitia melalui kontak yang tersedia di website ini.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
