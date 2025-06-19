<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="  flex items-center mb-4">
        <h1 class="text-3xl font-bold">TAGIHAN PENDAFTAR</h1>
        <!-- Form Search -->
        <div class="flex-1 flex justify-center relative">
            <form method="GET" action="{{ route('search') }}" id="searchForm">
                <input type="text" name="search"
                    class="border bg-white border-gray-400 rounded-full py-2 px-4 pl-10 w-[500px]" placeholder="Search"
                    value="{{ request('search') }}" oninput="document.getElementById('searchForm').submit()">
            </form>
            <i class="fas fa-search absolute left-[calc(50%-240px+12px)] top-3 text-gray-400"></i>
        </div>
    </div>

    <div class="flex w-full my-8">
        <!--Form Filter -->
        <form method="GET" action="{{ route('filter') }}" class="w-full">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-2 mb-4 items-end">
                    <!-- Jenjang -->
                    <div>
                        <label class="block text-sm font-medium">Jenjang</label>
                        <select name="unt_pendidikan"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                            <option value="">Semua</option>
                            <option value="tk" {{ request('unt_pendidikan') == 'tk' ? 'selected' : '' }}>TK</option>
                            <option value="sd" {{ request('unt_pendidikan') == 'sd' ? 'selected' : '' }}>SD</option>
                            <option value="smp"{{ request('unt_pendidikan') == 'smp' ? 'selected' : '' }}>SMP
                            </option>
                            <option value="sma"{{ request('unt_pendidikan') == 'sma' ? 'selected' : '' }}>SMA
                            </option>
                            <option value="tpq"{{ request('unt_pendidikan') == 'tpq' ? 'selected' : '' }}>TPQ
                            </option>
                            <option value="madin"{{ request('unt_pendidikan') == 'madin' ? 'selected' : '' }}>MADIN
                            </option>
                            <option value="pondok"{{ request('unt_pendidikan') == 'pondok' ? 'selected' : '' }}>PONDOK
                            </option>
                        </select>
                    </div>

                    <!-- Status DP -->
                    <div>
                        <label class="block text-sm font-medium">Status DP</label>
                        <select name="dft_ulang"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                            <option value="">Semua</option>
                            <option value="lunas"{{ request('dft_ulang') == 'lunas' ? 'selected' : '' }}>Bayar
                            </option>
                            <option value="belum"{{ request('dft_ulang') == 'belum' ? 'selected' : '' }}>Belum Bayar
                            </option>
                        </select>
                    </div>

                    <!-- Tipe Pembayaran -->
                    <div>
                        <label class="block text-sm font-medium">Tipe Pembayaran</label>
                        <select name="status"
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                            <option value="">Semua</option>
                            <option value="Cicil"{{ request('status') == 'Cicil' ? 'selected' : '' }}>Cicil</option>
                            <option value="Lunas"{{ request('status') == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                        </select>
                    </div>

                    <!-- Tombol Cari & Reset -->
                    <div class="flex space-x-2">
                        <button type="submit"
                            class="bg-green-500 text-white py-2 px-4 rounded-md border hover:bg-green-600 transition w-full">Cari</button>
                        <a href="{{ route('filter') }}"
                            class="bg-red-500 text-white py-2 px-4 rounded-md border hover:bg-red-600 transition w-full text-center">Reset</a>
                    </div>

                    <!-- Tombol Download Excel -->
                    <div>
                        <form action="{{ route('tagihan.export') }}" method="GET">
                            <button type="submit"
                                class="bg-green-600 text-white py-2 px-4 rounded-md w-full hover:bg-green-700 transition">
                                Download Excel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>




    <div class="bg-white ">
        <table class="min-w-full divide-y divide-gray-200" id="dataTable">
            <thead class="bg-[oklch(62.7%_0.194_149.214)] border-b-2">
                <tr class="text-white">
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenjang
                        Pendidikan
                    </th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Status DP
                    </th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Minimal DP
                    </th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Tagihan</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Diskon</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Bayar</th>

                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Kekurangan
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Tipe Pembayaran
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
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
                            <td class="border px-4 py-2 text-center text-sm">{{ $item->name }}</td>
                            <td class="border px-4 py-2 text-center text-sm">
                                {{ strtoupper($item->unt_pendidikan) }}
                            </td>
                            <td class="border px-4 py-2 text-center text-sm">
                                {{ $item->byr_dft_ulang === 'lunas' ? 'Bayar' : 'Belum Bayar' }}</td>
                            <td class="border px-4 py-2 text-center text-sm">@currency($item->dp_daful)
                            </td>
                            <td class="border px-4 py-2 text-center text-sm">
                                @currency($item->total_bayar_daful)
                            </td>
                            <td class="border px-4 py-2 text-center text-sm text-red-500">
                                @currency($item->diskon)
                            </td>
                            <td class="border px-4 py-2 text-center text-sm">@currency($item->jmlh_byr) </td>
                            <td class="border px-4 py-2 text-center text-sm">
                                @currency($item->jmlh_byr >= $item->total_bayar_daful - $item->diskon ? 0 : $item->total_bayar_daful - $item->jmlh_byr - $item->diskon)
                            </td>

                            <td class="p-4 border px-4 py-2 text-center">
                                @if ($item->jmlh_byr >= $item->total_bayar_daful - $item->diskon)
                                    <span class="border text-white  text-center bg-green-500 rounded-lg  px-4 py-2">
                                        {{ strtoupper($item->status) }}
                                    </span>
                                @else
                                    <span class="border text-white  text-center bg-red-500 rounded-lg px-4 py-2">
                                        {{ strtoupper($item->status) }}
                                    </span>
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-center text-sm">
                                <!-- Modal -->

                                <div x-data="{ isModalOpen: false }">
                                    <!-- Tombol untuk membuka modal -->
                                    <button @click="isModalOpen = true"
                                        class="bg-blue-500 text-white right-4 text-md px-4 py-2 rounded hover:bg-blue-600 flex items-center">
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
                                                class="absolute top-2 right-4 text-4xl right-2 text-gray-600 hover:text-gray-900">
                                                &times;
                                            </button>

                                            <!-- Konten Modal -->
                                            <!-- pemakaian include atau component sama saja dan yang wajib diteruskan adalah datanya -->
                                            <!-- Yand dirender menggunakan fungsi dari showData -->
                                            <form action="{{ route('update-tagihan', ['id' => $item->id_bayar]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
                                                    <h1 class="font-bold text-xl mb-4">Edit Tagihan Biaya</h1>
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
                                                            class="mt-1 block w-full border-2 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                    </div>
                                                                                                                        <div class="text-sm text-gray-600 mt-4">
                                                                Terakhir diupdate oleh <span class="font-semibold"> {{ $item->nama_admin ?? '' }}</span>
                                                                pada <span>{{ \Carbon\Carbon::parse($item->updated_at)}}</span>
                                                            </div>


                                                    <div class="flex justify-end">
                                                        <button type="submit"
                                                            class=" text-white px-4 py-2  bg-[oklch(62.7%_0.194_149.214)] rounded-lg">
                                                            Simpan
                                                        </button>
                                                    </div>
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
    <!-- Pagination Controls -->
    <div class="mt-4">
        {{ $all_data->appends(request()->except('page'))->links() }}
    </div>

</x-layoute>
