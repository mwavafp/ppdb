<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <title>Pengumuman Hasil Seleksi</title>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col lg:flex-row">
        <!-- Sidebar Filter (Desktop Only) -->
        <aside class="hidden lg:block w-80 bg-white shadow-md p-6">
            <h2 class="text-lg font-bold mb-4">Filters</h2>
            <div class="space-y-3">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="rounded text-blue-600" checked>
                    <span>Free</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" class="rounded text-blue-600">
                    <span>Premium</span>
                </label>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            <!-- Header with Filter Button (Mobile Only) -->
            <div class="flex items-center justify-between bg-white p-4 rounded-lg shadow-sm lg:hidden">
               <div> 
               <button id="filter-btn"
                        class="flex items-center space-x-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 
                              6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 
                              00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                    </svg>
                    <span class="text-sm font-medium">Filters</span>
                </button>
               </div>
                
                <button id="filter-category"
                        class="flex items-center space-x-2 px-4 py-2   text-black border border-gray-500 bg-transparent p-4 rounded-full hover:bg-gray-300 transition-colors">
                    
                    <span class="text-MD font-medium">NEWS</span>
                </button>
                <button id="filter-category"
                        class="flex items-center space-x-2 px-4 py-2   text-black border border-gray-500 bg-transparent p-4 rounded-full hover:bg-gray-300 transition-colors">
                    
                    <span class="text-MD font-medium">POLITIK KIDS</span>
                </button>
            </div>

            <!-- Content -->
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-6 lg:mt-0 mb-6">
                Pengumuman Hasil Seleksi
            </h1>

    <div class="space-y-6 sm:space-y-8">
        @forelse($berita as $item)
        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/3 lg:w-2/5">
                    <img src="{{ asset('storage/'.$item->gambar) }}"
                         alt="{{ $item->judul }}"
                         class="w-full h-48 sm:h-56 md:h-full object-cover">
                </div>
                <div class="md:w-2/3 lg:w-3/5 p-4 sm:p-6">
                    <div class="flex items-center mb-2 space-x-2">
                        <span class="bg-indigo-100 text-indigo-800 text-xs px-2 py-1 rounded-full font-medium">
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
                        {{ $item->abstrak }}
                    </p>
                    <a href="{{ route('berita.show', $item->id_berita) }}" 
                       class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                        Pelajari lebih lanjut
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
    <div id="overlay"
         class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>

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
        <div class="px-6 py-4 max-h-96 overflow-y-auto space-y-4">
            <label class="flex items-center space-x-2">
                <input type="checkbox" class="rounded text-blue-600" checked>
                <span>Free</span>
            </label>
            <label class="flex items-center space-x-2">
                <input type="checkbox" class="rounded text-blue-600">
                <span>Premium</span>
            </label>
        </div>
        <div class="px-6 py-4 border-t bg-gray-50 rounded-t-3xl">
            <button id="apply-filters"
                    class="w-full bg-gray-900 text-white py-3 rounded-xl font-semibold hover:bg-gray-800">
                Apply
            </button>
        </div>
    </div>

    <script>
        const filterBtn = document.getElementById('filter-btn');
        const overlay = document.getElementById('overlay');
        const popup = document.getElementById('filter-popup');
        const closeBtn = document.getElementById('close-popup');
        const applyBtn = document.getElementById('apply-filters');

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
        applyBtn?.addEventListener('click', () => {
            closePopupFunc();
            alert('Filters applied!');
        });
    </script>
</x-layout>
