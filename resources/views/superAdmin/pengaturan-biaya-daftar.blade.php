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

    <div class="flex w-full mx-4">
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
        </div>
        <div class="my-auto mx-4 ">
            <form action="{{ route('tagihan.export') }}" method="GET">
                <button type="submit" class="btn btn-primary">
                    <span class="bg-[oklch(62.7%_0.194_149.214)] text-white text-center px-6 py-4 rounded-md">Download
                        Excel</span>
                </button>
            </form>
        </div>
    </div>

    @php
        $units = ['tk', 'sd', 'smp', 'sma', 'pondok', 'smp'];
    @endphp

    <div class="bg-white p-4 rounded-lg shadow">
        @foreach ($units as $unit)
            <div id={{ strtoupper($unit) }} class="education-section hidden">
                <table class="min-w-full divide-y divide-gray-200" id="dataTable">
                    <thead class="bg-gray-50 border-b-2">
                        <tr>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenjang
                                Pendidikan
                            </th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Tipe Siswa
                            </th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Gender</th>

                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Total Bayar
                            </th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">DP Bayar</th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Diskon</th>
                            <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                        @if ($all_data->isEmpty())
                            <tr>
                                <td colspan="9" class="text-center py-4 text-gray-500">
                                    Data tidak ditemukan
                                </td>
                            </tr>
                        @else
                            @foreach ($all_data as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="border px-4 py-2 text-center text-sm">{{ $loop->iteration }}</td>
                                    {{-- <td class="border px-4 py-2 text-center text-sm">{{ $item->name }}</td> --}}
                                    <td class="border px-4 py-2 text-center text-sm">
                                        {{ strtoupper($item->unitPendidikan) }}
                                    </td>
                                    <td class="border px-4 py-2 text-center text-sm">{{ $item->tipe_siswa }}</td>
                                    <td class="border px-4 py-2 text-center text-sm">{{ $item->gender }}</td>
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
                                                    {{-- <form action="{{ route('update-tagihan', ['id' => $item->id_bayar]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
                                                    <h1 class="font-bold text-xl mb-4">Edit Tagihan Mabro</h1>
                                                    <div class="mb-4">
                                                        <label for="name"
                                                            class="block text-gray-700 font-medium">Nama</label>
                                                        <label for="name"
                                                            class="block text-gray-700 font-medium">{{ $item->name }}</label>

                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="jmlh_byr"
                                                            class="block text-gray-700 font-medium">Jumlah
                                                            Bayar</label>
                                                        <input type="number" id="jmlh_byr" name="jmlh_byr"
                                                            value="{{ $item->jmlh_byr }}"
                                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="status"
                                                            class="block text-gray-700 font-medium">Status
                                                            Tipe Pembayaran </label>
                                                        <select id="status" name="status"
                                                            value="{{ $item->status }}"
                                                            class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 appearance-none">
                                                            <option value="DP">DP</option>
                                                            <option value="Lunas">Lunas</option>
                                                            <option value="Cicil">Cicil</option>
                                                        </select>

                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="status"
                                                            class="block text-gray-700 font-medium">Status
                                                            Bayar</label>
                                                        <select id="status" name="byr_dft_ulang"
                                                            value="{{ $item->byr_dft_ulang }}"
                                                            class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 appearance-none">
                                                            <option value="lunas">Lunas</option>
                                                            <option value="belum">Belum</option>
                                                        </select>

                                                    </div>
                                                    <div class="flex justify-end">
                                                        <button type="submit"
                                                            class="bg-blue-500 text-white px-4 py-2  bg-[oklch(62.7%_0.194_149.214)] rounded-lg">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </div>



                                            </form> --}}
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
    <!-- Pagination Controls -->
    <div class="mt-4">
        {{ $all_data->appends(request()->except('page'))->links() }}
    </div>
</x-layoute>
