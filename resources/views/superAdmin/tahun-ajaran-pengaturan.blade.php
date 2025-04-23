<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<x-layoute>
    <x-slot:title>{{ 'Tahun Ajaran' }}</x-slot:title>

    <header class="bg-white border-b shadow-sm py-5 mb-10">
            <div class="container mx-auto px-4 flex flex-col">
                <h1 class="text-2xl font-bold text-gray-800">Pengaturan Tahun Ajaran</h1>
                <p class="text-sm text-gray-500 mt-1">Mengatur Tahun Ajaran</p>
            </div>
        </header>


        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Awal</th>
                        <th class="py-2 px-4">Akhir</th>
                        <th class="py-2 px-4">#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tahunAjaran as $tahun)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $tahun->id_tahun }}</td>
                            <td class="py-2 px-4">{{ $tahun->nama }}</td>
                            <td class="py-2 px-4">{{ $tahun->awal }}</td>
                            <td class="py-2 px-4">{{ $tahun->akhir }}</td>
                            <td class="py-2 px-4">
                                <button onclick="openEditModal({{ $tahun }})" class="text-blue-500 hover:underline">Edit</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-2 px-4 text-center">Tidak ada data tahun ajaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h2 class="text-2xl mb-4">Edit Tahun Ajaran</h2>

            <form id="editForm" method="POST">
                @csrf
                <input type="hidden" id="edit_id_tahun" name="id_tahun">

                <div class="mb-4">
                    <label class="block text-gray-700">Nama</label>
                    <input type="text" id="edit_nama" name="nama" class="w-full p-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Awal</label>
                    <input type="date" id="edit_awal" name="awal" class="w-full p-2 border rounded-lg">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Akhir</label>
                    <input type="date" id="edit_akhir" name="akhir" class="w-full p-2 border rounded-lg">
                </div>

                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(tahun) {
            document.getElementById('edit_id_tahun').value = tahun.id_tahun;
            document.getElementById('edit_nama').value = tahun.nama;
            document.getElementById('edit_awal').value = tahun.awal;
            document.getElementById('edit_akhir').value = tahun.akhir;
            
            document.getElementById('editForm').action = `/tahun-ajaran/update/${tahun.id_tahun}`;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>

</x-layoute>
