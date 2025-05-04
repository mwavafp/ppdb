<script>
    function selectTab(tab) {
        const sections = document.querySelectorAll('.education-section');
        sections.forEach(section => section.classList.add('hidden'));

        const buttons = document.querySelectorAll('.menu-btn');
        buttons.forEach(button => button.classList.remove('bg-[oklch(62.7%_0.194_149.214)]', 'text-white'));

        document.getElementById(tab).classList.remove('hidden');
        const activeButton = document.querySelector(`[onclick="selectTab('${tab}')"]`);
        activeButton.classList.add('bg-[oklch(62.7%_0.194_149.214)]', 'text-white');
        activeButton.classList.remove('hover:bg-green-200');
    }
    window.onload = function() {
        selectTab('TK');
    };
</script>

<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="bg-[oklch(62.7%_0.194_149.214)] w-full text-white text-center py-4 font-bold text-lg">
        <p>Biaya Pendidikan</p>
    </div>
    <div class="container mx-auto px-12">

        <div class="flex justify-center space-x-4 my-4">
            <button
                class="menu-btn bg-orange text-black hover:text-white px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] active:bg-[oklch(62.7%_0.194_149.214)]"
                onclick="selectTab('TK')">TK</button>
            <button
                class="menu-btn bg-orange text-black hover:text-white px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] active:bg-[oklch(62.7%_0.194_149.214)]"
                onclick="selectTab('SD')">SD</button>
            <button
                class="menu-btn bg-orange text-black hover:text-white px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] active:bg-[oklch(62.7%_0.194_149.214)]"
                onclick="selectTab('SMP')">SMP</button>
            <button
                class="menu-btn bg-orange text-black hover:text-white  px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] active:bg-[oklch(62.7%_0.194_149.214)]"
                onclick="selectTab('SMA')">SMA</button>
            <button
                class="menu-btn bg-orange text-black hover:text-white px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] active:bg-[oklch(62.7%_0.194_149.214)]"
                onclick="selectTab('PONDOK')">PONDOK</button>
            <button
                class="menu-btn bg-orange text-black hover:text-white px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] active:bg-[oklch(62.7%_0.194_149.214)]"
                onclick="selectTab('MADIN')">MADIN</button>
        </div>


        @php
            $units = ['tk', 'sd', 'smp', 'sma', 'pondok', 'smp', 'madin'];

        @endphp
        @foreach ($units as $unit)
            <div id={{ strtoupper($unit) }} class="education-section hidden">
                <table class="min-w-full border-2 border-gray-200 bg-white shadow-md">
                    <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white">
                        <tr>
                            <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">No</th>
                            <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Pendaftaran</th>
                            <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Keterengan</th>
                            <th class="border-2 border-gray-200 px-4 py-2" colspan="2">Lunas</th>
                            <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">DP</th>
                            {{-- <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Keterangan Bonus/potongan</th> --}}
                        </tr>
                        <tr>
                            <th class="border-2 border-gray-200 px-4 py-2">Putra</th>
                            <th class="border-2 border-gray-200 px-4 py-2">Putri</th>
                        </tr>
                    </thead>
                    <tbody class='text-black'>
                        @forelse($data[$unit] ?? [] as $index => $row)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="border-2 border-gray-200 px-4 py-2">{{ $row['nama'] }}
                                </td>
                                <td class="border-2 border-gray-200 px-4 py-2">{{ $row['tipe'] }}</td>
                                <td class="border-2 border-gray-200 px-4 py-2">@currency($row['putra'])</td>
                                <td class="border-2 border-gray-200 px-4 py-2">@currency($row['putri'])</td>
                                <td class="border-2 border-gray-200 px-4 py-2">@currency($row['dp'])</td>
                                {{-- <td class="border-2 border-gray-200 px-4 py-2">Free 250rb (Mendapatkan potongan sesuai
                                    gelombangnya jika melakukan pembayaran minimal DP)</td> --}}
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">Belum ada data untuk {{ $unit }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>


                </table>
                @forelse($notes[$unit] ?? [] as $index => $row)
                    <div class="mt-12 w-full bg-[oklch(62.7%_0.194_149.214)] p-8 rounded-lg shadow-md overflow-hidden">
                        <div class="p-4 text-white">
                            <h2 class="text-2xl font-semibold ">Bonus</h2>
                            <p class="mt-2  text-sm">
                                {{ $row['catatan'] }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="mt-12 w-full bg-[oklch(62.7%_0.194_149.214)] p-8 rounded-lg shadow-md overflow-hidden">
                        <div class="p-4 text-white">
                            <h2 class="text-2xl font-semibold ">Bonus</h2>
                            <p class="mt-2  text-sm">
                                -
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>
        @endforeach



    </div>
</x-layout>
