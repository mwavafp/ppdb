@php
    $menu = [
        (object) [
            'menu' => (object) ['icon' => 'fa-house', 'title' => 'Dashboard'],
            'items' => [],
        ],
        (object) [
            'menu' => (object) ['icon' => 'fa-user-check', 'title' => 'Data Siswa'],
            'items' => [],
        ],
        (object) [
            'menu' => (object) ['icon' => 'fa-users', 'title' => 'Seleksi Siswa'],
            'items' => [],
        ],
        (object) [
            'menu' => (object) ['icon' => 'fa-file-invoice-dollar', 'title' => 'Tagihan Siswa'],
            'items' => [],
        ],
    ];
@endphp
<div
    class="fixed bottom-0 z-10 h-screen ltr:border-r rtl:border-l vertical-menu rtl:right-0 ltr:left-0 top-[70px] bg-slate-50 border-gray-50 print:hidden dark:bg-zinc-800 dark:border-neutral-700">

    <div data-simplebar class="h-full">
        <!--- Sidemenu -->
        <div class="metismenu pb-10 pt-2.5" id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul id="side-menu">
                <li class="px-5 py-3 text-xs font-medium text-gray-500 cursor-default leading-[18px] group-data-[sidebar-size=sm]:hidden block"
                    data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}"
                        class="block py-2.5 px-6 text-sm font-medium text-gray-950 transition-all duration-150 ease-linear hover:text-violet-500 dark:text-gray-300 dark:active:text-white dark:hover:text-white">
                        <i class="fa-solid fa-house"></i>
                        <span data-key="t-dashboard"> &nbsp; Dashboard</span>
                    </a>
                </li>

                @foreach ($menu as $m)
                    <li>
                        <a href="javascript:void(0);"
                            class="block py-2.5 px-4 text-sm font-medium text-gray-900 hover:text-violet-500 dark:text-gray-300 dark:hover:text-white">
                            <i class="fa-solid {{ $m->menu->icon }}"></i>
                            <span class="ml-2">{{ $m->menu->title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
