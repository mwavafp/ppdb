<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-9 py-5 flex justify-between items-center mb-4">
        <h1 class="font-bold text-xl mr-2">PEMBAGIAN KELAS</h1>
        <div class="relative">
            <form method="GET" action="{{ route('pembagiankelas.search') }}" id="searchForm">
                <input type="text" name="search" class="border border-gray-400 rounded-full py-2 px-4 pl-10 w-[500px]"
                    placeholder="Search" value="{{ request('search') }}"
                    oninput="document.getElementById('searchForm').submit()">
            </form>
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
        <span class="bg-gray-200 text-black py-2 px-4 rounded-full">Nama Atmin</span>
    </div>
    <form method="GET" action="{{ route('pembagiankelas.filter') }}">
        <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md mt-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Sekolah</label>
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
                    <label class="block text-sm font-medium">Status</label>
                    <select name="status"
                        class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none  focus:border-black sm:text-sm">
                        <option value="">Semua</option>
                        <option value="Lolos">Lolos</option>
                        <option value="Tidak Lolos">Tidak Lolos</option>
                        <option value="Belum Ditentukan">Belum Ditentukan</option>
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
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Golongan</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Unit Pendidikan</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status Calon</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                @foreach ($students as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-2 text-center">{{ $item->id_kelas }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->name }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->kelas }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->kls_identitas }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->unt_pendidikan }}</td>
                        <td class="border px-4 py-2 text-center">
                            <span class="inline-block px-3 py-1 rounded-full text-white {{ $item->kls_status == 'Lolos' ? 'bg-green-500' : ($item->kls_status == 'Tidak Lolos' ? 'bg-red-500' : 'bg-yellow-500') }}">
                                {{ $item->kls_status }}
                            </span>
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <div x-data="{ isModalOpen: false }">
                                <button @click="isModalOpen = true"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <div x-show="isModalOpen"
                                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                    style="display: none;">
                                    <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                                        <button @click="isModalOpen = false"
                                            class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">
                                            &times;
                                        </button>
                                        <form action="{{ route('pembagiankelas.update', $item->id_kelas) }}" method="POST">
                                            @csrf
                                            <h1 class="font-bold text-xl mb-4">Edit Seleksi</h1>

                                            <div class="mb-4">
                                                  <label for="name" class="block text-left text-gray-700 font-medium">Nama</label>
                                                  <label for="name" class="block text-left text-gray-700 font-medium">{{ $item->name }}</label>
                                            </div>

                                            <div class="mb-4">
                                                <label for="kelas" class="block text-left text-gray-700 font-medium">Kelas</label>
                                                <input type="number" id="kelas" name="kelas" value="{{ $item->kelas }}"
                                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            </div>

                                            <div class="mb-4">
                                                <label for="kls_identitas" class="block text-left text-gray-700 font-medium">Golongan</label>
                                                <input type="text" id="kls_identitas" name="kls_identitas"
                                                    value="{{ $item->kls_identitas }}"
                                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                            </div>

                                            <div class="mb-4">
                                                <label for="kls_status" class="block text-left text-gray-700 font-medium">Status Calon</label>
                                                <select id="kls_status" name="kls_status"
                                                    class="block w-full px-4 py-2 bg-white border-gray-300 rounded-md shadow-sm">
                                                    <option value="Lolos" {{ $item->kls_status == 'Lolos' ? 'selected' : '' }}>Lolos</option>
                                                    <option value="Tidak Lolos" {{ $item->kls_status == 'Tidak Lolos' ? 'selected' : '' }}>Tidak Lolos</option>
                                                    <option value="Belum Ditentukan" {{ $item->kls_status == 'Belum Ditentukan' ? 'selected' : '' }}>Belum Ditentukan</option>
                                                </select>
                                            </div>

                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="bg-blue-500 text-white px-4 py-2 rounded">
                                                    Simpan
                                                </button>
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

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>
</x-layoute>
