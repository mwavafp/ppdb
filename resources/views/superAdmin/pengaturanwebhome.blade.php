<x-layout-login>
    <x-slot:title>Pengaturan Web Home</x-slot:title>

    <title>Pengaturan Web Home</title>
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
                <p class="text-sm text-white mt-1">Homepage</p>
            </div>
        </header>

            <!-- Form Section -->
            <div class="bg-white px-7 pb-7 rounded-lg shadow-lg">
                <form method="POST" action="{{ route('pengaturanhome-update') }}" class="space-y-8">
                    @csrf
                    <input type="hidden" name="id_yayasan" value="{{ $data->id_yayasan }}">

                    <!-- Deskripsi -->
                    <div>
                        <label for="deskripsi" class="block text-xl font-semibold mb-2">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi">{{ $data->deskripsi }}</textarea>
                    </div>

                    <!-- Keunggulan -->
                    <div>
                        <label for="keunggulan" class="block text-xl font-semibold mb-2">Keunggulan</label>
                        <textarea id="keunggulan" name="keunggulan">{{ $data->keunggulan }}</textarea>
                    </div>

                    <!-- Visi Misi -->
                    <div>
                        <label for="visi_misi" class="block text-xl font-semibold mb-2">Visi dan Misi</label>
                        <textarea id="visi_misi" name="visi_misi">{{ $data->visi_misi }}</textarea>
                    </div>

                    <!-- Alasan Memilih 1-6 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @for ($i = 1; $i <= 6; $i++)
                            <div>
                                <label for="alasan_memilih_{{ $i }}" class="block text-xl font-semibold mb-2">Alasan Memilih {{ $i }}</label>
                                <textarea id="alasan_memilih_{{ $i }}" name="alasan_memilih_{{ $i }}">{{ $data->{'alasan_memilih_' . $i} }}</textarea>
                            </div>
                        @endfor
                    </div>

                    <!-- Alur Pendaftaran 1-5 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @for ($i = 1; $i <= 5; $i++)
                            <div>
                                <label for="alur_pendaftaran_{{ $i }}" class="block text-xl font-semibold mb-2">Alur Pendaftaran {{ $i }}</label>
                                <textarea id="alur_pendaftaran_{{ $i }}" name="alur_pendaftaran_{{ $i }}">{{ $data->{'alur_pendaftaran_' . $i} }}</textarea>
                            </div>
                        @endfor
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

        <!-- Summernote Init Script -->
        <script>
            $(document).ready(function() {
                const ids = [
                    'deskripsi', 'keunggulan', 'visi_misi',
                    'alasan_memilih_1', 'alasan_memilih_2', 'alasan_memilih_3', 'alasan_memilih_4', 'alasan_memilih_5', 'alasan_memilih_6',
                    'alur_pendaftaran_1', 'alur_pendaftaran_2', 'alur_pendaftaran_3', 'alur_pendaftaran_4', 'alur_pendaftaran_5'
                ];

                ids.forEach(id => {
                    $('#' + id).summernote({
                        placeholder: 'Tulis konten di sini...',
                        tabsize: 2,
                        height: 200
                    });
                });
            });
        </script>
    </body>
</x-layout-login>