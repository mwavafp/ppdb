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
    
    <header class="bg-white border-b shadow-sm py-5 mb-10">
            <div class="container mx-auto px-4 flex flex-col">
                <h1 class="text-2xl font-bold text-gray-800">Pengaturan Gelombang</h1>
                <p class="text-sm text-gray-500 mt-1">Mengatur Jadwal Gelombang Masuk</p>
            </div>
        </header>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Status</th>
                        <th class="py-2 px-4">awal_acara</th>
                        <th class="py-2 px-4">akhir_acara</th>
                        <th class="py-2 px-4">#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($acara as $gelombang)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $gelombang->id_acara }}</td>
                            <td class="py-2 px-4">{{ $gelombang->namaAcara }}</td>
                            <td class="py-2 px-4">{{ $gelombang->status }}</td>
                            <td class="py-2 px-4">{{ $gelombang->awal_acara }}</td>
                            <td class="py-2 px-4">{{ $gelombang->akhir_acara }}</td>
                            <td class="py-2 px-4">
                                <button
                                    class="text-blue-500 hover:underline"
                                    onclick="openEditModal(this)"
                                    data-id="{{ $gelombang->id_acara }}"
                                    data-nama="{{ $gelombang->namaAcara }}"
                                    data-status="{{ $gelombang->status }}"
                                    data-awal="{{ $gelombang->awal_acara }}"
                                    data-akhir="{{ $gelombang->akhir_acara }}"
                                >
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-2 px-4 text-center">Tidak ada data gelombang ajaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
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
                <input type="text" name="namaAcara" id="edit-nama" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block">Status</label>
                <select name="status" id="edit-status" class="w-full border px-3 py-2 rounded" required>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block">Awal Acara</label>
                <input type="date" name="awal_acara" id="edit-awal" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block">Akhir Acara</label>
                <input type="date" name="akhir_acara" id="edit-akhir" class="w-full border px-3 py-2 rounded" required>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-400 text-white rounded">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>


</x-layoute>
