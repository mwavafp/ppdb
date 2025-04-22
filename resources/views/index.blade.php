<x-layoute>
    <x-slot:title>{{ 'Data Siswa' }}</x-slot:title>

    <div class="px-9 py-5 flex justify-between items-center mb-4">
        <h1 class="font-bold text-xl mr-2">DATA SISWA</h1>
        <div class="relative">
            <form method="GET" action="{{ route('index') }}" id="searchForm">
                <input type="text" name="search" class="border border-gray-400 rounded-full py-2 px-4 pl-10 w-[500px]"
                    placeholder="Cari siswa..." value="{{ request('search') }}"
                    oninput="document.getElementById('searchForm').submit()">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </form>
        </div>
        <span
            class=" text-white bg-[oklch(62.7%_0.194_149.214)] py-2 px-4 rounded-md">{{ strtoupper(auth()->user()->name) }}</span>
    </div>

    <form method="GET" action="{{ route('index') }}">
        <div class="max-w-7xl mx-8 my-8">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                <!-- Filter Gender -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                        <option value="">Semua</option>
                        <option value="laki-laki" {{ request('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-laki
                        </option>
                        <option value="perempuan" {{ request('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select>
                </div>

                <!-- Filter Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                        <option value="">Semua</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak
                            Aktif</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <div class="flex mt-4">
                    <button type="submit"
                        class="bg-green-500 text-white py-2 px-4 rounded-md w-[100px] hover:bg-green-600 transition">
                        Filter
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div class="bg-white px-8 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-[oklch(62.7%_0.194_149.214)]">
                <tr class="text-white">
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Alamat</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Gender</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Ibu</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($all_data as $index => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->name }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->alamat }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->gender }}</td>
                        <td class="border px-4 py-2 text-center">
                            {{ $item->kelas->pluck('unt_pendidikan')->join(', ') ?? '-' }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->ortu->nm_ibu ?? '-' }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->status ?? '-' }}</td>
                        <td class="border px-4 py-2 text-center">

                            <div x-data="{ isEditModalOpen: false }">
                                <!-- Tombol Edit -->
                                <button @click="isEditModalOpen = true"
                                    class="bg-blue-500 text-white mx-2 px-3 py-1 rounded hover:bg-blue-600">
                                    Edit
                                </button>

                                <!-- Modal Edit -->
                                <div x-show="isEditModalOpen"
                                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                    style="display: none;">
                                    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                                        <button @click="isEditModalOpen = false"
                                            class="absolute top-2 right-2 text-gray-600">&times;</button>
                                        <h2 class="font-bold text-xl mb-4">Edit Data</h2>
                                        <form action="{{ route('siswa.update', $item->id_user) }}" method="POST">
                                            @csrf
                                            <div x-show="isEditModalOpen"
                                                class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                                                <div
                                                    class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl max-h-[90vh] overflow-y-auto">

                                                    <h2 class="font-bold text-xl mb-4">Edit Data</h2>

                                                    <!-- Form Edit Siswa -->
                                                    <form action="{{ route('siswa.update', $item->id_user) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT') <!-- Menambahkan method PUT untuk update -->

                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                            <!-- Kolom Kiri -->
                                                            <div>
                                                                <!-- Data Siswa -->
                                                                <div class="mb-4">
                                                                    <label for="name"
                                                                        class="block text-lg font-semibold text-left mb-2">Nama</label>
                                                                    <input type="text" id="name" name="name"
                                                                        value="{{ $item->name }}"
                                                                        class="w-full border px-3 py-2 rounded"
                                                                        required>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="alamat"
                                                                        class="block text-lg font-semibold text-left mb-2">Alamat</label>
                                                                    <input type="text" id="alamat" name="alamat"
                                                                        value="{{ $item->alamat }}"
                                                                        class="w-full border px-3 py-2 rounded"
                                                                        required>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="nisn"
                                                                        class="block text-lg font-semibold text-left mb-2">NISN</label>
                                                                    <input type="text" id="nisn" name="nisn"
                                                                        value="{{ $item->nisn }}"
                                                                        class="w-full border px-3 py-2 rounded"
                                                                        required>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="gender"
                                                                        class="block text-lg font-semibold text-left mb-2">Gender</label>
                                                                    <select id="gender" name="gender"
                                                                        class="w-full border px-3 py-2 rounded"
                                                                        required>
                                                                        <option value="laki-laki"
                                                                            {{ $item->gender == 'laki-laki' ? 'selected' : '' }}>
                                                                            Laki-laki</option>
                                                                        <option value="perempuan"
                                                                            {{ $item->gender == 'perempuan' ? 'selected' : '' }}>
                                                                            Perempuan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="tmpt_lahir"
                                                                        class="block text-lg font-semibold text-left mb-2">Tempat
                                                                        Lahir</label>
                                                                    <input type="text" id="tmpt_lahir"
                                                                        name="tmpt_lahir"
                                                                        value="{{ $item->tmpt_lahir }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="tgl_lahir"
                                                                        class="block text-lg font-semibold text-left mb-2">Tanggal
                                                                        Lahir</label>
                                                                    <input type="date" id="tgl_lahir"
                                                                        name="tgl_lahir"
                                                                        value="{{ $item->tgl_lahir }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="asl_sekolah"
                                                                        class="block text-lg font-semibold text-left mb-2">Asal
                                                                        Sekolah</label>
                                                                    <input type="text" id="asl_sekolah"
                                                                        name="asl_sekolah"
                                                                        value="{{ $item->asl_sekolah }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="status"
                                                                        class="block text-lg font-semibold text-left mb-2">Status</label>
                                                                    <select id="status" name="status"
                                                                        class="w-full border px-3 py-2 rounded"
                                                                        required>
                                                                        <option value="aktif"
                                                                            {{ $item->status == 'aktif' ? 'selected' : '' }}>
                                                                            Aktif</option>
                                                                        <option value="tidak_aktif"
                                                                            {{ $item->status == 'tidak_aktif' ? 'selected' : '' }}>
                                                                            Tidak Aktif</option>
                                                                    </select>
                                                                </div>

                                                                <div class="mb-4">
                                                                    <label for="nm_ayah"
                                                                        class="block text-lg font-semibold text-left mb-2">Nama
                                                                        Ayah</label>
                                                                    <input type="text" id="nm_ayah"
                                                                        name="nm_ayah"
                                                                        value="{{ $item->ortu->nm_ayah ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="nmr_kk"
                                                                        class="block text-lg font-semibold text-left mb-2">Nomor
                                                                        KK</label>
                                                                    <input type="text" id="nmr_kk"
                                                                        name="nmr_kk"
                                                                        value="{{ $item->ortu->nmr_kk ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="nik_ayah"
                                                                        class="block text-lg font-semibold text-left mb-2">NIK
                                                                        Ayah</label>
                                                                    <input type="text" id="nik_ayah"
                                                                        name="nik_ayah"
                                                                        value="{{ $item->ortu->nik_ayah ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                            </div>

                                                            <!-- Kolom Kanan -->
                                                            <div>
                                                                <!-- Data Ayah -->

                                                                <div class="mb-4">
                                                                    <label for="tgl_lhr_ayah"
                                                                        class="block text-lg font-semibold text-left mb-2">Tanggal
                                                                        Lahir Ayah</label>
                                                                    <input type="date" id="tgl_lhr_ayah"
                                                                        name="tgl_lhr_ayah"
                                                                        value="{{ $item->ortu->tgl_lhr_ayah ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="tmpt_lhr_ayah"
                                                                        class="block text-lg font-semibold text-left mb-2">Tempat
                                                                        Lahir Ayah</label>
                                                                    <input type="text" id="tmpt_lhr_ayah"
                                                                        name="tmpt_lhr_ayah"
                                                                        value="{{ $item->ortu->tmpt_lhr_ayah ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="almt_ayah"
                                                                        class="block text-lg font-semibold text-left mb-2">Alamat
                                                                        Ayah</label>
                                                                    <input type="text" id="almt_ayah"
                                                                        name="almt_ayah"
                                                                        value="{{ $item->ortu->almt_ayah ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="pekerjaan_ayah"
                                                                        class="block text-lg font-semibold text-left mb-2">Pekerjaan
                                                                        Ayah</label>
                                                                    <input type="text" id="pekerjaan_ayah"
                                                                        name="pekerjaan_ayah"
                                                                        value="{{ $item->ortu->pekerjaan_ayah ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="nmr_ayah_wa"
                                                                        class="block text-lg font-semibold text-left mb-2">Nomor
                                                                        WA Ayah</label>
                                                                    <input type="text" id="nmr_ayah_wa"
                                                                        name="nmr_ayah_wa"
                                                                        value="{{ $item->ortu->nmr_ayah_wa ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>

                                                                <!-- Data Ibu -->
                                                                <div class="mb-4">
                                                                    <label for="nm_ibu"
                                                                        class="block text-lg font-semibold text-left mb-2">Nama
                                                                        Ibu</label>
                                                                    <input type="text" id="nm_ibu"
                                                                        name="nm_ibu"
                                                                        value="{{ $item->ortu->nm_ibu ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="nik_ibu"
                                                                        class="block text-lg font-semibold text-left mb-2">NIK
                                                                        Ibu</label>
                                                                    <input type="text" id="nik_ibu"
                                                                        name="nik_ibu"
                                                                        value="{{ $item->ortu->nik_ibu ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="tgl_lhr_ibu"
                                                                        class="block text-lg font-semibold text-left mb-2">Tanggal
                                                                        Lahir Ibu</label>
                                                                    <input type="date" id="tgl_lhr_ibu"
                                                                        name="tgl_lhr_ibu"
                                                                        value="{{ $item->ortu->tgl_lhr_ibu ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="tmpt_lhr_ibu"
                                                                        class="block text-lg font-semibold text-left mb-2">Tempat
                                                                        Lahir Ibu</label>
                                                                    <input type="text" id="tmpt_lhr_ibu"
                                                                        name="tmpt_lhr_ibu"
                                                                        value="{{ $item->ortu->tmpt_lhr_ibu ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="almt_ibu"
                                                                        class="block text-lg font-semibold text-left mb-2">Alamat
                                                                        Ibu</label>
                                                                    <input type="text" id="almt_ibu"
                                                                        name="almt_ibu"
                                                                        value="{{ $item->ortu->almt_ibu ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="pekerjaan_ibu"
                                                                        class="block text-lg font-semibold text-left mb-2">Pekerjaan
                                                                        Ibu</label>
                                                                    <input type="text" id="pekerjaan_ibu"
                                                                        name="pekerjaan_ibu"
                                                                        value="{{ $item->ortu->pekerjaan_ibu ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="nmr_ibu_wa"
                                                                        class="block text-lg font-semibold text-left mb-2">Nomor
                                                                        WA Ibu</label>
                                                                    <input type="text" id="nmr_ibu_wa"
                                                                        name="nmr_ibu_wa"
                                                                        value="{{ $item->ortu->nmr_ibu_wa ?? '' }}"
                                                                        class="w-full border px-3 py-2 rounded">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" @click="isEditModalOpen = false"
                                                            class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center bg-red-600 text-white rounded-full text-xl font-bold hover:bg-red-700">X</button>
                                                        <div class="flex justify-between mt-6">
                                                            <!-- Tombol Cancel -->
                                                            <button type="button" @click="isEditModalOpen = false"
                                                                class="bg-red-500 text-white px-4 py-2 rounded w-full sm:w-auto text-center hover:bg-red-700">
                                                                Cancel
                                                            </button>
                                                            <!-- Tombol Update -->
                                                            <button type="submit"
                                                                class="bg-blue-500 text-white px-4 py-2 rounded w-full sm:w-auto text-center hover:bg-blue-700">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Tambahan field -->
                                            <button type="submit"
                                                class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center px-4 py-2">Tidak ada data siswa</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $all_data->links() }}
        </div>
    </div>
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "{{ Session::get('success') }}",
                icon: "success"
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: "{{ Session::get('error') }}",
                icon: "error"
            });
        </script>
    @endif
</x-layoute>
