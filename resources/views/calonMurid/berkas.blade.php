<x-layout-login>
    <x-slot:title>Hasil Seleksi</x-slot:title>
    <x-tahapan></x-tahapan>
    <main class="flex-grow w-full px-10 my-7 p-4">
        <div class="bg-white shadow-lg w-11/12 mx-auto rounded-lg h-auto">

            <div class="p-8">
                <div class="flex mt-1">
                    <p class="pr-24">Nama</p>
                    <p class="pr-2">:</p>
                    <p>{{ $berkas->name }}</p>
                </div>
                <div class="flex mt-3">
                    <p class="pr-6">No. Pendaftaran</p>
                    <p class="pr-2">:</p>
                    <p>{{ $berkas->nisn }}</p>
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
                                @if ($berkas->ijazah_akhir === 'diserahkan')
                                    <i class="fa fa-check bg-green-500 text-2xl" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times text-red-700 text-2xl" aria-hidden="true"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-500 py-2 text-center">Akta Kelahiran</td>
                            <td class="border border-gray-500 py-2 text-center">
                                @if ($berkas->pas_foto === 'diserahkan')
                                    <i class="fa fa-check bg-green-500 text-2xl" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times text-red-700 text-2xl" aria-hidden="true"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-500 py-2 text-center">Kartu Keluarga</td>
                            <td class="border border-gray-500 py-2 text-center">
                                @if ($berkas->kk === 'diserahkan')
                                    <i class="fa fa-check text-green-500 text-2xl" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times text-red-700 text-2xl" aria-hidden="true"></i>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-gray-500 py-2 text-center">KIP</td>
                            <td class="border border-gray-500 py-2 text-center">
                                @if ($berkas->kip === 'diserahkan')
                                    <i class="fa fa-check bg-green-500 text-2xl" aria-hidden="true"></i>
                                @else
                                    <i class="fa fa-times text-red-700 text-2xl" aria-hidden="true"></i>
                                @endif
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
                            <li>Untuk informasi lebih lanjut, silakan hubungi panitia melalui kontak yang tersedia di
                                website ini.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout-login>
