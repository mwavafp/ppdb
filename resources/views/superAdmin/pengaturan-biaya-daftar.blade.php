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
        selectTab('PONDOK');
    };
</script>

<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <header class=" mb-2 flex">
        <div class="w-1/2 container flex flex-col">
            <h1 class="text-3xl font-bold">Pengaturan Biaya Daftar</h1>
            <p class="text-sm text-gray-500 mt-1">Mengatur Perincian Biaya Daftar</p>
        </div>
        <div class=" w-1/2">
            <div class="text-right m-4">
                <div x-data="{ isModalOpen: false }">
                    <!-- Tombol untuk membuka modal -->
                    <button @click="isModalOpen = true"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white p-2 rounded-md">
                        <span>Tambah Gelombang</span>
                    </button>

                    <div class=" p-4">
                        <!-- Modal -->
                        <div x-show="isModalOpen"
                            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                            style="display: none;">
                            <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                                <!-- Tombol untuk menutup modal -->
                                <button @click="isModalOpen = false"
                                    class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">&times;</button>

                                <!-- Form tambah admin -->
                                <form action="{{ route('superAdmin.tambah-biaya-daftar') }}" method="POST">
                                    @csrf
                                    <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
                                        <h1 class="font-bold text-xl mb-4">Tambah Biaya Daftar</h1>
                                        <div class="mb-4">
                                            <label for="gelombang"
                                                class="block text-sm font-medium text-gray-700 mb-1">Pilih
                                                Gelombang Acara</label>
                                            <select name="id_acara" id="id_gelombang" required
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                @foreach ($harga_unitPendidikan as $item)
                                                    <option value={{ $item->id_acara }}>{{ $item->namaAcara }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="pendidikan"
                                                class="block text-sm font-medium text-gray-700 mb-1">Pilih
                                                Unit Pendidikan</label>
                                            <select name="unitPendidikan" id="role" required
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                <option value="">-- Pilih Unit Pendidikan --</option>
                                                <option value="pondok">PONDOK</option>
                                                <option value="tpq">TPQ</option>
                                                <option value="madin">MADIN</option>
                                                <option value="tk">TK</option>
                                                <option value="sd">SD</option>
                                                <option value="smp">SMP</option>
                                                <option value="sma">SMA</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="pendidikan"
                                                class="block text-sm font-medium text-gray-700 mb-1">Pilih
                                                Tipe Siswa</label>
                                            <select name="tipe_siswa" id="role" required
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                <option value="">-- Pilih Tipe Siswa --</option>
                                                <option value="umum">Umum</option>
                                                <option value="alumni">Alumni</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="pendidikan"
                                                class="block text-sm font-medium text-gray-700 mb-1">Pilih
                                                Gender</label>
                                            <select name="gender" id="role" required
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                <option value="">-- Pilih Gender --</option>
                                                <option value="laki-laki">Laki - Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="name" class="block text-gray-700 font-medium">Harga Daftar
                                                Ulang</label>
                                            <input type="number" name="total_bayar_daful"
                                                placeholder="Masukkan Harga Daftar Ulang"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="DP" class="block text-gray-700 font-medium">Harga
                                                DP</label>
                                            <input type="number" name="dp_daful" placeholder="Masukkan Harga DP"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="diskon" class="block text-gray-700 font-medium">Harga
                                                Diskon</label>
                                            <input type="number" name="diskon" placeholder="Masukkan Harga Diskon"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                required>
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="submit" id="submitBtn"
                                                class="text-white px-4 py-2 bg-[oklch(62.7%_0.194_149.214)] rounded-lg">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination Controls -->
                {{-- <div class="my-4">
            {{ $all_data->links() }}
        </div> --}}
            </div>

        </div>
    </header>

    <!-- Form Search -->
    <div class="relative">


        <div class="flex w-full px-16">
            <div class="flex justify-center space-x-4 my-4">
                @foreach (['PONDOK', 'MADIN', 'TPQ', 'TK', 'SD', 'SMP', 'SMA'] as $jenjang)
                    <button
                        class="menu-btn bg-orange text-black hover:text-white px-6 py-2 rounded hover:bg-[oklch(62.7%_0.194_149.214)] active:bg-[oklch(62.7%_0.194_149.214)]"
                        onclick="selectTab('{{ $jenjang }}')">{{ $jenjang }}</button>
                @endforeach
            </div>
        </div>

        @php
            $units = ['pondok', 'madin', 'tpq', 'tk', 'sd', 'smp', 'sma'];
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
                                <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider"
                                    colspan="2">Aksi
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
                                        <td class="border  py-2 text-center text-sm">
                                            <div x-data="{ isModalOpen: false }">
                                                <button @click="isModalOpen = true"
                                                    class="text-white bg-amber-500 px-4 py-2 rounded-md hover:underline">
                                                    <i class="fas fa-edit"></i><span>Edit</span>
                                                </button>

                                                <div x-show="isModalOpen"
                                                    class="fixed inset-0 flex text-left text-md items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                                    style="display: none;">
                                                    <div
                                                        class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                                                        <!-- Tombol untuk menutup modal -->
                                                        <button @click="isModalOpen = false"
                                                            class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">&times;</button>

                                                        <form
                                                            action="{{ route('update-biaya-daftar', ['id' => $item->id_harga]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <h1 class="font-bold text-xl mb-4">Edit Biaya
                                                                Pendaftaran
                                                            </h1>
                                                            <div class="mb-4">
                                                                <label for="name"
                                                                    class="block text-gray-700 font-medium">Gelombang</label>
                                                                <label for="name"
                                                                    class="block text-gray-700 font-medium">{{ $item->namaAcara }}</label>

                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="name"
                                                                    class="block text-gray-700 font-medium">Total
                                                                    Bayar</label>
                                                                <input type="number" name="total_bayar_daful"
                                                                    value="{{ $item->total_bayar_daful }}"
                                                                    class="mt-1 block w-full border-2 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                    required>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="name"
                                                                    class="block text-gray-700 font-medium">DP
                                                                    Bayar</label>
                                                                <input type="number" name="dp_daful"
                                                                    value="{{ $item->dp_daful }}"
                                                                    class="mt-1 block w-full border-2 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                    required>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label for="name"
                                                                    class="block text-gray-700 font-medium">DISKON</label>
                                                                <input type="number" name="diskon"
                                                                    value="{{ $item->diskon }}"
                                                                    class="mt-1 block w-full border-2 p-2 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                    required>
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
                                        <td class="py-2 ">
                                            <form action="{{ route('superAdmin.delete-biaya', $item->id_harga) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="bg-red-500 text-white  px-4 py-2 rounded hover:bg-red-600  items-center">
                                                    <i class="fas fa-trash "></i>
                                                </button>
                                            </form>
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

    <div class="mt-10">
        <div class="container flex flex-col">
            <h1 class="text-3xl font-bold">Pengaturan Catatan Biaya</h1>
            <p class="text-sm text-gray-500 mt-1">Mengatur Perincian Biaya Daftar</p>
        </div>
    </div>
    <div>
        <div class="bg-white px-7 pb-7 pt-1 rounded-lg shadow-lg max-w-full">
            <form action="{{ route('notes.update_all') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                @foreach ($notes as $note)
                    <div>
                        <label class="block font-semibold mb-2">
                            Catatan {{ strtoupper($note->unit) }}
                        </label>
                        <textarea name="catatan[{{ $note->id_note }}]" rows="3"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-400">{{ old('catatan.' . $note->id_note, $note->catatan) }}</textarea>
                    </div>
                @endforeach

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('superAdmin-biaya-daftar') }}"
                        class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg">
                        Simpan Semua
                    </button>
                </div>
            </form>


        </div>
    </div>
</x-layoute>
