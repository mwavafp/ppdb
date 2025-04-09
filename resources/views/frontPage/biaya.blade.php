<script>
    function selectTab(tab) {
        const sections = document.querySelectorAll('.education-section');
        sections.forEach(section => section.classList.add('hidden'));

        const buttons = document.querySelectorAll('.menu-btn');
        buttons.forEach(button => button.classList.remove('bg-[oklch(62.7%_0.194_149.214)]','text-white'));

        document.getElementById(tab).classList.remove('hidden');
        const activeButton = document.querySelector(`[onclick="selectTab('${tab}')"]`);
        activeButton.classList.add('bg-[oklch(62.7%_0.194_149.214)]','text-white');
        activeButton.classList.remove('hover:bg-green-200');
    }
    window.onload = function () {
        selectTab('TK');
    };
</script>

<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto p-4">
        <div class="bg-[oklch(62.7%_0.194_149.214)] text-white text-center py-4 font-bold text-lg">
            <p>Biaya Pendidikan</p>
        </div>
        <div class="flex justify-center space-x-4 my-4">
            <button class="menu-btn border border-gray-300 shadow-md  text-black px-6 py-2 rounded hover:shadow-xl hover:scale-105 hover:bg-green-200 transition-all ease-out"
                onclick="selectTab('TK')">TK</button>
            <button class="menu-btn border border-gray-300 shadow-md  text-black px-6 py-2 rounded hover:shadow-xl hover:scale-105 hover:bg-green-200 transition-all ease-out"
                onclick="selectTab('SD')">SD</button>
            <button class="menu-btn border border-gray-300 shadow-md  text-black px-6 py-2 rounded hover:shadow-xl hover:scale-105 hover:bg-green-200 transition-all ease-out"
                onclick="selectTab('SMP')">SMP</button>
            <button class="menu-btn border border-gray-300 shadow-md  text-black px-6 py-2 rounded hover:shadow-xl hover:scale-105 hover:bg-green-200 transition-all ease-out"
                onclick="selectTab('SMA')">SMA</button>
            <button class="menu-btn border border-gray-300 shadow-md  text-black px-6 py-2 rounded hover:shadow-xl hover:scale-105 hover:bg-green-200 transition-all ease-out"
                onclick="selectTab('PONDOK')">PONDOK</button>
        </div>

        <div id="TK" class="education-section active">
            <table class="min-w-full border-2 border-gray-200 bg-white shadow-md">
                <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white">
                    <tr>
                        <th class="border-2 border-gray-200 px-4 py-2 ">No</th>
                        <th class="border-2 border-gray-200 px-4 py-2 ">Pendaftaran</th>
                        <th class="border-2 border-gray-200 px-4 py-2 ">Total Keseluruhan</th>
                        <th class="border-2 border-gray-200 px-4 py-2 ">DP</th>
                        <th class="border-2 border-gray-200 px-4 py-2 ">Keterangan Bonus/potongan</th>
                    </tr>
                </thead>
                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">1</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel.1 (2 Des-28 Feb 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">10 Pertama (Lunas) pot. Rp 100rb, jika (DP) pot.
                            RP.
                            50rb</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">2</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel.2 (1 Mar-31 Mei 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">(Lunas) pot. Rp. 50rb, (DP) pot. Rp.25rb</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">3</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel.3 (1 Jun-13 Jul 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Bayar Penuh</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="SD" class="education-section hidden">
            <table class="min-w-full border-2 border-gray-200 bg-white shadow-md">
                <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white">
                    <tr>
                        <th class="border- border-gray-200 px-4 py-2" rowspan="2">No</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Pendaftaran</th>
                        <th class="border-2 border-gray-200 px-4 py-2" colspan="2">Lunas</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">DP</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Keterangan Bonus/potongan</th>
                    </tr>
                    <tr>
                        <th class="border-2 border-gray-200 px-4 py-2">Putra</th>
                        <th class="border-2 border-gray-200 px-4 py-2">Putri</th>
                    </tr>
                </thead>
                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">1</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel. 1 (2 Des-28 Feb 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 860.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 895.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Lunas ataupun DP free sepatu/tas/satu stel
                            seragam
                            (boleh memilih selama persediaan masih ada)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">2</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel.2 (1 Mar-31 Mei 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 860.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 895.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Lunas ataupun DP free sepatu/tas/satu stel
                            seragam
                            (boleh memilih selama persediaan masih ada)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">3</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel.3 (1 Jun-13 Jul 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 860.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 895.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Lunas ataupun DP free sepatu/tas/satu stel
                            seragam
                            (boleh memilih selama persediaan masih ada)</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div id="SMP" class="education-section hidden">
            <table class="min-w-full border-2 border-gray-200 bg-white shadow-md">
                <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white">
                    <tr>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">No</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Pendaftaran</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Keterengan</th>
                        <th class="border-2 border-gray-200 px-4 py-2" colspan="2">Lunas</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">DP</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Keterangan Bonus/potongan</th>
                    </tr>
                    <tr>
                        <th class="border-2 border-gray-200 px-4 py-2">Putra</th>
                        <th class="border-2 border-gray-200 px-4 py-2">Putri</th>
                    </tr>
                </thead>
                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">1</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel. 1 (2 Des-28 Feb 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Alumni</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.610.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.640.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 250rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2"></td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel. 1 (2 Des-28 Feb 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Umum</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.710.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.740.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 150rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>


                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">2</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel. 2 (1 Mar-31 Mei 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Alumni</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.710.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.740.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 150rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2"></td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel. 1 (1 Mar-31 Mei 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Umum</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.710.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.740.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 100rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">3</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel.3 (1 Jun-13 Jul 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Alumni</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.760.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.790.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 100rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2"></td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel.3 (1 Jun-13 Jul 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Umum</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.710.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.740.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 100rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div id="SMA" class="education-section hidden">
            <table class="min-w-full border-2 border-gray-200 bg-white shadow-md">
                <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white">
                    <tr>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">No</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Pendaftaran</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Keterengan</th>
                        <th class="border-2 border-gray-200 px-4 py-2" colspan="2">Lunas</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">DP</th>
                        <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Keterangan Bonus/potongan</th>
                    </tr>
                    <tr>
                        <th class="border-2 border-gray-200 px-4 py-2">Putra</th>
                        <th class="border-2 border-gray-200 px-4 py-2">Putri</th>
                    </tr>
                </thead>
                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">1</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel. 1 (2 Des-28 Feb 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Alumni</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.950.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.050.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 300rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2"></td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel. 1 (2 Des-28 Feb 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Umum</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.050.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.150.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 200rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>


                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">2</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel. 2 (1 Mar-31 Mei 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Alumni</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.050.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.740.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.000.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 200rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2"></td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel. 2 (1 Mar-31 Mei 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Umum</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.150.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.250.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 150rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">3</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel.3 (1 Jun-13 Jul 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Alumni</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.150.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.250.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Free 100rb (Mendapatkan potongan sesuai
                            gelombangnya jika melakukan pembayaran minimal DP)</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2"></td>
                        <td class="border-2 border-gray-200 px-4 py-2">Gel.3 (1 Jun-13 Jul 2025)</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Umum</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.250.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 2.350.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 1.500.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Full</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="PONDOK" class="education-section hidden">
            <table class="min-w-full border-2 border-gray-200 bg-white shadow-md">
                <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white">
                    <tr>
                        <th class="border-2 border-gray-200 px-4 py-2">No</th>
                        <th class="border-2 border-gray-200 px-4 py-2">Pendaftaran</th>
                        <th class="border-2 border-gray-200 px-4 py-2">Lunas</th>
                        <th class="border-2 border-gray-200 px-4 py-2">DP</th>
                        <th class="border-2 border-gray-200 px-4 py-2">Keterangan Bonus/potongan</th>
                    </tr>
                </thead>
                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">1</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Madin Dari Unit</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 380.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 380.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">LUNAS</td>
                    </tr>
                </tbody>

                <tbody class='text-black'>
                    <tr>
                        <td class="border-2 border-gray-200 px-4 py-2">2</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Madin Bukan Dari Unit</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 590.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">Rp 590.000</td>
                        <td class="border-2 border-gray-200 px-4 py-2">LUNAS</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
