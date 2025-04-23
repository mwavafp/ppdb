<x-layout-login>
    <x-slot:title>Pengaturan Informasi SMA</x-slot:title>

    <title>Pengaturan Informasi SMA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/loadingspin.css') }}">
    <script src="{{ asset('js/loadingspin.js') }}"></script>

    <body class="bg-white text-gray-900">
    <div id="loadingOverlay">
        <div class="spinner"></div>
    </div>
    <div class="container mx-auto pb-12">
            <!-- Header Section -->
            <header class="bg-green-500 border-b shadow-sm py-5 mb-10">
            <div class="container mx-auto px-4 flex flex-col items-center">
                <h1 class="text-2xl font-bold text-white">Pengaturan Website</h1>
                <p class="text-sm text-white mt-1">Informasi SMA</p>
            </div>
        </header>

            <!-- Form Section -->
            <div class="bg-white px-7 pb-7 rounded-lg shadow-lg">
                <form method="POST" action="{{ route('pengaturansma-update') }}" class="space-y-8">
                    @csrf
                    <input type="hidden" name="id_sma" value="{{ $data->id_sma }}">

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-xl font-semibold mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi">{{ $data->deskripsi }}</textarea>
                    </div>

                    <!-- Visi -->
                    <div>
                        <label for="visi" class="block text-xl font-semibold mb-2">Visi</label>
                        <textarea id="visi" name="visi">{{ $data->visi }}</textarea>
                    </div>

                    <!-- Misi -->
                    <div>
                        <label for="misi" class="block text-xl font-semibold mb-2">Misi</label>
                        <textarea id="misi" name="misi">{{ $data->misi }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <a href="{{ route('pengaturanpage') }}" class="bg-red-500 text-white py-3 px-8 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-gray-500 mr-4">
                            Batal
                        </a>
                        <button type="submit" class="bg-blue-500 text-white py-3 px-8 rounded-lg shadow-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-500">
                            Simpan Pengaturan
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </body>
</x-layout-login>