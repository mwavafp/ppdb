<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
        <x-tahapan></x-tahapan>    
                <h1 class="text-2xl text-center font-bold">Informasi Pembayaran</h1>
        
        <div class="px-9 py-5 flex space-x-20">
            <table>
                <tr>
                    <td class="pr-2 py-1 font-medium">No.Pendaftaran</td>
                    <td class="pr-2">:</td>
                    <td>21200022011</td>
                </tr>
                <tr>
                    <td class="pr-2 py-1 font-medium">Nama</td>
                    <td class="pr-2">:</td>
                    <td>Mohamad Farid Faridho</td>
                </tr>
                <tr>
                    <td class="pr-2 py-1 font-medium">Jenjang</td>
                    <td class="pr-2">:</td>
                    <td>SMA</td>
                </tr>
            </table>

            <table>
                <tr>
                    <td class="pr-2 py-1 font-medium">Jurusan</td>
                    <td class="pr-2">:</td>
                    <td>IPA</td>
                </tr>
                <tr>
                    <td class="pr-2 py-1 font-medium">Metode Pembayaran</td>
                    <td class="pr-2">:</td>
                    <td>Offline</td>
                </tr>
                <tr>
                    <td class="pr-2 py-1 font-medium">Tanggal</td>
                    <td class="pr-2">:</td>
                    <td>29/11/2024</td>
                </tr>
            </table>            
        </div>

        <div class="px-9 py-5">
            <table class="w-full">
                <thead class="bg-gray-300 border-b-2 border-gray-400">
                    <tr>
                        <th class="p-3 text-sm tracking-wide text-center">No</th>
                        <th class="p-3 text-sm tracking-wide text-center">Nama Komponen</th>
                        <th class="p-3 text-sm tracking-wide text-center">Jumlah</th>
                        <th class="p-3 text-sm tracking-wide text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="border-b-2 border-gray-400">
                    <tr>
                        <td class="p-2 pl-4 font-semibold text-xl border-b-2 border-gray-400"colspan="4">I. Biaya Pendaftaran</td>
                    </tr>
                    <tr class="bg-white">
                        <td class="p-3 text sm text-center">1</td>
                        <td class="p-3 text sm text-center">Biaya Formulir</td>
                        <td class="p-3 text sm text-center">1.000.000</td>
                        <td class="p-3 text sm text-center"><span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum lunas</span></td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="p-3 text text-center">2</td>
                        <td class="p-3 text text-center">Biaya Administrasi</td>
                        <td class="p-3 text text-center">1.000.000</td>
                        <td class="p-3 text text-center"><span class="p-3 text sm"><span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-green-600 rounded-lg">lunas</span></td>
                    </tr> 
                    <tr class="bg-gray-300">
                        <td class="p-2 pl-4 font-semibold text-base "colspan="2">Total Biaya Pendaftaran</td>
                        <td class="p-2 font-semibold text-base  text-center"colspan="1">2.000.000</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="p-2 pl-4 font-semibold text-xl border-y-2 border-gray-400"colspan="4">II. Biaya Pendidikan</td>
                    </tr>
                    <tr class="bg-white">
                        <td class="p-3 text sm text-center">1</td>
                        <td class="p-3 text sm text-center">SPP</td>
                        <td class="p-3 text sm text-center">1.000.000</td>
                        <td class="p-3 text sm text-center"><span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum lunas</span></td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="p-3 text sm text-center">2</td>
                        <td class="p-3 text sm text-center">Biaya Buku & Kitab</td>
                        <td class="p-3 text sm text-center">1.000.000</td>
                        <td class="p-3 text sm text-center"><span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum lunas</span></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="p-3 text sm text-center">3</td>
                        <td class="p-3 text sm text-center">Biaya Seragam siswa</td>
                        <td class="p-3 text sm text-center">1.000.000</td>
                        <td class="p-3 text sm text-center"><span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum lunas</span></td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="p-3 text sm text-center">2</td>
                        <td class="p-3 text sm text-center">Biaya Perlengkapan siswa</td>
                        <td class="p-3 text sm text-center">1.000.000</td>
                        <td class="p-3 text sm text-center"><span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum lunas</span></td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="p-2 pl-4 font-semibold text-base"colspan="2">Total Biaya Pendidikan</td>
                        <td class="p-2 font-semibold text-base text-center"colspan="1">4.000.000</td>
                        <td></td>
                    </tr>

                    <tr>
                        <td class="p-2 pl-4 font-semibold text-xl border-y-2 border-gray-400"colspan="4">III. Biaya Lainnya</td>
                    </tr>
                    <tr class="bg-white">
                        <td class="p-3 text sm text-center">1</td>
                        <td class="p-3 text sm text-center">Biaya Asrama</td>
                        <td class="p-3 text sm text-center">1.000.000</td>
                        <td class="p-3 text sm text-center"><span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum lunas</span></td>
                    </tr>
                    <tr class="bg-gray-300">
                        <td class="p-2 pl-4 font-semibold text-base"colspan="2">Total Biaya Lainnya</td>
                        <td class="p-2 font-semibold text-base text-center"colspan="1">1.000.000</td>
                        <td></td>
                    </tr>

                    <tr class="bg-gray-400">
                        <td class="p-2 pl-4 font-semibold text-base border-t-2 border-gray-400"colspan="2">Total Biaya Keseluruhan</td>
                        <td class="p-2 font-semibold text-base text-center border-t-2 border-gray-400"colspan="1">5.000.000</td>
                        <td class="border-t-2 border-gray-400"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="px-9 py-5">
            <div class="bg-gray-300 rounded-lg py-5 pl-5">
                <h1 class="font-semibold text-2xl mb-4">Informasi:</h1>
                <div class="flex items-start">
                    <h2 class="font-semibold text-md mr-4">Skema Pembayaran : </h2>
                    <ol class="list-decimal pl-3 text-base">
                        <li>Pembayaran SPP bisa dilakukan setiap awal bulan</li>
                        <li>Pembayaran hanya bisa dilakukan secara offline / langsung ke yayasan nurul huda</li>
                        <li>Seluruh komponen biaya awal (Biaya pendaftaran, pendidikan, lainnya) harus dilunasi sebelum tanggal penutupan pendaftaran.</li>
                        <li>Bagi calon siswa yang memerlukan keringanan, tersedia program cicilan untuk biaya awal dan SPP.</li>
                        <li>Untuk cicilan dapat dilakukan beberapa kali</li>
                        <li>Minimum untuk pembayaran awal sebesar 400.000</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-layout>