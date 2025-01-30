<x-layout>
    <x-slot:title>Pengaturan Web Home</x-slot:title>

    <title>Pengaturan Web Home</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <body class="bg-white text-gray-900">
        <div class="container mx-auto px-6 py-12">
            <!-- Header Section -->
            <div class="bg-primary text-white text-center py-6 mb-12 rounded-lg shadow-md">
                <h1 class="text-3xl font-semibold">Pengaturan Web Home</h1>
            </div>

            <!-- Form Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form method="POST" action="{{ route('pengaturanhome-update') }}" class="space-y-8">
                    @csrf
                    <input type="hidden" name="id_yayasan" value="{{ $data->id_yayasan }}">
                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-xl font-semibold mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter the description...">{{ $data->deskripsi }}</textarea>
                    </div>

                    <!-- Keunggulan -->
                    <div>
                        <label for="keunggulan" class="block text-xl font-semibold mb-2">Keunggulan</label>
                        <textarea id="keunggulan" name="keunggulan" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter the advantages...">{{ $data->keunggulan }}</textarea>
                    </div>

                    <!-- Visi Misi -->
                    <div>
                        <label for="visi_misi" class="block text-xl font-semibold mb-2">Visi dan Misi</label>
                        <textarea id="visi_misi" name="visi_misi" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter vision and mission...">{{ $data->visi_misi }}</textarea>
                    </div>

                    <!-- Alasan Memilih 1-6 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="alasan_memilih_1" class="block text-xl font-semibold mb-2">Alasan Memilih 1</label>
                            <textarea id="alasan_memilih_1" name="alasan_memilih_1" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Reason 1...">{{ $data->alasan_memilih_1 }}</textarea>
                        </div>
                        <div>
                            <label for="alasan_memilih_2" class="block text-xl font-semibold mb-2">Alasan Memilih 2</label>
                            <textarea id="alasan_memilih_2" name="alasan_memilih_2" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Reason 2...">{{ $data->alasan_memilih_2 }}</textarea>
                        </div>
                        <div>
                            <label for="alasan_memilih_3" class="block text-xl font-semibold mb-2">Alasan Memilih 3</label>
                            <textarea id="alasan_memilih_3" name="alasan_memilih_3" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Reason 3...">{{ $data->alasan_memilih_3 }}</textarea>
                        </div>
                        <div>
                            <label for="alasan_memilih_4" class="block text-xl font-semibold mb-2">Alasan Memilih 4</label>
                            <textarea id="alasan_memilih_4" name="alasan_memilih_4" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Reason 4...">{{ $data->alasan_memilih_4 }}</textarea>
                        </div>
                        <div>
                            <label for="alasan_memilih_5" class="block text-xl font-semibold mb-2">Alasan Memilih 5</label>
                            <textarea id="alasan_memilih_5" name="alasan_memilih_5" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Reason 5...">{{ $data->alasan_memilih_5 }}</textarea>
                        </div>
                        <div>
                            <label for="alasan_memilih_6" class="block text-xl font-semibold mb-2">Alasan Memilih 6</label>
                            <textarea id="alasan_memilih_6" name="alasan_memilih_6" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Reason 6...">{{ $data->alasan_memilih_6 }}</textarea>
                        </div>
                    </div>

                    <!-- Alur Pendaftaran 1-5 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="alur_pendaftaran_1" class="block text-xl font-semibold mb-2">Alur Pendaftaran 1</label>
                            <textarea id="alur_pendaftaran_1" name="alur_pendaftaran_1" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Step 1 of the registration process...">{{ $data->alur_pendaftaran_1 }}</textarea>
                        </div>
                        <div>
                            <label for="alur_pendaftaran_2" class="block text-xl font-semibold mb-2">Alur Pendaftaran 2</label>
                            <textarea id="alur_pendaftaran_2" name="alur_pendaftaran_2" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Step 2 of the registration process...">{{ $data->alur_pendaftaran_2 }}</textarea>
                        </div>
                        <div>
                            <label for="alur_pendaftaran_3" class="block text-xl font-semibold mb-2">Alur Pendaftaran 3</label>
                            <textarea id="alur_pendaftaran_3" name="alur_pendaftaran_3" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Step 3 of the registration process...">{{ $data->alur_pendaftaran_3 }}</textarea>
                        </div>
                        <div>
                            <label for="alur_pendaftaran_4" class="block text-xl font-semibold mb-2">Alur Pendaftaran 4</label>
                            <textarea id="alur_pendaftaran_4" name="alur_pendaftaran_4" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Step 4 of the registration process...">{{ $data->alur_pendaftaran_4 }}</textarea>
                        </div>
                        <div>
                            <label for="alur_pendaftaran_5" class="block text-xl font-semibold mb-2">Alur Pendaftaran 5</label>
                            <textarea id="alur_pendaftaran_5" name="alur_pendaftaran_5" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Step 5 of the registration process...">{{ $data->alur_pendaftaran_5 }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <a href="{{ route('pengaturanpage') }}" class="mt-8 bg-red-500 text-white py-3 px-8 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-gray-500 mr-4">
                            Batal
                        </a>
                        <button type="submit" class="mt-8 bg-primary text-white py-3 px-8 rounded-lg shadow-md hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-500">
                            Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</x-layout>
