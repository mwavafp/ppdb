<!-- Langkah-langkah Pendaftaran -->
<div class="flex justify-center mt-24 mb-8 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-wrap justify-center gap-4 max-w-screen-lg w-full">
        @foreach ([
        'Pengisian Biodata' => 'biodata',
        'Pemberkasan' => 'berkas-user',
        'Pembayaran' => 'pembayaran-user',
        'Pengumuman' => 'pengumuman-user',
    ] as $step => $urlSegment)
            <a href="{{ url($urlSegment) }}"
                class="block rounded-md transition duration-200 {{ request()->is($urlSegment) ? 'bg-red-600 text-white' : 'text-orange hover:text-orangehrv hover:bg-red-200' }}"
                aria-current="{{ request()->is($urlSegment) ? 'page' : '' }}">
                <div
                    class="{{ request()->is($urlSegment) ? 'bg-red-600 text-white' : 'bg-blue-50 text-black' }} p-4 rounded-lg shadow-lg hover:bg-blue-100 text-center min-w-[140px]">
                    <h3 class="font-semibold text-base mb-1">{{ $step }}</h3>
                    <p class="text-sm">Selesai: {{ now()->toDateString() }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
