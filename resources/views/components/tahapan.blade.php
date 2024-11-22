<!-- Langkah-langkah Pendaftaran -->
        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-5">
            @foreach ([ 
                'Pengisian Biodata', 
                'Upload Berkas', 
                'Pengumuman', 
                'Daftar Ulang', 
                'Verifikasi Data' 
            ] as $step)
            <div class="bg-blue-50 p-4 rounded-lg shadow hover:bg-blue-100 ">
                <h3 class="font-semibold">{{ $loop->iteration }}. {{ $step }}</h3>
                <p class="text-sm text-gray-600">Selesai: {{ now()->toDateString() }}</p>
            </div>
            @endforeach
        </div>