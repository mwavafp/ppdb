<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <header>
        <div class="container mx-auto px-4 flex flex-col">
            <h1 class="text-3xl font-bold">Data User Admin</h1>
            <p class="text-sm text-gray-500 mt-1">Manajemen dan Pengaturan Data User Admin</p>
        </div>
    </header>

    <div class="text-right m-4">
        <div x-data="{ isModalOpen: false }">
            <!-- Tombol untuk membuka modal -->
            <button @click="isModalOpen = true" class="bg-[oklch(62.7%_0.194_149.214)] text-white p-2 rounded-md">
                <span>Tambah Akun</span>
            </button>

            <div class="mx-8 p-4">
                <!-- Modal -->
                <div x-show="isModalOpen"
                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                    style="display: none;">
                    <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                        <!-- Tombol untuk menutup modal -->
                        <button @click="isModalOpen = false"
                            class="absolute top-2 right-2 text-gray-600 hover:text-gray-900">&times;</button>

                        <!-- Form tambah admin -->
                        <form action="{{ route('admin.tambah-Superadmin') }}" method="POST">
                            @csrf
                            <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
                                <h1 class="font-bold text-xl mb-4">Tambahkan Akun Admin</h1>

                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-medium">Nama Admin</label>
                                    <input type="text" name="name" placeholder="Masukkan Nama Admin"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 font-medium">NIP</label>
                                    <input type="number" name="nip" placeholder="Masukkan NIP"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 font-medium">Email Admin</label>
                                    <input type="email" name="email" id="email"
                                        placeholder="Masukkan Email Admin"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                    <p id="emailError" class="text-red-600 mt-1 hidden">Email sudah digunakan.</p>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="block text-gray-700 font-medium">Password Admin</label>
                                    <input type="text" name="password" id="password"
                                        placeholder="Masukkan Password Admin"
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>
                                @error('password')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <input type="hidden" name="password2" id="password2">

                                <input type="hidden" name="role" value="admin">

                                <div class="mb-4">
                                    <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Pilih
                                        Unit Pendidikan</label>
                                    <select name="unit" id="role" required
                                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <option value="">-- Pilih Unit Pendidikan --</option>
                                        <option value="super">SUPER</option>
                                        <option value="tpq">TPQ</option>
                                        <option value="madin">MADIN</option>
                                        <option value="pondok">PONDOK</option>
                                        <option value="tk">TK</option>
                                        <option value="sd">SD</option>
                                        <option value="smp">SMP</option>
                                        <option value="sma">SMA</option>
                                    </select>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" id="submitBtn"
                                        class="text-white px-4 py-2 bg-[oklch(62.7%_0.194_149.214)] rounded-lg">
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <table class="w-full divide-y divide-gray-200" id="dataTable">
            <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white border-b-2 rounded-md">
                <tr class="rounded-md">
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">NIP</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Password</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Unit</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Tanggal Pembuatan
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 rounded-md" id="tableBody">
                @if ($all_data->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center py-4 text-gray-500">Data tidak ditemukan</td>
                    </tr>
                @else
                    @foreach ($all_data as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->name }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->nip }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->email }}</td>
                            <td class="border px-4 py-2 text-center">{{ Crypt::decrypt($item->password2) }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->role }}</td>
                            <td class="border px-4 py-2 text-center">{{ strtoupper($item->unit) }}</td>
                            <td class="border px-4 py-2 text-center">{{ $item->created_at }}</td>
                            <td class="border px-4 py-2 text-center">
                                <form action="{{ route('admin.hapus-Superadmin', $item->id_admin) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-blue-500 text-white mx-4 my-2 px-4 py-2 rounded hover:bg-blue-600 flex items-center">
                                        <i class="fas fa-trash mr-2"></i><span>Hapus</span>
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('emailError');
        const submitBtn = document.getElementById('submitBtn');
        const passwordInput = document.getElementById('password');
        const password2Input = document.getElementById('password2');
        const form = emailInput.closest('form');

        // Sinkronkan password2 saat user mengetik password
        passwordInput.addEventListener('input', () => {
            password2Input.value = passwordInput.value;
        });

        // Validasi email unik

    });
</script>
