<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <title>Berita Yayasan</title>
    </head>

    <body class="bg-gray-50">
        <div class="min-h-screen flex flex-col lg:flex-row">
            <!-- Sidebar Filter (Desktop Only) -->
            <aside class="hidden lg:block w-80 bg-white shadow-md p-6">
                <h2 class="text-lg font-bold mb-4">Filters</h2>
                <form method="GET" action="{{ route('berita.index') }}" class="space-y-4">
                    {{-- Filter Kategori --}}
                    <div>
                        <label class="block font-semibold mb-2">Kategori</label>
                        <select name="kategori" class="w-full border rounded px-3 py-2">
                            <option value="">Semua</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}"
                                    {{ request('kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                    {{ $kat->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filter Unit Pendidikan --}}
                    <div>
                        <label class="block font-semibold mb-2">Unit Pendidikan</label>
                        <select name="k_unit" class="w-full border rounded px-3 py-2">
                            <option value="">Semua</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id_unit }}"
                                    {{ request('k_unit') == $unit->id_unit ? 'selected' : '' }}>
                                    {{ $unit->unit }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Filter Waktu --}}
                    <div>
                        <label class="block font-semibold mb-2">Rentang Tanggal</label>
                        <div class="flex space-x-2">
                            <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}"
                                class="w-1/2 border rounded px-3 py-2">
                            <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}"
                                class="w-1/2 border rounded px-3 py-2">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                        Terapkan
                    </button>

                    <a href="{{ route('berita.index') }}"
                        class="block text-center text-sm text-green-500 hover:underline mt-2">
                        Reset Filter
                    </a>
                </form>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <!-- Header with Filter Button (Mobile Only) -->
                <div class="flex items-center justify-between bg-white p-4 rounded-lg shadow-sm lg:hidden">
                    <div>
                        <button id="filter-btn"
                            class="flex items-center space-x-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414
                              6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0
                              00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                            </svg>
                            <span class="text-sm font-medium">Filters</span>
                        </button>
                    </div>
                </div>

                <!-- Content -->
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-6 lg:mt-0 mb-6">
                    Berita Yayasan
                </h1>

                <div class="space-y-6 sm:space-y-8">
                    @forelse($berita as $item)
                        <article
                            class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <div class="flex flex-col md:flex-row">
                                <div class="md:w-1/3 lg:w-2/5">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}"
                                        class="w-full h-48 sm:h-56 md:h-full object-cover">
                                </div>
                                <div class="md:w-2/3 lg:w-3/5 p-4 sm:p-6">
                                    <div class="flex items-center mb-2 space-x-2">
                                        <span
                                            class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-medium">
                                            {{ $item->kategori->nama ?? 'Umum' }}
                                        </span>
                                        <span class="text-xs text-gray-500">
                                            {{ $item->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <h2 class="text-lg sm:text-xl font-semibold mb-3">
                                        {{ $item->judul }}
                                    </h2>
                                    <p class="text-gray-600 mb-4 text-sm sm:text-base">
                                        {{ Str::limit(strip_tags($item->isi), 100, '...') }}
                                    </p>
                                    <a href="{{ route('berita.show', $item->id_berita) }}"
                                        class="inline-flex items-center text-green-600 hover:text-green-800 font-medium">
                                        Pelajari lebih lanjut
                                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <p class="text-gray-500">Belum ada berita tersedia.</p>
                    @endforelse
                </div>
            </main>
        </div>

        <!-- Overlay (mobile only) -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

        <!-- Filter Popup (mobile only) -->
        <div id="filter-popup"
            class="fixed bottom-0 left-0 right-0 z-50 bg-white rounded-t-3xl shadow-2xl transform translate-y-full transition-transform duration-300 lg:hidden">
            <div class="flex justify-center pt-3 pb-2">
                <div class="w-10 h-1 bg-gray-300 rounded-full"></div>
            </div>
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-lg font-bold">Filters</h2>
                <button id="close-popup" class="text-gray-400 hover:text-gray-600">
                    ✕
                </button>
            </div>

            <form method="GET" action="{{ route('berita.index') }}"
                class="px-6 py-4 space-y-4 max-h-96 overflow-y-auto">
                {{-- Kategori --}}
                <div>
                    <label class="block font-semibold mb-2">Kategori</label>
                    <select name="kategori" class="w-full border rounded px-3 py-2">
                        <option value="">Semua</option>
                        @foreach ($kategori as $kat)
                            <option value="{{ $kat->id_kategori }}"
                                {{ request('kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                {{ $kat->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Unit --}}
                <div>
                    <label class="block font-semibold mb-2">Unit Pendidikan</label>
                    <select name="k_unit" class="w-full border rounded px-3 py-2">
                        <option value="">Semua</option>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id_unit }}"
                                {{ request('k_unit') == $unit->id_unit ? 'selected' : '' }}>
                                {{ $unit->unit }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Waktu --}}
                <div>
                    <label class="block font-semibold mb-2">Rentang Tanggal</label>
                    <div class="flex space-x-2">
                        <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}"
                            class="w-1/2 border rounded px-3 py-2">
                        <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}"
                            class="w-1/2 border rounded px-3 py-2">
                    </div>
                </div>

                <div class="border-t bg-gray-50 rounded-t-3xl mt-4 pt-4">
                    <button type="submit"
                        class="w-full bg-gray-900 text-white py-3 rounded-xl font-semibold hover:bg-gray-800">
                        Terapkan
                    </button>
                    <a href="{{ route('berita.index') }}"
                        class="block text-center text-sm text-green-500 hover:underline mt-2">
                        Reset Filter
                    </a>
                </div>
            </form>
        </div>

        <script>
            const filterBtn = document.getElementById('filter-btn');
            const overlay = document.getElementById('overlay');
            const popup = document.getElementById('filter-popup');
            const closeBtn = document.getElementById('close-popup');

            function openPopup() {
                overlay.classList.remove('hidden');
                popup.classList.remove('translate-y-full');
            }

            function closePopupFunc() {
                overlay.classList.add('hidden');
                popup.classList.add('translate-y-full');
            }

            filterBtn?.addEventListener('click', openPopup);
            closeBtn?.addEventListener('click', closePopupFunc);
            overlay?.addEventListener('click', closePopupFunc);
        </script>
</x-layout>
