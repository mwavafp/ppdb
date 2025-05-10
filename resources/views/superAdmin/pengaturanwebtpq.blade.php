<x-layoute>
    <x-slot:title>Pengaturan Informasi TPQ</x-slot:title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

     <div class=" bg-gray-100 px-16 py-12 min-h-[100vh]">
            <!-- Header Section -->
        <header class="mb-10">
            <div class="container  flex flex-col">
                <h1 class="text-3xl font-bold">Pengaturan Website</h1>
                <p class="text-sm text-gray-500 mt-1">Halaman TPQ</p>
            </div>
        </header>

        <!-- Form Section -->
        <div class="bg-white px-7 pb-7 pt-1 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('pengaturantpq-update') }}" class="space-y-8">
                @csrf
                <input type="hidden" name="id_tpq" value="{{ $data->id_tpq }}">

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
                    <a href="{{ route('pengaturanpage') }}" class=" bg-red-500 text-white py-3 px-8 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-gray-500 mr-4">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-500 text-white py-3 px-8 rounded-lg shadow-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-500">
                        Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#deskripsi, #visi, #misi').summernote({
                placeholder: 'Tulis di sini...',
                tabsize: 2,
                height: 200
            });
        });
    </script>

</x-layoute>
