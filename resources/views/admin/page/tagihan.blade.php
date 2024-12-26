<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-9 py-5 flex justify-between items-center mb-4">
        <h1 class="font-bold text-xl mr-2">TAGIHAN BIAYA</h1>
        <div class="relative">
            <form method="GET" action="{{ route('search') }}" id="searchForm">
                <input type="text" name="search" class="border border-gray-400 rounded-full py-2 px-4 pl-10 w-[500px]"
                    placeholder="Search" value="{{ request('search') }}"
                    oninput="document.getElementById('searchForm').submit()">

            </form>
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
        <span class="bg-gray-200 text-black py-2 px-4 rounded-full">Nama Atmin</span>
    </div>
    <form method="GET" action="{{ route('filter') }}">
        <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg  shadow-md mt-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenjang</label>
                    <select name="unt_pendidikan"
                        class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                        <option value="">Semua</option>
                        <option value="tk">TK</option>
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sma">SMA</option>
                        <option value="tpq">TPQ</option>
                        <option value="madin">MADIN</option>
                        <option value="pondok">PONDOK</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">Tipe Pembayaran</label>
                    <select name="status"
                        class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none  focus:border-black sm:text-sm">
                        <option value="">Semua</option>
                        <option value="Cicil">Cicil</option>
                        <option value="Lunas">Lunas</option>
                        <option value="DP">DP</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium">Status</label>
                    <select name="dft_ulang"
                        class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none  focus:border-black sm:text-sm">
                        <option value="">Semua</option>
                        <option value="lunas">Lunas</option>
                        <option value="belum">Belum Lunas</option>
                    </select>
                </div>
                <div class="flex mt-4 mx-4">
                    <button type="submit"
                        class="bg-green-500 text-white py-2 px-4 rounded-md mr-2 w-[100px] border border-transparent hover:bg-green-600 hover:border-green-600 transition">Cari</button>
                </div>
            </div>
        </div>
    </form>


    <div class="bg-white p-4 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200" id="dataTable">
            <thead class="bg-gray-50 border-b-2">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenjang Pendidikan
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Tipe Pembayaran</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Tagihan</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Bayar</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Kekurangan
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                @foreach ($all_data as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-2 text-center">{{ $item->id_bayar }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->name }}</td>
                        <td class="border px-4 py-2 text-center">{{ strtoupper($item->unt_pendidikan) }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->status }}</td>
                        <td class="border px-4 py-2 text-center">100000</td>
                        <td class="border px-4 py-2 text-center">{{ $item->jmlh_byr }}</td>
                        <td class="border px-4 py-2 text-center">
                            {{ $item->jmlh_byr > 10000000 ? 0 : 10000000 - $item->jmlh_byr }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->byr_dft_ulang }}</td>
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
                                        <form action="{{ route('update-tagihan', $item->id_bayar) }}" method="POST">
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
                                                    <label for="jmlh_byr" class="block text-gray-700 font-medium">Jumlah
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
                                                <div class="flex justify-end">
                                                    <button type="submit"
                                                        class="bg-blue-500 text-white px-4 py-2 rounded bg-primary rounded-lg">
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
            </tbody>
        </table>

        <!-- Pagination Controls -->
        <div class="mt-4">
            {{ $all_data->links() }}
        </div>
</x-layoute>
