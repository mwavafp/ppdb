<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="px-9 py-5 flex justify-between items-center mb-4">
        <h1 class="font-bold text-xl mr-2">Akun Admin Panitia</h1>


    </div>




    <div class="bg-gray-100 mx-8 p-4 rounded-lg shadow">
        <div class="text-right m-4">
            <div x-data="{ isModalOpen: false }">
                <!-- Tombol untuk membuka modal -->

                <button @click="isModalOpen = true" class="bg-primary text-white p-2 rounded-md"><span>Tambah
                        Akun</span></button>


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
                                    <input type="text" name="name" placeholder="Masukkan Nama Admin"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

                                </div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium">NIP</label>
                                    <input type="number" name="nip" placeholder="Masukkan NIP"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>

                                <div class="mb-4">
                                    <label for="status" class="block text-gray-700 font-medium">Email Admin</label>
                                    <input type="email" name="email" placeholder="Masukkan Email Admin"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">

                                </div>
                                <div class="mb-4">
                                    <label for="status" class="block text-gray-700 font-medium">Password Admin</label>
                                    <input type="text" name="password" placeholder="Masukkan Password Admin"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="mb-4">

                                    <input type="hidden" name="role" value="admin"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class=" text-white px-4 py-2  bg-primary rounded-lg">
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
            <thead class="bg-primary text-white border-b-2 rounded-md">
                <tr class="rounded-md">
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">NIP
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Password</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Tanggal Pembuatan
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
                            <td class="border px-4 py-2 text-center">{{ $item->name }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->nip }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->email }}</td>
                            <td class="border px-4 py-2 text-center">
                                {{ Crypt::decryptString($item->password) }}
                            </td>
                            <td class="border px-4 py-2 text-center">{{ $item->role }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->created_at }}</td>
                            <td class="border px-4 py-2 text-center">
                                {{-- <form action="{{ route('admin.hapus-admin', $item->id_admin) }}" method="DELETE">
                                    @csrf

                                    <button
                                        class="bg-blue-500 text-white mx-4 my-2 px-4 py-2 rounded hover:bg-blue-600 flex items-center">
                                        <i class="fas fa-trash mr-2 "></i>
                                        <span>Hapus</span>
                                    </button>
                                </form> --}}

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
        <div class="note text-white bg-primary my-8 p-4 rounded-lg shadow flex flex-wrap flex-col w-1/2">
            <p>Note:</p>
            <p>
                Password berada didalam petik "password"
            </p>
        </div>
    </div>
</x-layoute>
