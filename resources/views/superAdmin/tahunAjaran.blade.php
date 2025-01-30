<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="px-9 py-5 flex justify-between items-center mb-4">
        <h1 class="font-bold text-xl mr-2">Pengaturan Tahun Ajaran</h1>
    </div>
    <div class="flex bg-gray-100 p-8 rounded-lg ml-8 items-center  w-2/4">
        <div class="flex-1">
            <div>
                <label for="" class="font-bold text-lg">Awal Ajaran Baru</label>
            </div>
            <div>
                <label for="">{{ $alldata->awal }}</label>
            </div>
        </div>
        <div class="flex-1">
            <div>
                <label for="" class="font-bold text-lg">Akhir Ajaran Baru</label>
            </div>
            <div>
                <label for="">{{ $alldata->akhir }}</label>
            </div>
        </div>
        <div>
            <div class="flex-1">
                <div x-data="{ isModalOpen: false }">
                    <!-- Tombol untuk membuka modal -->
                    <button @click="isModalOpen = true" class="bg-primary py-2 px-4 text-white rounded-lg">
                        <i class="fas fa-edit "></i>
                        <span>Edit</span>
                    </button>

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
                            <form action="{{ route('tahun-update', $alldata->id_tahun) }}" method="POST">
                                @csrf
                                <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
                                    <h1 class="font-bold text-xl mb-4">Edit Tahun Ajaran</h1>

                                    <div class="mb-4">
                                        <label for="jmlh_byr" class="block text-gray-700 font-medium">Awal Ajaran Tahun
                                            Baru</label>
                                        <input type="date" id="awal" name="awal" value="{{ $alldata->awal }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    <div class="mb-4">
                                        <label for="jmlh_byr" class="block text-gray-700 font-medium">Akhir Ajaran Tahun
                                            Baru</label>
                                        <input type="date" id="akhir" name="akhir"
                                            value="{{ $alldata->akhir }}"
                                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    </div>
                                    @if (session('success'))
                                        <script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Data Berhasil Diganti !!!',
                                                text: "{{ session('success') }}",
                                            });
                                        </script>
                                    @elseif(session('error'))
                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Terjadi Kesalahan Penggantian Data !!!',
                                                text: "{{ session('error') }}",
                                            });
                                        </script>
                                    @endif
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="bg-blue-500 text-white px-4 py-2  bg-primary rounded-lg">
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layoute>
