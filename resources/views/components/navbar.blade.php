<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<div class="border-b-2 border-black border-solid">
    <nav class="bg-white fixed top-0 left-0 right-0 z-50 shadow">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center w-full">
               
                    <div class="shrink-0 flex items-center justify-end">
                        <img class="h-12 w-12" src="images/logo-yysn.png" alt="Logo">
                        <p class="font-medium text-lg ml-4">Yayasan Nurul Huda</p>
                    </div>

                <div class="hidden md:flex items-center pl-96">
                    <x-nav-link href="/">BERANDA</x-nav-link>
                    <div class="relative group">
                        <x-nav-link href="#" class="flex items-center">
                            INFORMASI
                            <i class="fas fa-chevron-down ml-2 text-sm"></i>
                        </x-nav-link>
                        <div
                            class="absolute hidden group-hover:block bg-white shadow-lg border rounded-lg mt-2 py-2 w-40 z-50">
                            <a href="/pondok" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">PONDOK</a>
                            <a href="/madin" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">MADIN</a>
                            <a href="/tpq" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">TPQ</a>
                            <a href="/tk" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">TK</a>
                            <a href="/sd" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">SD</a>
                            <a href="/smp" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">SMP</a>
                            <a href="/sma" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">SMA</a>
                        </div>
                    </div>

                    <x-nav-link href="/biaya">BIAYA</x-nav-link>
                    <x-nav-link href="/kontak">KONTAK</x-nav-link>
                    <x-nav-link href="/pengumuman">PENGUMUMAN</x-nav-link>
                </div>

                <div class="hidden md:block">
                    <a href="/login"
                        class="py-2 px-4 bg-orange text-white rounded-lg hover:bg-orange-600 transition">Login</a>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="menu-toggle"
                        class="text-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pb-3 pt-2 space-y-1">
                <x-nav-link href="/">BERANDA</x-nav-link>
                <div>
                    <x-nav-link href="#" class="flex items-center justify-between">
                        INFORMASI
                        <i class="fas fa-chevron-down ml-2"></i>
                    </x-nav-link>
                    <div class="pl-4 space-y-1">
                        <a href="/pondok" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">PONDOK</a>
                        <a href="/madin" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">MADIN</a>
                        <a href="/tpq" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">TPQ</a>
                        <a href="/tk" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">TK</a>
                        <a href="/sd" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">SD</a>
                        <a href="/smp" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">SMP</a>
                        <a href="/sma" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">SMA</a>
                    </div>
                </div>
                <x-nav-link href="/biaya">BIAYA</x-nav-link>
                <x-nav-link href="/kontak">KONTAK</x-nav-link>
                <x-nav-link href="/pengumuman">PENGUMUMAN</x-nav-link>
                <a href="/login"
                    class="block w-full text-center py-2 px-4 bg-orange text-white rounded-lg hover:bg-orange-600 transition">
                    Login
                </a>
            </div>
        </div>
    </nav>
</div>
