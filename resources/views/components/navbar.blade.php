

<div class="border-b-2  border-black border-solid">
<nav class="bg-white fixed top-0 left-0 right-0 z-50 shadow">
    <div class="mx-auto  px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between w-full">
       
          <div class="shrink-0 flex items-center">
          
            <img class="h-12 w-12" src='images/logo-yysn.png' alt="Your Company">
            <p class="font-medium text-lg ml-12">Yayasan Nurul Huda</p>
          </div>
          <div class="flex items-center justify-end ">
            <div class="hidden md:block ">
              <div class="  space-x-4 ">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <x-nav-link href="/" >BERANDA</x-nav-link>
                <x-nav-link href="/informasi">INFORMASI</x-nav-link>
                <x-nav-link href="/biaya">BIAYA</x-nav-link>
                <x-nav-link href="/kontak">KONTAK</x-nav-link>
                <x-nav-link href="/pengumuman">PENGUMUMAN</x-nav-link>
              </div>
            </div>
            @if(Auth::check())
            <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="bg-orange text-white p-2 rounded">
                                {{ __('Log Out') }}
                                
                            </button>
                        </form>
            @else
            <div class="py-2 px-4 bg-orange text-white rounded-lg  ml-12" >
              <a href="/login"><span>Login</span></a>
            </div>
            @endif
          </div>
          
     
       
        
       
      
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
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
