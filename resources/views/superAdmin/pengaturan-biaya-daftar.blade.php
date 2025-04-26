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

    <header class="bg-white border-b shadow-sm py-5 mb-10">
        <div class="container mx-auto px-4 flex flex-col">
            <h1 class="text-2xl font-bold text-gray-800">Pengaturan Biaya Daftar</h1>
            <p class="text-sm text-gray-500 mt-1">Mengatur Perincian Biaya Daftar</p>
        </div>
    </header>

    <!-- Form Search -->
    <div class="relative">
        <form method="GET" action="{{ route('search') }}" id="searchForm">
            <input type="text" name="search" class="border border-gray-400 rounded-full py-2 px-4 pl-10 w-[500px]"
                placeholder="Search" value="{{ old('search') }}"
                oninput="document.getElementById('searchForm').submit()">
        </form>

        <div class="flex w-full px-16">
            <div class="flex justify-center space-x-4 my-4">
                @foreach (['TK', 'SD', 'SMP', 'SMA', 'PONDOK', 'MADIN'] as $jenjang)
                    <button
                        class="menu-btn bg-orange text-black hover:text-white px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] active:bg-[oklch(62.7%_0.194_149.214)]"
                        onclick="selectTab('{{ $jenjang }}')">{{ $jenjang }}</button>
                @endforeach
            </div>
            <div class="my-auto mx-4">
                <form action="{{ route('tagihan.export') }}" method="GET">
                    <button type="submit" class="btn btn-primary">
                        <span class="bg-[oklch(62.7%_0.194_149.214)] text-white text-center px-6 py-4 rounded-md">Download
                            Excel</span>
                    </button>
                </form>
            </div>
<<<<<<< HEAD
=======
        </header>
        
        <!-- Form Search -->
        <div class="relative">
            <form method="GET" action="{{ route('search') }}" id="searchForm">
                <input type="text" name="search" class="border border-gray-400 rounded-full py-2 px-4 pl-10 w-[500px]"
                    placeholder="Search" value="{{ old('search') }}"
                    oninput="document.getElementById('searchForm').submit()">
            </form>


    <div class="flex w-full px-16">

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
>>>>>>> c8a6dcbfe1ce32c6ea37561c05ebe32b851752ff
        </div>

        @php
            $units = ['tk', 'sd', 'smp', 'sma', 'pondok', 'madin'];
        @endphp

<<<<<<< HEAD
        <div class="bg-white p-4 rounded-lg shadow">
            @foreach ($units as $unit)
                @php $unitId = strtoupper($unit); @endphp
                <div id="{{ $unitId }}" class="education-section hidden">
                    <table class="min-w-full divide-y divide-gray-200" id="dataTable">
                        <thead class="bg-gray-50 border-b-2">
=======
    <div class="bg-white p-4 rounded-lg shadow">
        @foreach ($units as $unit)
            @php $unitId = strtoupper($unit); @endphp
            <div id="{{ $unitId }}" class="education-section hidden">

                <table class="min-w-full divide-y divide-gray-200" id="dataTable">
                    <thead class="bg-gray-50 border-b-2">
                        <tr>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">No
                            </th>

                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                Gelombang
                            </th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                Pendidikan

                            </th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                Tipe Siswa
                            </th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                Gender</th>

                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                Total Bayar
                            </th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                DP Bayar</th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                Diskon</th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">
                                Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                        @if (empty($all_data[$unitId]) || $all_data[$unitId]->isEmpty())
>>>>>>> c8a6dcbfe1ce32c6ea37561c05ebe32b851752ff
                            <tr>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Gelombang</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Pendidikan</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Tipe Siswa</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Gender</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Total Bayar</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">DP Bayar</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Diskon</th>
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                            </tr>
<<<<<<< HEAD
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                            @if (empty($all_data[$unitId]) || $all_data[$unitId]->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center py-4 text-gray-500">
                                        Data tidak ditemukan
=======
                        @else
                            @foreach ($all_data[$unitId] as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="border px-4 py-2 text-center text-sm">{{ $loop->iteration }}
                                    </td>
                                    {{-- <td class="border px-4 py-2 text-center text-sm">{{ $item->name }}</td> --}}
                                    <td class="border px-4 py-2 text-center text-sm">{{ $item->namaAcara }}
>>>>>>> c8a6dcbfe1ce32c6ea37561c05ebe32b851752ff
                                    </td>
                                </tr>
                            @else
                                @foreach ($all_data[$unitId] as $item)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="border px-4 py-2 text-center text-sm">{{ $loop->iteration }}</td>
                                        <td class="border px-4 py-2 text-center text-sm">{{ $item->namaAcara }}</td>
                                        <td class="border px-4 py-2 text-center text-sm">{{ strtoupper($item->unitPendidikan) }}</td>
                                        <td class="border px-4 py-2 text-center text-sm">{{ $item->tipe_siswa }}</td>
                                        <td class="border px-4 py-2 text-center text-sm">{{ $item->gender }}</td>
                                        <td class="border px-4 py-2 text-center text-sm">@currency($item->total_bayar_daful)</td>
                                        <td class="border px-4 py-2 text-center text-sm">@currency($item->dp_daful)</td>
                                        <td class="border px-4 py-2 text-center text-sm">@currency($item->diskon)</td>
                                        <td>
                                            <div x-data="{ isModalOpen: false }">
                                                <button @click="isModalOpen = true"
                                                    class="bg-blue-500 text-white mx-4 my-2 px-4 py-2 rounded hover:bg-blue-600 flex items-center">
                                                    <i class="fas fa-edit"></i><span>Edit</span>
                                                </button>

<<<<<<< HEAD
                                                <div x-show="isModalOpen"
                                                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                                    style="display: none;">
                                                    <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                                                        <button @click="isModalOpen = false"
                                                            class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">
                                                            &times;
                                                        </button>

                                                        <form
                                                            action="{{ route('update-biaya-daftar', ['id' => $item->id_harga]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <h1 class="font-bold text-xl mb-4">Edit Biaya Pendaftaran</h1>
=======
                                    <td class="border px-4 py-2 text-center text-sm">
                                        {{ strtoupper($item->unitPendidikan) }}
                                    </td>
                                    <td class="border px-4 py-2 text-center text-sm">
                                        {{ $item->tipe_siswa }}</td>
                                    <td class="border px-4 py-2 text-center text-sm">{{ $item->gender }}
                                    </td>
                                    <td class="border px-4 py-2 text-center text-sm">@currency($item->total_bayar_daful)
                                    </td>
                                    <td class="border px-4 py-2 text-center text-sm">
                                        @currency($item->dp_daful)
                                    </td>
                                    <td class="border px-4 py-2 text-center text-sm">
                                        @currency($item->diskon)
                                    </td>
                                    <td>
                                        <!-- Modal -->

                                        <div x-data="{ isModalOpen: false }">
                                            <!-- Tombol untuk membuka modal -->
                                            <button @click="isModalOpen = true"
                                                class="bg-blue-500 text-white mx-4 my-2 px-4 py-2 rounded hover:bg-blue-600 flex items-center">
                                                <i class="fas fa-edit "></i>
                                                <span>Edit</span>
                                            </button>

                                            <!-- Modal -->
                                            <div x-show="isModalOpen"
                                                class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                                style="display: none;">
                                                <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                                                    <!-- Tombol untuk menutup modal -->
                                                    <button @click="isModalOpen = false"
                                                        class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">
                                                        &times;
                                                    </button>

                                                    <!-- Konten Modal -->
                                                    <!-- pemakaian include atau component sama saja dan yang wajib diteruskan adalah datanya -->
                                                    <!-- Yand dirender menggunakan fungsi dari showData -->
                                                    <form
                                                        action="{{ route('update-biaya-daftar', ['id' => $item->id_harga]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal fade text-left" id="ModalCreate"
                                                            tabindex="-1">
                                                            <h1 class="font-bold text-xl mb-4">Edit Biaya
                                                                Pendaftaran
                                                            </h1>
>>>>>>> c8a6dcbfe1ce32c6ea37561c05ebe32b851752ff
                                                            <div class="mb-4">
                                                                <label class="block text-gray-700 font-medium">Gelombang</label>
                                                                <label class="block text-gray-700 font-medium">{{ $item->namaAcara }}</label>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="block text-gray-700 font-medium">Total Bayar</label>
                                                                <input type="number" name="total_bayar_daful" value="{{ $item->total_bayar_daful }}"
                                                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="block text-gray-700 font-medium">DP Bayar</label>
                                                                <input type="number" name="dp_daful" value="{{ $item->dp_daful }}"
                                                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="block text-gray-700 font-medium">Diskon</label>
                                                                <input type="number" name="diskon" value="{{ $item->diskon }}"
                                                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                                            </div>
                                                            <div class="flex justify-end">
                                                                <button type="submit"
                                                                    class="bg-[oklch(45.7%_0.24_277.023)] text-white px-4 py-2 rounded-lg">
                                                                    Simpan
                                                                </button>
                                                            </div>
<<<<<<< HEAD
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
=======
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

>>>>>>> c8a6dcbfe1ce32c6ea37561c05ebe32b851752ff
    </div>
</x-layoute>
    