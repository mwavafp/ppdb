<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <header class=" mb-10">
        <div class="container flex flex-col">
            <h1 class="text-3xl font-bold">Pengaturan Biaya Daftar</h1>
            <p class="text-sm text-gray-500 mt-1">Mengatur Perincian Biaya Daftar</p>
        </div>
    </header>

    <!-- Form Search -->
    <div class="relative">


        <div class="flex w-full px-16">
            <div class="flex justify-center space-x-4 my-4">
                @foreach (['TK', 'SD', 'SMP', 'SMA', 'PONDOK', 'MADIN', 'NON MADIN'] as $jenjang)
                    <button
                        class="menu-btn bg-orange text-black hover:text-white px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] active:bg-[oklch(62.7%_0.194_149.214)]"
                        onclick="selectTab('{{ $jenjang }}')">{{ $jenjang }}</button>
                @endforeach
            </div>
        </div>

        @php
            $units = ['tk', 'sd', 'smp', 'sma', 'pondok', 'madin', 'nonmadin'];
        @endphp

        <div class=" rounded-lg shadow">
            @foreach ($units as $unit)
                @php $unitId = strtoupper($unit); @endphp
                <div id="{{ $unitId }}" class="education-section hidden">
                    <table class="w-full divide-y divide-gray-200" id="dataTable">
                        <thead class=" border-b-2">
                            <tr class="bg-[oklch(62.7%_0.194_149.214)] text-white">
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">No
                                </th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                    Gelombang
                                </th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                    Pendidikan</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Tipe
                                    Siswa</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                    Gender
                                </th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Total
                                    Bayar</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">DP
                                    Bayar
                                </th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                    Diskon
                                </th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                            @if (empty($all_data[$unitId]) || $all_data[$unitId]->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center py-4 text-gray-500">
                                        Data tidak ditemukan
                                    </td>
                                </tr>
                            @else
                                @foreach ($all_data[$unitId] as $item)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="border px-4 py-2 text-center text-sm">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2 text-center text-sm">{{ $item->namaAcara }}</td>
                                        <td class="border px-4 py-2 text-center text-sm">
                                            {{ strtoupper($item->unitPendidikan) }}</td>
                                        <td class="border px-4 py-2 text-center text-sm">{{ $item->tipe_siswa }}
                                        </td>
                                        <td class="border px-4 py-2 text-center text-sm">{{ $item->gender }}</td>
                                        <td class="border px-4 py-2 text-center text-sm">@currency($item->total_bayar_daful)</td>
                                        <td class="border px-4 py-2 text-center text-sm">@currency($item->dp_daful)</td>
                                        <td class="border px-4 py-2 text-center text-sm">@currency($item->diskon)</td>
                                        <td class="border px-4 py-2 text-center text-sm">
                                            <div x-data="{ isModalOpen: false }">
                                                <button @click="isModalOpen = true"
                                                    class="text-white bg-amber-500 px-4 py-2 rounded-md hover:underline">
                                                    <i class="fas fa-edit"></i><span>Edit</span>
                                                </button>

                                                <div x-show="isModalOpen"
                                                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                                    style="display: none;">
                                                    <div
                                                        class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                                                        <button @click="isModalOpen = false"
                                                            class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">
                                                            &times;
                                                        </button>

                                                        <form
                                                            action="{{ route('update-biaya-daftar', ['id' => $item->id_harga]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <h1 class="font-bold text-xl mb-4">Edit Biaya
                                                                Pendaftaran
                                                            </h1>
                                                            <div class="mb-4">
                                                                <label
                                                                    class="block text-gray-700 font-medium">Gelombang</label>
                                                                <label
                                                                    class="block text-gray-700 font-medium">{{ $item->namaAcara }}</label>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="block text-gray-700 font-medium">Total
                                                                    Bayar</label>
                                                                <input type="number" name="total_bayar_daful"
                                                                    value="{{ $item->total_bayar_daful }}"
                                                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="block text-gray-700 font-medium">DP
                                                                    Bayar</label>
                                                                <input type="number" name="dp_daful"
                                                                    value="{{ $item->dp_daful }}"
                                                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label
                                                                    class="block text-gray-700 font-medium">Diskon</label>
                                                                <input type="number" name="diskon"
                                                                    value="{{ $item->diskon }}"
                                                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                                            </div>
                                                            <div class="flex justify-end">
                                                                <button type="submit"
                                                                    class="bg-[oklch(45.7%_0.24_277.023)] text-white px-4 py-2 rounded-lg">
                                                                    Simpan
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</x-layoute>
