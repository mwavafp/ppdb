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
                        <label class="block text-sm font-medium">Status Tagihan</label>
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
                    {{-- <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Minimal DP --}}
                    </th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Tagihan</th>
                    {{-- <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Diskon</th> --}}
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Bayar</th>

                    <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Kekurangan
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status Tagihan
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
                            {{-- <td class="border px-4 py-2 text-center text-sm">@currency($item->dp_daful)
                            </td> --}}
                            <td class="border px-4 py-2 text-center text-sm">
                                @currency($item->total_bayar_daful - $item->diskon)
                            </td>
                            {{-- <td class="border px-4 py-2 text-center text-sm text-red-500">
                                @currency($item->diskon)
                            </td> --}}
                            <td class="border px-4 py-2 text-center text-sm">@currency($item->jmlh_byr + $item->jmlh_byr2 + $item->jmlh_byr3 + $item->jmlh_byr4) </td>
                            <td class="border px-4 py-2 text-center text-sm">
                                @currency($item->jmlh_byr >= $item->total_bayar_daful - $item->diskon ? 0 : $item->total_bayar_daful - $item->jmlh_byr - $item->jmlh_byr2 - $item->jmlh_byr3 - $item->jmlh_byr4 - $item->diskon)
                            </td>

                            <td class="p-4 border px-4 py-2 text-center">
                                @if (strtoupper($item->status) === 'LUNAS')
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

                                <div x-data="{ isModalOpen: false, isDetailOpen: false }">
                                    <!-- Tombol untuk membuka modal -->
                                    <div class="flex justify-between">
                                        <button @click="isModalOpen = true"
                                            class="bg-blue-500 text-white text-md px-3 py-2 rounded hover:bg-blue-600 flex items-center">
                                            <i class="fas fa-dollar-sign"></i>
                                        </button>
                                        <button @click="isDetailOpen = true"
                                            class="bg-yellow-500 text-white text-md px-3 py-2 rounded hover:bg-yellow-600 flex items-center">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </div>

                                    <!-- Modal -->
                                    <div x-show="isModalOpen"
                                        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                        style="display: none;">
                                        <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                                            <!-- Tombol untuk menutup modal -->
                                            <button @click="isModalOpen = false"
                                                class="absolute top-2 right-4 text-4xl text-gray-600 hover:text-gray-900">
                                                &times;
                                            </button>

                                            <!-- Konten Modal -->
                                            <form action="{{ route('update-tagihan', ['id' => $item->id_bayar]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
                                                    <h1 class="font-bold text-xl mb-6">Edit Tagihan Biaya</h1>

                                                    <!-- Nama -->
                                                    <div class="flex items-center mb-4">
                                                        <label class="w-1/3 text-gray-700 font-medium">Nama</label>
                                                        <div class="w-2/3">{{ $item->name }}</div>
                                                    </div>

                                                    <!-- Jumlah Bayar 1 -->
                                                    <div class="flex items-center mb-4">
                                                        <label for="jmlh_byr"
                                                            class="w-1/3 text-gray-700 font-medium">Pembayaran
                                                            1</label>
                                                        <input type="number" id="jmlh_byr" name="jmlh_byr"
                                                            value="{{ $item->jmlh_byr }}"
                                                            class="w-2/3 border-2 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                                                    </div>

                                                    <!-- Pembayaran 2 -->
                                                    @if ($item->jmlh_byr != 0)
                                                        <div class="flex items-center mb-4">
                                                            <label for="jmlh_byr2"
                                                                class="w-1/3 text-gray-700 font-medium">Pembayaran
                                                                2</label>
                                                            <input type="number" id="jmlh_byr2" name="jmlh_byr2"
                                                                value="{{ $item->jmlh_byr2 }}"
                                                                class="w-2/3 border-2 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                                                        </div>
                                                    @else
                                                        <input type="hidden" name="jmlh_byr2" value="0">
                                                    @endif

                                                    <!-- Pembayaran 3 -->
                                                    @if ($item->jmlh_byr2 != 0)
                                                        <div class="flex items-center mb-4">
                                                            <label for="jmlh_byr3"
                                                                class="w-1/3 text-gray-700 font-medium">Pembayaran
                                                                3</label>
                                                            <input type="number" id="jmlh_byr3" name="jmlh_byr3"
                                                                value="{{ $item->jmlh_byr3 }}"
                                                                class="w-2/3 border-2 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                                                        </div>
                                                    @else
                                                        <input type="hidden" name="jmlh_byr3" value="0">
                                                    @endif

                                                    <!-- Pembayaran 4 -->
                                                    @if ($item->jmlh_byr3 != 0)
                                                        <div class="flex items-center mb-4">
                                                            <label for="jmlh_byr4"
                                                                class="w-1/3 text-gray-700 font-medium">Pembayaran
                                                                4</label>
                                                            <input type="number" id="jmlh_byr4" name="jmlh_byr4"
                                                                value="{{ $item->jmlh_byr4 }}"
                                                                class="w-2/3 border-2 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                                                        </div>
                                                    @else
                                                        <input type="hidden" name="jmlh_byr4" value="0">
                                                    @endif

                                                    <!-- Info Admin & Tanggal -->
                                                    <div class="text-sm text-gray-600 mt-4">
                                                        Terakhir diupdate oleh <span
                                                            class="font-semibold">{{ $item->nama_admin ?? '' }}</span>
                                                        pada
                                                        <span>{{ \Carbon\Carbon::parse($item->updated_at) }}</span>
                                                    </div>

                                                    <!-- Tombol Simpan -->
                                                    <div class="flex justify-end mt-6">
                                                        <button type="submit"
                                                            class="text-white px-4 py-2 bg-[oklch(62.7%_0.194_149.214)] rounded-lg">
                                                            Simpan
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    <!-- Modal Detail Pembayaran -->
                                    <div x-show="isDetailOpen"
                                        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                        style="display: none;">
                                        <div
                                            class="bg-white rounded-lg shadow-lg w-11/12 md:w-3/4 lg:w-1/2 p-6 relative max-h-[80vh] overflow-auto">
                                            <!-- Tombol Close -->
                                            <button @click="isDetailOpen = false"
                                                class="absolute top-2 right-4 text-3xl text-gray-500 hover:text-gray-800">&times;</button>

                                            <h1 class="text-2xl font-semibold text-gray-800 border-b pb-3 mb-6">Detail
                                                Pembayaran</h1>

                                            <!-- Informasi Umum -->
                                            <!-- Informasi Umum sebagai Tabel Tersembunyi -->
                                            <!-- Informasi Umum dengan Tampilan Rapi dan Tidak Seperti Tabel -->
                                            <div class="mb-6 text-sm text-left text-gray-700">
                                                <table class="w-1/2 border-collapse border-spacing-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="p-0 pr-2 font-semibold">Nama</td>
                                                            <td class="p-0 pr-2">:</td>
                                                            <td class="p-0">{{ $item->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0 pr-2 font-semibold">Jenjang</td>
                                                            <td class="p-0 pr-2">:</td>
                                                            <td class="p-0">{{ $item->unt_pendidikan }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0 pr-2 font-semibold">Status tagihan</td>
                                                            <td class="p-0 pr-2">:</td>
                                                            <td class="p-0">{{ $item->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-0 pr-2 font-semibold">Status DP</td>
                                                            <td class="p-0 pr-2">:</td>
                                                            <td class="p-0">{{ ucfirst($item->byr_dft_ulang) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>


                                            <!-- Tabel Rincian Pembayaran -->
                                            <div class="overflow-x-auto mb-6">
                                                <table class="min-w-full border border-gray-300 text-sm">
                                                    <thead class="bg-gray-100">
                                                        <tr>
                                                            <th class="border border-gray-300 px-4 py-2 text-left">
                                                                Jenis Bayar</th>
                                                            <th class="border border-gray-300 px-4 py-2 text-right">
                                                                Jumlah Bayar (Rp)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $total_bayar = 0; @endphp
                                                        @for ($i = 1; $i <= 4; $i++)
                                                            @php
                                                                $field = $i === 1 ? 'jmlh_byr' : 'jmlh_byr' . $i;
                                                                $nilai = $item->$field ?? 0;
                                                            @endphp
                                                            @if ($nilai > 0)
                                                                @php $total_bayar += $nilai; @endphp
                                                                <tr class="odd:bg-white even:bg-gray-50">
                                                                    <td class="border border-gray-300 px-4 py-2">
                                                                        Pembayaran ke- {{ $i }}</td>
                                                                    <td
                                                                        class="border border-gray-300 px-4 py-2 text-right">
                                                                        {{ number_format($nilai, 0, ',', '.') }}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endfor
                                                    </tbody>

                                                </table>
                                            </div>

                                            <!-- Tabel Ringkasan Pembayaran -->
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full border border-gray-300 text-sm">
                                                    <tbody>

                                                        <tr>
                                                            <td class="border border-gray-300 px-4 py-2 font-semibold">
                                                                Total Tagihan</td>
                                                            <td class="border border-gray-300 px-4 py-2 text-right">Rp
                                                                {{ number_format($item->total_bayar_daful ?? 0, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-gray-100">
                                                            <td class="border border-gray-300 px-4 py-2 font-semibold">
                                                                Diskon</td>
                                                            <td class="border border-gray-300 px-4 py-2 text-right">Rp
                                                                {{ number_format($item->diskon ?? 0, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        <tr class="bg-gray-100">
                                                            <td class="border border-gray-300 px-4 py-2 font-semibold">
                                                                Total Pembayaran</td>
                                                            <td class="border border-gray-300 px-4 py-2 text-right">Rp
                                                                {{ number_format($total_bayar, 0, ',', '.') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="border border-gray-300 px-4 py-2 font-semibold">
                                                                Sisa Kekurangan</td>
                                                            <td class="border border-gray-300 px-4 py-2 text-right">
                                                                Rp
                                                                {{ number_format(($item->total_bayar_daful ?? 0) - $total_bayar - ($item->diskon ?? 0), 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Footer Info -->
                                            <p class="mt-6 text-xs text-gray-500">
                                                Diperbarui oleh <span
                                                    class="font-semibold">{{ $item->nama_admin ?? '-' }}</span> pada
                                                <span>{{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('d F Y H:i') }}</span>
                                            </p>
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
