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
                    <td>SD</td>
                </tr>
            </table>

            <table>
                <tr>
                    <td class="pr-2 py-1 font-medium">Gelombang</td>
                    <td class="pr-2">:</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td class="pr-2 py-1 font-medium">Kategori</td>
                    <td class="pr-2">:</td>
                    <td>Alumni</td>
                </tr>
                <tr>
                    <td class="pr-2 py-1 font-medium">Status</td>
                    <td class="pr-2">:</td>
                    <td><span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum lunas</span></td>
                    <!-- <span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-green-600 rounded-lg">lunas</span> -->
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
                    </tr>
                </thead>
                <tbody class="border-b-2 border-gray-400">
                    <tr class="bg-white">
                        <td class="p-3 text sm text-center">1</td>
                        <td class="p-3 text sm text-center">Formulir</td>
                        <td class="p-3 text sm text-center"rupiah="100000"></td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="p-3 text text-center">2</td>
                        <td class="p-3 text text-center">Uang Pendaftaran</td>
                        <td class="p-3 text text-center"rupiah="200000"></td>
                    </tr> 

                    <tr class="bg-white">
                        <td class="p-3 text sm text-center">3</td>
                        <td class="p-3 text sm text-center">SPP Bulanan</td>
                        <td class="p-3 text sm text-center"rupiah="300000"></td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="p-3 text sm text-center">4</td>
                        <td class="p-3 text sm text-center">Buku Paket</td>
                        <td class="p-3 text sm text-center"rupiah="150000"></td>
                    </tr>
                    <tr class="bg-white">
                        <td class="p-3 text sm text-center">5</td>
                        <td class="p-3 text sm text-center">Ujian Semester</td>
                        <td class="p-3 text sm text-center"rupiah="250000"></td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="p-3 text sm text-center">6</td>
                        <td class="p-3 text sm text-center">Seragam</td>
                        <td class="p-3 text sm text-center"rupiah="400000"></td>
                    </tr>

                    <tr class="bg-white">
                        <td class="p-3 text sm text-center">7</td>
                        <td class="p-3 text sm text-center">Asuransi</td>
                        <td class="p-3 text sm text-center"rupiah="50000"></td>
                    </tr>

                    <tr class="bg-white">
                        <td class="p-3 text sm text-center">8</td>
                        <td class="p-3 text sm text-center">Ekstrakulikuler</td>
                        <td class="p-3 text sm text-center"rupiah="100000"></td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- tabel total -->
        <div class="px-9 py-5">
            <table class="w-full">
                <thead class="bg-gray-300 border-b-2 border-gray-400">
                    <tr>
                        <th class="p-3 text-sm tracking-wide text-center">Jumlah Bayar</th>
                        <th class="p-3 text-sm tracking-wide text-center">DP</th>
                        <th class="p-3 text-sm tracking-wide text-center">Jumlah yang sudah dibayar</th>
                        <th class="p-3 text-sm tracking-wide text-center">Sisa Bayar</th>
                    </tr>
                </thead>
                <tbody class="border-b-2 border-gray-400">
                <tr class="bg-white">
                        <td class="p-3 text sm text-center"rupiah="1550000">1.550.000</td>
                        <td class="p-3 text sm text-center"rupiah="500000"></td>
                        <td class="p-3 text sm text-center"rupiah="500000"></td>
                        <td class="p-3 text sm text-center"rupiah="1050000"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- informasi keterangan -->
        <div class="px-9 py-5">
            <div class="bg-gray-300 rounded-lg py-5 pl-5">
                <h1 class="font-semibold text-2xl mb-4">Informasi:</h1>
                <div class="flex">
                    <h2 class="font-semibold text-md ">Bonus : </h2>
                    <p class="ml-2">Lunas atau DP akan mendapatkan free sepatu / tas / 1 stel seragam (boleh memilih selama persediaan masih ada).
                    </p>
                </div>

                <div class="flex items-start">
                    <h2 class="font-semibold text-md mr-4">Skema Pembayaran : </h2>
                    <ol class="list-decimal pl-3 text-base">
                        <li>Pembayaran SPP bisa dilakukan setiap awal bulan</li>
                        <li>Pembayaran hanya bisa dilakukan secara offline / langsung ke yayasan nurul huda</li>
                        <li>Seluruh komponen biaya awal (Biaya pendaftaran, pendidikan, lainnya) harus dilunasi sebelum tanggal penutupan pendaftaran.</li>
                        <li>Bagi calon siswa yang memerlukan keringanan, tersedia program cicilan untuk biaya awal dan SPP.</li>
                        <li>Untuk cicilan dapat dilakukan beberapa kali</li>
                        <li>Minimum untuk pembayaran awal sebesar Rp 500.000,00</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Mata Uang -->
    <script>
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(angka);
        }
        document.querySelectorAll('[rupiah]').forEach(function(element) {
            const amount = parseInt(element.getAttribute('rupiah'));
            element.textContent = formatRupiah(amount);
        });
    </script>
</x-layout>