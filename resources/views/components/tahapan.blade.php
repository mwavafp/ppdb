<!-- Langkah-langkah Pendaftaran -->
        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mb-5">
                @foreach ([
                'Pengisian Biodata' => 'biodata', 
                'Pemberkasan' => 'berkas', 
                'pengumuman' => 'seleksi', 
                'Daftar Ulang' => 'pembayaran', 
                'Verifikasi Data' => 'verifikasi-data'
            ] as $step => $urlSegment)
            <a href="{{ url($urlSegment) }}" class="block">
                <div class="bg-blue-50 p-4 rounded-lg shadow hover:bg-blue-100">
                    <h3 class="font-semibold">{{ $step }}</h3>
                    <p class="text-sm text-gray-600">Selesai: {{ now()->toDateString() }}</p>
                </div>
            </a>
            @endforeach
        </div>