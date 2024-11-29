<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<div class="border-b-2 border-black border-solid">
    <nav class="bg-white fixed top-0 left-0 right-0 z-50 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <img class="h-12 w-12" src="{{ asset('images/logo-yysn.png') }}" alt="Logo">
                    <p class="font-medium text-lg ml-4">Yayasan Nurul Huda</p>
                </div>

                <!-- Desktop Menu and Login Button -->
                <div class="flex items-center space-x-4">
                    <!-- Menu -->
                    <div class="hidden md:flex space-x-4 items-center">
                        <x-nav-link href="/">BERANDA</x-nav-link>
                        <div class="relative group">
                            <x-nav-link href="#" class="flex items-center">
                                INFORMASI
                                <i class="fas fa-chevron-down ml-2"></i>
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

                    <!-- Auth Buttons -->
                    @if(Auth::check())
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="py-2 px-4 bg-orange text-white rounded-lg hover:bg-orange-600 transition">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                    @else
                    <a href="/login"
                        class="py-2 px-4 bg-orange text-white rounded-lg hover:bg-orange-600 transition">
                        Login
                    </a>
                    @endif
                </div>

                <!-- Mobile Menu Toggle -->
                <button id="menu-toggle"
                    class="md:hidden text-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
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
