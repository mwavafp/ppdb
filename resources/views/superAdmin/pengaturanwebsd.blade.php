<x-layout>
    <x-slot:title>Pengaturan Informasi SD</x-slot:title>

    <title>Pengaturan Informasi SD</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <body class="bg-white text-gray-900">
        <div class="container mx-auto px-6 py-12">
            <!-- Header Section -->
            <div class="bg-primary text-white text-center py-6 mb-12 rounded-lg shadow-md">
                <h1 class="text-3xl font-semibold">Pengaturan Informasi SD</h1>
            </div>

            <!-- Form Section -->
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <form method="POST" action="{{ route('pengaturansd-update') }}" class="space-y-8">
                    @csrf
                    <input type="hidden" name="id_sd" value="{{ $data->id_sd }}">
                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-xl font-semibold mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter the description...">{{ $data->deskripsi }}</textarea>
                    </div>

                    <!-- Visi -->
                    <div>
                        <label for="visi" class="block text-xl font-semibold mb-2">Visi</label>
                        <textarea id="visi" name="visi" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter the advantages...">{{ $data->visi }}</textarea>
                    </div>

                    <!-- Misi -->
                    <div>
                        <label for="visi_misi" class="block text-xl font-semibold mb-2">Misi</label>
                        <textarea id="misi" name="misi" rows="4" class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter vision and mission...">{{ $data->misi }}</textarea>
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
