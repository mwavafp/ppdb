<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <header class="bg-white border-b shadow-sm py-5 mb-10">
        <div class="container mx-auto px-4 flex flex-col">
            <h1 class="text-2xl font-bold text-gray-800">Pengaturan CP</h1>
            <p class="text-sm text-gray-500 mt-1">Mengatur CP</p>
        </div>
    </header>




    <div class="bg-gray-100 mx-8 p-4 rounded-lg shadow">
        <div class="text-right m-4">
            <div x-data="{ isModalOpen: false }">
                <!-- Tombol untuk membuka modal -->

                {{-- <button @click="isModalOpen = true"
                    class="bg-[oklch(62.7%_0.194_149.214)] text-white p-2 rounded-md"><span>Tambah
                        Akun</span></button> --}}


                <!-- Modal -->
                <div x-show="isModalOpen"
                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                    style="display: none;">
                    <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                        <!-- Tombol untuk menutup modal -->
                        <button @click="isModalOpen = false"
                            class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">
                            &times;
                        </button>

                        <!-- Konten Modal -->
                        <!-- pemakaian include atau component sama saja dan yang wajib diteruskan adalah datanya -->
                        <!-- Yand dirender menggunakan fungsi dari showData -->
                        <form action="{{ route('admin.tambah-admin') }}" method="POST">
                            @csrf
                            <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
                                <h1 class="font-bold text-xl mb-4">Tambahkan Akun Admin</h1>
                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-medium">Nama Admin</label>
                                    <input type="text" name="nama" placeholder="Masukkan Nama Admin"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium">NIP</label>
                                    <input type="text" name="cp" placeholder="Masukkan NIP"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
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
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Admin
                        WhatsApp </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nomor WhatsApp
                    </th>

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
                            <td class="border px-4 py-2 text-center">{{ $item->nama }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->cp }}</td>

                            <td class="border px-4 py-2 text-center">
                                <form action="{{ route('admin.hapus-admin', $item->id_contact) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-blue-500 text-center text-white mx-4 my-2 px-4 py-2 rounded hover:bg-blue-600 ">
                                        <i class="fas fa-trash mr-2 "></i>
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

    </div>
</x-layoute>
