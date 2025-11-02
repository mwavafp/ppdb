<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function openEditModal(button) {
        const modal = document.getElementById('editModal');

        document.getElementById('edit-id').value = button.dataset.id;
        document.getElementById('edit-nama').value = button.dataset.nama;
        document.getElementById('edit-status').value = button.dataset.status;
        document.getElementById('edit-awal').value = button.dataset.awal;
        document.getElementById('edit-akhir').value = button.dataset.akhir;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditModal() {
        const modal = document.getElementById('editModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>


<x-layoute>
    <x-slot:title>{{ 'gelombang Ajaran' }}</x-slot:title>


    <header class="  flex">
        <div class="container mx-auto  flex flex-col w-1/2">
            <h1 class="text-3xl font-bold">Pengaturan Gelombang</h1>
            <p class="text-sm text-gray-500 mt-1">Mengatur Jadwal Gelombang Masuk</p>
        </div>
        <div class=" w-1/2">
            <div class="text-right m-4">
                <div x-data="{ isModalOpen: false }">
                    <!-- Tombol untuk membuka modal -->
                    <button @click="isModalOpen = true" class="bg-[oklch(62.7%_0.194_149.214)] text-white p-2 rounded-md">
                        <span>Tambah Gelombang</span>
                    </button>

                    <div class="mx-8 p-4">
                        <!-- Modal -->
                        <div x-show="isModalOpen"
                            class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                            style="display: none;">
                            <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                                <!-- Tombol untuk menutup modal -->
                                <button @click="isModalOpen = false"
                                    class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">&times;</button>

                                <!-- Form tambah admin -->
                                <form action="{{ route('superAdmin.tambah-gelombang') }}" method="POST">
                                    @csrf
                                    <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
                                        <h1 class="font-bold text-xl mb-4">Tambahkan Gelombang Masuk</h1>

                                        <div class="mb-4">
                                            <label for="name" class="block text-gray-700 font-medium">Nama
                                                Gelombang</label>
                                            <input type="text" name="namaAcara" placeholder="Masukkan Nama Gelombang"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                required>
                                        </div>




                                        <input id="Status" type="hidden" name="status" value="tidak_aktif">

                                        <div class="mb-4">
                                            <label for="awal_ajaran" class="block text-gray-700 font-medium">Awal Ajaran
                                                Tahun
                                                Baru</label>
                                            <input type="date" id="awal" name="awal_acara"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div class="mb-4">
                                            <label for="akhir_ajaran" class="block text-gray-700 font-medium">Akhir
                                                Ajaran Tahun
                                                Baru</label>
                                            <input type="date" id="akhir" name="akhir_acara"
                                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
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


    <table class="w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr class="text-white bg-[oklch(62.7%_0.194_149.214)]">
                <th class="py-2 px-4">No</th>
                <th class="py-2 px-4">Nama</th>
                <th class="py-2 px-4">Status</th>
                <th class="py-2 px-4">Awal Acara</th>
                <th class="py-2 px-4">Akhir Acara</th>
                <th class="py-2 px-4" colspan="2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($acara as $gelombang)
                <tr class="border-b text-center">
                    <td class="py-2 px-4">{{ $gelombang->id_acara }}</td>
                    <td class="py-2 px-4">{{ $gelombang->namaAcara }}</td>
                    <td class="py-2 px-4">{{ $gelombang->status === 'aktif' ? 'Aktif' : 'Nonaktif' }}</td>
                    <td class="py-2 px-4">{{ $gelombang->awal_acara }}</td>
                    <td class="py-2 px-4">{{ $gelombang->akhir_acara }}</td>
                    <td class="py-2 ">
                        <button class="text-white bg-amber-500 px-4 py-2 rounded-md hover:underline"
                            onclick="openEditModal(this)" data-id="{{ $gelombang->id_acara }}"
                            data-nama="{{ $gelombang->namaAcara }}" data-status="{{ $gelombang->status }}"
                            data-awal="{{ $gelombang->awal_acara }}" data-akhir="{{ $gelombang->akhir_acara }}">
                            Edit
                        </button>
                    </td>
                    <td class="py-2 ">
                        <form action="{{ route('superAdmin.delete-gelombang', $gelombang->id_acara) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white  px-4 py-2 rounded hover:bg-red-600  items-center">
                                <i class="fas fa-trash "></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="py-2 px-4 text-center">Tidak ada data gelombang ajaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <!-- Modal Edit -->
    <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Edit Gelombang</h2>
            <form id="editForm" method="POST" action="{{ route('superAdmin.gelombang.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_acara" id="edit-id">

                <div class="mb-4">
                    <label class="block">Nama Acara</label>
                    <input type="text" name="namaAcara" id="edit-nama" class="w-full border px-3 py-2 rounded"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block">Status</label>
                    <select name="status" id="edit-status" class="w-full border px-3 py-2 rounded" required>
                        <option value="aktif">Aktif</option>
                        <option value="tidak_aktif">Nonaktif</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block">Awal Acara</label>
                    <input type="date" name="awal_acara" id="edit-awal" class="w-full border px-3 py-2 rounded"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block">Akhir Acara</label>
                    <input type="date" name="akhir_acara" id="edit-akhir" class="w-full border px-3 py-2 rounded"
                        required>
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
                </div>
            </form>
        </div>
    </div>




</x-layoute>
