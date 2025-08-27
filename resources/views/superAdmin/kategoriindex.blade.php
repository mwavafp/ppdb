<x-layoute>
    <x-slot:title>Data Kategori</x-slot:title>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    <div x-data="kategoriModal()" x-cloak>
        <div class="container py-6">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Manajemen Kategori</h1>
                <button 
                    @click="openCreateModalHandler"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                    + Tambah Kategori
                </button>
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full border-b-2 text-sm">
                <thead class="bg-green-200">
                    <tr>
                        <th class="p-2 border-b-2">No</th>
                        <th class="p-2 border-b-2">Nama</th>
                        <th class="p-2 border-b-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategori as $kat)
                        <tr>
                            <td class="p-2 border-b-2 text-center">{{ $loop->iteration }}</td>
                            <td class="p-2 border-b-2">{{ $kat->nama }}</td>
                            <td class="p-2 border-b-2 text-center">
                                <div class="flex justify-center space-x-2">
                                    <button 
                                        @click="openEditModal({{ $kat->id_kategori }}, '{{ $kat->nama }}')"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">Edit</button>

                                    <form action="{{ route('kategori.destroy', $kat->id_kategori) }}" method="POST" onsubmit="return confirm('Yakin hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- ✅ Modal Tambah/Edit Kategori -->
        <div>
            <!-- Backdrop -->
            <div x-show="openCreateModal || openEditModalFlag"
                 x-cloak
                 class="fixed inset-0 bg-black bg-opacity-40 z-40"
                 x-transition.opacity></div>

            <!-- Modal -->
            <div x-show="openCreateModal || openEditModalFlag"
                 x-cloak
                 class="fixed z-50 inset-0 flex items-center justify-center p-4"
                 x-transition>
                <div class="bg-white rounded-lg shadow-md w-full max-w-md p-6">
                    <h2 class="text-lg font-bold mb-4" x-text="modalTitle"></h2>

                    <form :action="formAction" method="POST">
                        @csrf
                        <template x-if="isEdit">
                            <input type="hidden" name="_method" value="PUT" />
                        </template>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Nama Kategori</label>
                            <input type="text" name="nama" x-model="formData.nama" class="w-full border rounded px-3 py-2" required>
                        </div>

                        <div class="flex justify-end space-x-2">
                            <button type="button" @click="closeModal"
                                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Batal</button>
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                                    x-text="isEdit ? 'Update' : 'Simpan'"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function kategoriModal() {
            return {
                openCreateModal: false,
                openEditModalFlag: false,
                isEdit: false,
                formData: { nama: '' },
                formAction: '',
                modalTitle: '',

                openCreateModalHandler() {
                    this.isEdit = false;
                    this.formData.nama = '';
                    this.formAction = '{{ route('kategori.store') }}';
                    this.modalTitle = 'Tambah Kategori';
                    this.openCreateModal = true;
                },

                openEditModal(id, nama) {
                    this.isEdit = true;
                    this.formData.nama = nama;
                    this.formAction = `/kategori/${id}`;
                    this.modalTitle = 'Edit Kategori';
                    this.openEditModalFlag = true;
                },

                closeModal() {
                    this.openCreateModal = false;
                    this.openEditModalFlag = false;
                    this.formData.nama = '';
                    this.formAction = '';
                    this.isEdit = false;
                }
            }
        }
    </script>
</x-layoute>
