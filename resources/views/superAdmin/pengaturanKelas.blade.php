<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-9 py-5 flex justify-between items-center mb-4">
        <h1 class="font-bold text-xl mr-2">Pengaturan Kelas</h1>


    </div>




    <div class=" mx-8 p-4">
        <div class="text-right m-4">
            <div x-data="{ isModalOpen: false }">
                <!-- Tombol untuk membuka modal -->

                <button @click="isModalOpen = true"
                    class="bg-[oklch(62.7%_0.194_149.214)] text-white p-2  rounded-md"><span>Tambah
                        Akun</span></button>


                <!-- Modal -->
                <div x-show="isModalOpen"
                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                    style="display: none;">
                    <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                        <!-- Tombol untuk menutup modal -->
                        <button @click="isModalOpen = false"
                            class="absolute top-2 right-2 text-4xl text-gray-600 hover:text-gray-900">
                            &times;
                        </button>

                        <!-- Konten Modal -->
                        <!-- pemakaian include atau component sama saja dan yang wajib diteruskan adalah datanya -->
                        <!-- Yand dirender menggunakan fungsi dari showData -->
                        <form action="{{ route('admin.tambah-kelas') }}" method="POST">
                            @csrf
                            <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
                                <h1 class="font-bold text-xl mb-4">Tambahkan Akun Admin</h1>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium">Jenjang</label>
                                    <select name="unt_pendidikan"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <option disabled placeholder="Masukkan Unit Pendidikan">Pilih</option>
                                        <option value="tk">TK</option>
                                        <option value="sd">SD</option>
                                        <option value="smp">SMP</option>
                                        <option value="sma">SMA</option>
                                        <option value="tpq">TPQ</option>
                                        <option value="madin">MADIN</option>
                                        <option value="pondok">PONDOK</option>
                                    </select>

                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium">Kelas</label>
                                    <select name="kelas"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <option value="-" placeholder="Masukkan Kelas">-</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-medium">Ruang</label>
                                    <select name="kls_identitas"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <option value="-" placeholder="Masukkan Ruang">-</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-medium">Nama Admin</label>
                                    <select name="id_contact"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <option disabled selected>Nama</option>
                                        @foreach ($opsi as $data)
                                            <option value="{{ $data->id_contact }}"> {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                        class=" text-white px-4 py-2  bg-[oklch(62.7%_0.194_149.214)] rounded-lg">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <table class="min-w-full divide-y divide-gray-200 " id="dataTable">
            <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white border-b-2 rounded-md">
                <tr class="rounded-md">
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenjang</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Ruang</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Admin</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 rounded-md" id="tableBody">
                @if ($all_data->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center py-4 text-gray-500">
                            Data tidak ditemukan
                        </td>
                    </tr>
                @else
                    @foreach ($all_data as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->unt_pendidikan }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->kelas }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->kls_identitas }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->kls_status }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->nama }}</td>
                            <td class="border px-4 py-2 text-center align-middle">
                                <form action="{{ route('admin.hapus-kelas', $item->id_kelas) }}" method="POST"
                                    class="flex justify-center">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex items-center justify-center space-x-2">
                                        <i class="fas fa-trash"></i>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <!-- Pagination Controls -->
        <div class="my-4">
            {{ $all_data->links() }}
        </div>
    </div>
</x-layoute>
