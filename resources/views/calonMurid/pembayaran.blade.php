<x-layout-login>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-tahapan></x-tahapan>

    <h1 class="text-2xl text-center font-bold my-6">Informasi Pembayaran</h1>

    <!-- Informasi Pendaftar -->
    <div class="px-4 lg:px-9 py-5 flex flex-col lg:flex-row lg:space-x-20 space-y-4 lg:space-y-0">
        <div class="flex">
            <div class="mr-8">
                <table>
                    @foreach ($users as $item)
                        <div>
                            <tr>
                                <td class="pr-2 py-1 font-medium">No. Pendaftaran</td>
                                <td class="pr-2">:</td>
                                <td>{{ $item->id_user }}</td>
                            </tr>
                            <tr>
                                <td class="pr-2 py-1 font-medium">Nama</td>
                                <td class="pr-2">:</td>
                                <td>{{ $item->name }}</td>
                            </tr>
                            <tr>
                                <td class="pr-2 py-1 font-medium">Jenjang</td>
                                <td class="pr-2">:</td>
                                <td>{{ strtoupper($item->unt_pendidikan) }}</td>
                            </tr>
                        </div>
                    @endforeach

                </table>
            </div>

            <div>
                <table>
                    @foreach ($gelombangs as $item)
                        <tr>
                            <td class="pr-2 py-1 font-medium">Gelombang</td>
                            <td class="pr-2">:</td>
                            <td>{{ $item->id_acara }}</td>
                        </tr>
                        <tr>
                            <td class="pr-2 py-1 font-medium">Kategori</td>
                            <td class="pr-2">:</td>
                            <td>{{ $item->kls_status }}</td>
                        </tr>
                        <tr>
                            <td class="pr-2 py-1 font-medium">Status</td>
                            <td class="pr-2">:</td>
                            <td>
                                {!! $item->byr_dft_ulang == 'belum'
                                    ? '<span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-red-600 rounded-lg">Belum Lunas</span>'
                                    : '<span class="p-1.5 text-xs font-medium uppercase tracking-wider text-white bg-green-700 rounded-lg">Lunas</span>' !!}
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

    </div>

    <!-- Rincian Pembayaran -->
    <div class="px-4 lg:px-9 py-5 overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-300 border-b-2 border-gray-400">
                <tr>
                    <th class="p-3 text-center">No</th>
                    <th class="p-3 text-center">Nama Komponen</th>
                    <th class="p-3 text-center">Jumlah</th>
                </tr>
            </thead>
            <tbody class="border-b-2 border-gray-400">
                @php
                    $komponen = [
                        ['Formulir', 100000],
                        ['Uang Pendaftaran', 200000],
                        ['SPP Bulanan', 300000],
                        ['Buku Paket', 150000],
                        ['Ujian Semester', 250000],
                        ['Seragam', 400000],
                        ['Asuransi', 50000],
                        ['Ekstrakulikuler', 100000],
                    ];
                @endphp
                @foreach ($komponen as $i => [$nama, $jumlah])
                    <tr class="{{ $i % 2 == 0 ? 'bg-white' : 'bg-gray-200' }}">
                        <td class="p-3 text-center">{{ $i + 1 }}</td>
                        <td class="p-3 text-center">{{ $nama }}</td>
                        <td class="p-3 text-center" rupiah="{{ $jumlah }}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tabel Total -->
    <div class="px-4 lg:px-9 py-5 overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead class="bg-gray-300 border-b-2 border-gray-400">
                <tr>
                    <th class="p-3 text-center">Unit Pendidikan</th>
                    <th class="p-3 text-center">DP</th>
                    <th class="p-3 text-center">Jumlah yang sudah dibayar</th>
                    <th class="p-3 text-center">Sisa Bayar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pembayaran as $item)
                    <tr class="bg-white">
                        <td class="p-3 text-center">{{ strtoupper($item->unt_pendidikan) }}</td>
                        <td class="p-3 text-center">@currency($item->dp_daful)</td>
                        <td class="p-3 text-center">@currency($item->jmlh_byr)</td>
                        <td class="p-3 text-center">@currency($item->total_bayar_daful - $item->jmlh_byr)</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Keterangan -->
    <div class="px-4 lg:px-9 py-5">
        <div class="bg-gray-300 rounded-lg py-5 px-5">
            <h1 class="font-semibold text-2xl mb-4">Informasi:</h1>

            <div class="mb-4">
                <h2 class="font-semibold text-md inline-block">Bonus :</h2>
                <p class="inline ml-2">Lunas atau DP akan mendapatkan free sepatu / tas / 1 stel seragam (boleh memilih
                    selama persediaan masih ada).</p>
            </div>

            <div>
                <h2 class="font-semibold text-md mb-2">Skema Pembayaran :</h2>
                <ol class="list-decimal pl-5 space-y-1 text-base">
                    <li>Pembayaran SPP bisa dilakukan setiap awal bulan</li>
                    <li>Pembayaran hanya bisa dilakukan secara offline / langsung ke yayasan Nurul Huda</li>
                    <li>Seluruh komponen biaya awal harus dilunasi sebelum tanggal penutupan pendaftaran</li>
                    <li>Tersedia program cicilan untuk biaya awal dan SPP</li>
                    <li>Cicilan dapat dilakukan beberapa kali</li>
                    <li>Minimum pembayaran awal sebesar Rp 500.000,00</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Script Format Rupiah -->
    <script>
        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(angka);
        }

        document.querySelectorAll('[rupiah]').forEach(function(el) {
            const nilai = parseInt(el.getAttribute('rupiah'));
            if (!isNaN(nilai)) {
                el.textContent = formatRupiah(nilai);
            }
        });
    </script>
</x-layout-login>
