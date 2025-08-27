<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

<div class="border-b-2 border-black border-solid">
    <nav class="bg-white fixed top-0 left-0 right-0 z-50 shadow">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <img class="h-12 w-12" src="{{ asset('images/logo-yysn.png') }}" alt="Logo">
                    <a href="/">
                        <span class="font-medium text-lg ml-4">Yayasan Nurul Huda</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-3 text-sm" style="font-size: 0.875rem;">
    <x-nav-link href="/" class="inline-flex items-center justify-center px-3 py-1 whitespace-nowrap text-center">BERANDA</x-nav-link>

    <!-- Desktop Dropdown -->
    <div class="relative">
        <button onclick="toggleDropdown()"
            class="inline-flex items-center justify-center cursor-pointer hover:text-[oklch(62.7%_0.194_149.214)] hover:bg-green-200 px-3 py-1 rounded-md focus:outline-none whitespace-nowrap text-center">
            INFORMASI
            <i class="fas fa-chevron-down ml-1"></i>
        </button>
        <div id="dropdown-menu"
            class="absolute hidden bg-white text-black shadow-lg border rounded-lg mt-2 py-2 min-w-[12rem] z-50">
            <x-nav-link href="/pondok" class="block px-3 py-1 hover:bg-gray-100 whitespace-nowrap text-center">PONDOK</x-nav-link>
            <x-nav-link href="/madin" class="block px-3 py-1 hover:bg-gray-100 whitespace-nowrap text-center">MADIN & TPQ</x-nav-link>
            <x-nav-link href="/tk" class="block px-3 py-1 hover:bg-gray-100 whitespace-nowrap text-center">TK</x-nav-link>
            <x-nav-link href="/sd" class="block px-3 py-1 hover:bg-gray-100 whitespace-nowrap text-center">SD</x-nav-link>
            <x-nav-link href="/smp" class="block px-3 py-1 hover:bg-gray-100 whitespace-nowrap text-center">SMP</x-nav-link>
            <x-nav-link href="/sma" class="block px-3 py-1 hover:bg-gray-100 whitespace-nowrap text-center">SMA</x-nav-link>
        </div>
    </div>

    <x-nav-link href="/biaya-unit" class="inline-flex items-center justify-center px-3 py-1 whitespace-nowrap text-center">BIAYA</x-nav-link>
    <x-nav-link href="/kontak" class="inline-flex items-center justify-center px-3 py-1 whitespace-nowrap text-center">KONTAK</x-nav-link>
    <x-nav-link href="/berita" class="inline-flex items-center justify-center px-3 py-1 whitespace-nowrap text-center">BERITA</x-nav-link>
    <x-nav-link href="/pengumuman" class="inline-flex items-center justify-center px-3 py-1 whitespace-nowrap text-center">PENGUMUMAN</x-nav-link>

    <!-- Auth -->
    @if (Auth::check())
        <form method="POST" action="{{ route('logouts') }}">
            @csrf
            <button onclick="event.preventDefault(); this.closest('form').submit();"
                class="py-1 px-4 mt-1 bg-[oklch(62.7%_0.194_149.214)] text-white rounded-lg hover:bg-green-900 transition text-sm whitespace-nowrap inline-flex items-center justify-center">
                {{ __('Log Out') }}
            </button>
        </form>
    @else
        <a href="/login"
            class="py-1 px-4 bg-[oklch(62.7%_0.194_149.214)] text-white rounded-lg hover:bg-green-900 transition text-sm whitespace-nowrap inline-flex items-center justify-center">
            Login
        </a>
    @endif
</div>

    </nav>
</div>

<script>
    // Desktop Dropdown Toggle
    function toggleDropdown() {
        const dropdown = document.getElementById("dropdown-menu");
        dropdown.classList.toggle("hidden");
    }

    // Mobile Menu Toggle
    document.getElementById("menu-toggle").addEventListener("click", function() {
        const mobileMenu = document.getElementById("mobile-menu");
        mobileMenu.classList.toggle("hidden");
    });

    // Mobile Dropdown Toggle
    document.getElementById("mobile-dropdown-toggle").addEventListener("click", function() {
        const mobileDropdown = document.getElementById("mobile-dropdown-menu");
        mobileDropdown.classList.toggle("hidden");
    });
</script>
