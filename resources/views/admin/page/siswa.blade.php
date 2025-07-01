<x-layoute>
    <x-slot:title>{{ 'Data Siswa' }}</x-slot:title>

    <div class=" flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold ">DATA PENDAFTAR</h1>
        <div class="relative">
            <form method="GET" action="{{ route('siswa') }}" id="searchForm">
                <input type="text" name="search"
                    class="border border-gray-400 bg-white rounded-full py-2 px-4 pl-10 w-[500px]"
                    placeholder="Cari siswa..." value="{{ request('search') }}"
                    oninput="document.getElementById('searchForm').submit()">
                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
            </form>
        </div>

    </div>

    <form method="GET" action="{{ route('siswa') }}">
        <div class="max-w-7xl mx-auto my-8">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4 items-end">
                <!-- Filter Gender -->
                <div>
                    <label class="block text-sm font-medium">Gender</label>
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
                    <label class="block text-sm font-medium">Status</label>
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


    </form>

    <div></div>
    <!-- Tombol Import di Sebelah Kanan -->
    <div class="text-right">
        <button type="button" onclick="openModal()"
            class="bg-orange-500 text-white py-2 px-4 rounded-md w-full hover:bg-orange-600 transition">
            Import Data Pendaftar
        </button>
    </div>
    <div id="modalImport" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h2 class="text-xl font-semibold mb-4">Upload File Excel</h2>

            <form id="formImport" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="file" required
                    class="block w-full text-sm text-gray-500
            file:mr-4 file:py-2 file:px-4
            file:rounded-sm file:border-0
            file:text-sm file:font-semibold
            file:bg-[oklch(62.7%_0.194_149.214)] file:text-white
            hover:file:bg-green-400">
                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</button>
                    <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Import</button>
                </div>
            </form>

            <div id="importResult" class="mt-4 text-sm text-gray-700"></div>
        </div>
    </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success mt-4">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger mt-4">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    </form>



    <div class=" ">
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
                @forelse ($all_data as $siswa => $item)
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
                            <div x-data="{ isEditModalOpen: false, isDetailOpen: false }" class="flex justify-between space-x-2">
                                <!-- Tombol Edit -->
                                <button @click="isEditModalOpen = true"
                                    class="bg-blue-500 text-white text-md px-3 py-2 rounded hover:bg-blue-600 flex items-center">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Tombol Detail -->
                                <button @click="isDetailOpen = true"
                                    class="bg-yellow-500 text-white text-md px-3 py-2 rounded hover:bg-yellow-600 flex items-center">
                                    <i class="fas fa-info"></i>
                                </button>

                                <!-- Modal Edit -->
                                <div x-show="isEditModalOpen"
                                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                    style="display: none;">
                                    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
                                        <h2 class="font-bold text-xl mb-4">Edit Data</h2>
                                        <div x-show="isEditModalOpen"
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
                                            <button @click="isEditModalOpen = false"
                                                class="absolute top-10 right-57 text-4xl cursor-pointer text-gray-600 hover:text-gray-900">
                                                &times;
                                            </button>
                                            <form action="{{ route('siswa.update', $item->id_user) }}" method="POST">
                                                @csrf

                                                <div
                                                    class="bg-white p-6 rounded-lg shadow-lg w-full  max-h-[90vh] overflow-y-auto">

                                                    <h2 class="font-bold text-xl mb-4">Edit Data</h2>

                                                    <!-- Form Edit Siswa -->
                                                    <form action="{{ route('siswa.update', $item->id_user) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <!-- Menambahkan method PUT untuk update -->

                                                        <div class="flex ">
                                                            <!-- Kolom Kiri -->
                                                            <div class="mx-24">
                                                                <!-- Data Siswa -->
                                                                <div class="mb-4">
                                                                    <label for="name"
                                                                        class="block text-lg font-semibold text-left mb-2">Nama</label>
                                                                    <input type="text" id="name"
                                                                        name="name" value="{{ $item->name }}"
                                                                        class="w-full border px-3 py-2 rounded"
                                                                        required>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="alamat"
                                                                        class="block text-lg font-semibold text-left mb-2">Alamat</label>
                                                                    <input type="text" id="alamat"
                                                                        name="alamat" value="{{ $item->alamat }}"
                                                                        class="w-full border px-3 py-2 rounded"
                                                                        required>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label for="nisn"
                                                                        class="block text-lg font-semibold text-left mb-2">NISN</label>
                                                                    <input type="number" id="nisn"
                                                                        name="nisn"
                                                                        value="{{ old('nisn', $item->nisn ?? '') }}"
                                                                        class="w-full border px-3 py-2 rounded @error('nisn') border-red-500 @enderror"
                                                                        maxlength="10" pattern="\d{10}"
                                                                        inputmode="numeric" required
                                                                        title="NISN harus terdiri dari 10 digit angka"
                                                                        oninput="if(this.value.length > 10) this.value = this.value.slice(0, 10)">
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
                                                                    <input type="number" id="nmr_kk"
                                                                        name="nmr_kk"
                                                                        value="{{ old('nmr_kk', $item->ortu->nmr_kk ?? '') }}"
                                                                        class="w-full border px-3 py-2 rounded @error('nmr_kk') border-red-500 @enderror"
                                                                        maxlength="16" pattern="\d{16}"
                                                                        inputmode="numeric" required
                                                                        title="Nomor KK harus terdiri dari 16 digit angka"
                                                                        oninput="if(this.value.length > 16) this.value = this.value.slice(0, 16)">
                                                                </div>

                                                                <div class="mb-4">
                                                                    <label for="nik_ayah"
                                                                        class="block text-lg font-semibold text-left mb-2">NIK
                                                                        Ayah</label>
                                                                    <input type="number" id="nik_ayah"
                                                                        name="nik_ayah"
                                                                        value="{{ old('nik_ayah', $item->ortu->nik_ayah ?? '') }}"
                                                                        class="w-full border px-3 py-2 rounded @error('nik_ayah') border-red-500 @enderror"
                                                                        maxlength="16" inputmode="numeric"
                                                                        pattern="\d{16}"
                                                                        oninput="if(this.value.length > 16) this.value = this.value.slice(0, 16)">
                                                                </div>

                                                            </div>

                                                            <!-- Kolom Kanan -->
                                                            <div class="mx-24">
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
                                                                    <input type="number" id="nmr_ayah_wa"
                                                                        name="nmr_ayah_wa"
                                                                        value="{{ old('nmr_ayah_wa', $item->ortu->nmr_ayah_wa ?? '') }}"
                                                                        class="w-full border px-3 py-2 rounded @error('nmr_ayah_wa') border-red-500 @enderror"
                                                                        maxlength="15" pattern="\d{10,15}"
                                                                        inputmode="numeric" required
                                                                        title="Nomor WA Ayah harus 10-15 digit angka"
                                                                        oninput="if(this.value.length > 15) this.value = this.value.slice(0, 15)">
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
                                                                    <input type="number" id="nik_ibu"
                                                                        name="nik_ibu"
                                                                        value="{{ old('nik_ibu', $item->ortu->nik_ibu ?? '') }}"
                                                                        class="w-full border px-3 py-2 rounded @error('nik_ibu') border-red-500 @enderror"
                                                                        maxlength="16" pattern="\d{16}"
                                                                        inputmode="numeric" required
                                                                        title="NIK Ibu harus 16 digit"
                                                                        oninput="if(this.value.length > 16) this.value = this.value.slice(0, 16)">
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
                                                                    <input type="number" id="nmr_ibu_wa"
                                                                        name="nmr_ibu_wa"
                                                                        value="{{ old('nmr_ibu_wa', $item->ortu->nmr_ibu_wa ?? '') }}"
                                                                        class="w-full border px-3 py-2 rounded @error('nmr_ibu_wa') border-red-500 @enderror"
                                                                        maxlength="15" pattern="\d{10,15}"
                                                                        inputmode="numeric" required
                                                                        title="Nomor WA Ibu harus 10-15 digit angka"
                                                                        oninput="if(this.value.length > 15) this.value = this.value.slice(0, 15)">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="flex justify-end">
                                                            <button type="submit"
                                                                class="bg-blue-500 text-right items-end text-white px-4 py-2 rounded  hover:bg-blue-700">
                                                                Update
                                                            </button>
                                                        </div>
                                                        @if ($item->updated_by && $item->admin)
                                                            <div class="text-sm text-gray-600 mt-4">
                                                                Terakhir diupdate oleh <span class="font-semibold">
                                                                    {{ $item->admin->name ?? '' }}</span>
                                                                pada
                                                                <span>{{ \Carbon\Carbon::parse($item->updated_at) }}</span>
                                                            </div>
                                                        @endif
                                                    </form>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Detail -->
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

                                        <!-- Informasi Umum dengan Tampilan Rapi dan Tidak Seperti Tabel -->
                                        <div class="mb-6 text-sm text-left text-gray-700">
                                            <table class="w-1/2 border-collapse border-spacing-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="p-0 pr-2 font-semibold">Username</td>
                                                        <td class="p-0 pr-2">:</td>
                                                        <td class="p-0">{{ $item->username }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="p-0 pr-2 font-semibold">Password</td>
                                                        <td class="p-0 pr-2">:</td>
                                                        <td class="p-0 relative">
                                                            <div class="flex items-center">
                                                                <span
                                                                    id="passwordText-{{ $loop->index ?? $item->id }}"
                                                                    class="mr-2">••••••••</span>
                                                                <!-- wav password e gak isok nampil sesuai sng bener malah ngawur, tulung benakno hehe :) -->
                                                                <button type="button"
                                                                    class="text-gray-500 hover:text-gray-700 focus:outline-none transition-colors duration-200"
                                                                    onclick="togglePassword('{{ $loop->index ?? $item->id }}', '{{ $item->password2 }}')">
                                                                    <i id="eyeIcon-{{ $loop->index ?? $item->id }}"
                                                                        class="fas fa-eye text-sm"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <!-- Garis Pemisah -->
                                        <hr class="border-gray-300 mb-6">

                                        <!-- Data Detail Siswa -->
                                        <div class="space-y-6">
                                            <!-- Data Siswa -->
                                            <div>
                                                <h3
                                                    class="text-lg font-semibold text-gray-800 mb-4 border-b border-gray-200 pb-2">
                                                    Data Siswa</h3>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                                        <input type="text" value="{{ $item->name }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">NISN</label>
                                                        <input type="text" value="{{ $item->nisn }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Tempat
                                                            Lahir</label>
                                                        <input type="text" value="{{ $item->tmpt_lahir }}"
                                                            readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                                            Lahir</label>
                                                        <input type="text" value="{{ $item->tgl_lahir }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                                                        <input type="text" value="{{ $item->gender }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                                        <input type="text" value="{{ $item->alamat }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Asal
                                                            Sekolah</label>
                                                        <input type="text" value="{{ $item->asl_sekolah }}"
                                                            readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                                        <input type="text" value="{{ $item->status }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div class="md:col-span-2">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                                            KK</label>
                                                        <input type="text" value="{{ $item->ortu->nmr_kk ?? '' }}"
                                                            readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Data Ayah -->
                                            <div>
                                                <h3
                                                    class="text-lg font-semibold text-gray-800 mb-4 border-b border-gray-200 pb-2">
                                                    Data Ayah</h3>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Nama
                                                            Ayah</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->nm_ayah ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-1">NIK
                                                            Ayah</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->nik_ayah ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Tempat
                                                            Lahir Ayah</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->tmpt_lhr_ayah ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                                            Lahir Ayah</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->tgl_lhr_ayah ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan
                                                            Ayah</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->pekerjaan_ayah ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                                            WA Ayah</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->nmr_ayah_wa ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div class="md:col-span-2">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Alamat
                                                            Ayah</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->almt_ayah ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Data Ibu -->
                                            <div>
                                                <h3
                                                    class="text-lg font-semibold text-gray-800 mb-4 border-b border-gray-200 pb-2">
                                                    Data Ibu</h3>
                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Nama
                                                            Ibu</label>
                                                        <input type="text" value="{{ $item->ortu->nm_ibu ?? '' }}"
                                                            readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-700 mb-1">NIK
                                                            Ibu</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->nik_ibu ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Tempat
                                                            Lahir Ibu</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->tmpt_lhr_ibu ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                                            Lahir Ibu</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->tgl_lhr_ibu ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan
                                                            Ibu</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->pekerjaan_ibu ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div>
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                                            WA Ibu</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->nmr_ibu_wa ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                    <div class="md:col-span-2">
                                                        <label
                                                            class="block text-sm font-medium text-gray-700 mb-1">Alamat
                                                            Ibu</label>
                                                        <input type="text"
                                                            value="{{ $item->ortu->almt_ibu ?? '' }}" readonly
                                                            class="w-full px-3 py-2 border border-gray-300 rounded-md bg-gray-50 text-gray-700 cursor-not-allowed">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        function openModal() {
            document.getElementById('modalImport').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalImport').classList.add('hidden');
            $('#formImport')[0].reset();
            $('#importResult').html('');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        });

        $('#formImport').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('admin.data-siswa-import') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#importResult').html('Mengupload...');
                },
                success: function(response) {
                    $('#importResult').html('<span class="text-green-600">' + response.message +
                        '</span>');
                    setTimeout(() => location.reload(), 1500);
                },
                error: function(xhr) {
                    let errMsg = 'Gagal import';
                    if (xhr.status === 422 && xhr.responseJSON?.errors) {
                        const errors = xhr.responseJSON.errors;
                        errMsg = Object.values(errors).flat().join('<br>');
                    } else if (xhr.responseJSON?.message) {
                        errMsg = xhr.responseJSON.message;
                    }
                    $('#importResult').html(`<span class="text-red-600">${errMsg}</span>`);
                }
            });
        });

        function togglePassword(itemId, actualPassword) {
            const passwordText = document.getElementById(`passwordText-${itemId}`);
            const eyeIcon = document.getElementById(`eyeIcon-${itemId}`);

            if (passwordText.textContent === '••••••••') {
                // Tampilkan password
                passwordText.textContent = actualPassword;
                eyeIcon.className = 'fas fa-eye-slash text-sm';
            } else {
                // Sembunyikan password
                passwordText.textContent = '••••••••';
                eyeIcon.className = 'fas fa-eye text-sm';
            }
        }
    </script>


</x-layoute>
