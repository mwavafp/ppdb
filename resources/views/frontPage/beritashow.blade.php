<x-layout>
    <x-slot:title>{{ $berita->judul }}</x-slot:title>

    <!-- Blog post with featured image -->
    <div class="max-w-7xl mx-auto p-12 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">

            <!-- Back Button -->
            <div class="mb-4">
                <a href="{{ route('berita.index') }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">
                    ← Kembali
                </a>
            </div>

            <!-- Blog post header -->
            <div class="py-8">
                <h1 class="text-3xl font-bold mb-2">{{ $berita->judul }}</h1>
                <p class="text-gray-500 text-sm">
                    Dipublikasikan pada 
                    <time datetime="{{ $berita->created_at->toDateString() }}">
                        {{ $berita->created_at->format('F j, Y') }}
                    </time>
                    • {{ $berita->kategori->nama ?? 'Umum' }}
                </p>
            </div>

            <!-- Featured image -->
            @if($berita->gambar)
                <img src="{{ asset('storage/'.$berita->gambar) }}" 
                     alt="{{ $berita->judul }}" 
                     class="w-full h-auto mb-8 rounded-lg shadow">
            @endif

            <!-- Blog post content -->
            <div class="prose prose-sm sm:prose lg:prose-lg xl:prose-xl mx-auto">
                {!!($berita->isi)!!}
            </div>

        </div>
    </div>
</x-layout>
