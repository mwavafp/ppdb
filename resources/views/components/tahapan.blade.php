<!-- Langkah-langkah Pendaftaran -->
<div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5 mt-24 mb-8 mx-8 ">
    @foreach ([
        'Pengisian Biodata' => 'biodata',
        'Pemberkasan' => 'berkas',
        'Seleksi' => 'seleksi',
        'Biaya' => 'biaya',
        'Daftar Ulang' => 'pembayaran',
        'Verifikasi Data' => 'verifikasi-data',
    ] as $step => $urlSegment)
        <a href="{{ url($urlSegment) }}"
            class="{{ request()->is($urlSegment) ? 'bg-red-500  text-white block' : 'text-orange block  hover:text-orangehrv hover:bg-red-200 rounded-md' }}block rounded-md"
            aria-current="{{ request()->is($urlSegment) ? 'page' : '' }}">
            <div class="bg-blue-50 p-4 rounded-lg shadow-lg hover:bg-blue-100">
                <h3 class="font-semibold ">{{ $step }}</h3>
                <p class="{{ request()->is($urlSegment) ? 'text-sm text-white' : 'text-sm text-black' }} ">Selesai:
                    {{ now()->toDateString() }}</p>
            </div>
        </a>
    @endforeach
</div>
