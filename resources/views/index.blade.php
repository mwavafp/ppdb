<x-layoute>
    <x-slot:title>{{ "tes" }}</x-slot:title>

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
        <span class="bg-gray-200 text-black py-2 px-4 rounded-full">Admin</span>
    </div>

    <form method="GET" action="{{ route('index') }}">
        <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                <!-- Filter Gender -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gender</label>
                    <select name="gender"
                        class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                        <option value="">Semua</option>
                        <option value="laki-laki" {{ request('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ request('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <!-- Filter Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status"
                        class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                        <option value="">Semua</option>
                        <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak_aktif" {{ request('status') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
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

    <div class="bg-white p-4 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Alamat</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Gender</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Ayah</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Ibu</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($all_data as $index => $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->name }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->alamat }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->gender }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->ortu->nm_ayah ?? '-' }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->ortu->nm_ibu ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center px-4 py-2">Tidak ada data siswa</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $all_data->links() }}
        </div>
    </div>
</x-layoute>
