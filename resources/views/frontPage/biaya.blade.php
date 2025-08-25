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

    <!-- Header -->
    <div class="bg-[oklch(62.7%_0.194_149.214)] w-full text-white text-center py-4 font-bold text-lg">
        <p>Biaya Pendidikan</p>
    </div>

    <div class="container mx-auto px-4 sm:px-8">

        <!-- Menu Tabs -->
        <div class="flex justify-center my-4 overflow-x-auto space-x-2 sm:space-x-4 pb-2">
            <button
                class="menu-btn bg-orange text-black whitespace-nowrap px-4 sm:px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] hover:text-white"
                onclick="selectTab('TK')">TK</button>
            <button
                class="menu-btn bg-orange text-black whitespace-nowrap px-4 sm:px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] hover:text-white"
                onclick="selectTab('SD')">SD</button>
            <button
                class="menu-btn bg-orange text-black whitespace-nowrap px-4 sm:px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] hover:text-white"
                onclick="selectTab('SMP')">SMP</button>
            <button
                class="menu-btn bg-orange text-black whitespace-nowrap px-4 sm:px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] hover:text-white"
                onclick="selectTab('SMA')">SMA</button>
            <button
                class="menu-btn bg-orange text-black whitespace-nowrap px-4 sm:px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] hover:text-white"
                onclick="selectTab('PONDOK')">PONDOK</button>
            <button
                class="menu-btn bg-orange text-black whitespace-nowrap px-4 sm:px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] hover:text-white"
                onclick="selectTab('MADIN')">MADIN & TPQ</button>
        </div>

        @php
            $units = ['tk', 'sd', 'smp', 'sma', 'pondok', 'madin', 'tpq'];
        @endphp

        @foreach ($units as $unit)
            <div id="{{ strtoupper($unit) }}" class="education-section hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full border-2 border-gray-200 bg-white shadow-md">
                        <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white">
                            <tr>
                                <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">No</th>
                                <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Pendaftaran</th>
                                <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">Keterangan</th>
                                <th class="border-2 border-gray-200 px-4 py-2" colspan="2">Lunas</th>
                                <th class="border-2 border-gray-200 px-4 py-2" rowspan="2">DP</th>
                            </tr>
                            <tr>
                                <th class="border-2 border-gray-200 px-4 py-2">Putra</th>
                                <th class="border-2 border-gray-200 px-4 py-2">Putri</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">
                            @forelse($data[$unit] ?? [] as $index => $row)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="border-2 border-gray-200 px-4 py-2">{{ $row['nama'] }}</td>
                                    <td class="border-2 border-gray-200 px-4 py-2">{{ $row['tipe'] }}</td>
                                    <td class="border-2 border-gray-200 px-4 py-2">@currency($row['putra'])</td>
                                    <td class="border-2 border-gray-200 px-4 py-2">@currency($row['putri'])</td>
                                    <td class="border-2 border-gray-200 px-4 py-2">@currency($row['dp'])</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">Belum ada data untuk
                                        {{ strtoupper($unit) }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Catatan / Bonus -->
                @forelse($notes[$unit] ?? [] as $index => $row)
                    <div class="mt-6 w-full bg-[oklch(62.7%_0.194_149.214)] p-6 rounded-lg shadow-md">
                        <div class="text-white">
                            <h2 class="text-xl font-semibold">Catatan</h2>
                            <p class="mt-2 text-base">{{ $row['catatan'] }}</p>
                        </div>
                    </div>
                @empty
                    <div class="mt-6 w-full bg-[oklch(62.7%_0.194_149.214)] p-6 rounded-lg shadow-md">
                        <div class="text-white">
                            <h2 class="text-xl font-semibold">Bonus</h2>
                            <p class="mt-2 text-sm">-</p>
                        </div>
                    </div>
                @endforelse
            </div>
        @endforeach
    </div>
</x-layout>
