@if (Auth::user()->role == 'admin')
    @php
        $menu = [
            (object) ['menu' => (object) ['icon' => 'fa-house', 'title' => 'Dashboard', 'link' => 'dashboard-admin']],

            (object) ['menu' => (object) ['icon' => 'fa-users', 'title' => 'Data Pendaftar', 'link' => 'Datasiswa']],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-file-invoice-dollar',
                    'title' => 'Tagihan Pendaftar',
                    'link' => 'tagihan-admin',
                ],
            ],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-user-check',
                    'title' => 'Seleksi Pendaftar',
                    'link' => 'seleksiSiswa',
                ],
            ],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-graduation-cap',
                    'title' => 'Pembagian Kelas',
                    'link' => 'pembagiankelas',
                ],
            ],
        ];
    @endphp
@else
    @php
        $menu = [
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-house',
                    'title' => 'Dashboard Super Admin',
                    'link' => 'dashboard-super-admin',
                ],
            ],
            (object) ['menu' => (object) ['icon' => 'fa-users', 'title' => 'Data User Admin', 'link' => 'data-admin']],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-user-check',
                    'title' => 'Pengaturan Tahun Ajaran',
                    'link' => 'tahun-ajaran-pengaturan',
                ],
            ],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-calendar',
                    'title' => 'Pengaturan Gelombang',
                    'link' => 'pengaturan-gelombang',
                ],
            ],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-file-invoice-dollar',
                    'title' => 'Pengaturan Biaya Daftar',
                    'link' => 'pengaturan-biaya-daftar',
                ],
            ],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-wrench',
                    'title' => 'Pengaturan Website',
                    'link' => 'pengaturan-website',
                ],
            ],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-book',
                    'title' => 'Pengaturan Berita',
                    'link' => 'pengaturan-berita',
                ],
            ],
            (object) [
                'menu' => (object) ['icon' => 'fa-address-book', 'title' => 'Pengaturan CP', 'link' => 'cp-admin'],
            ],
        ];
    @endphp
@endif

<div id="sidebar"
    class="fixed top-0 left-0 z-10 h-screen w-64 bg-slate-50 border-r border-gray-200 dark:bg-zinc-800 dark:border-neutral-700 transition-all duration-300 flex flex-col p-4">

    <!-- Tombol Collapse -->
    <button id="toggleSidebar"
        class="absolute top-4 right-[-16px] w-8 h-8 bg-violet-500 text-white rounded-full shadow-md hover:bg-violet-600 flex items-center justify-center">
        <i class="fa-solid fa-chevron-left" id="toggleIcon"></i>
    </button>

    <!-- User Info -->
    <div id="logoWrapper" class="flex items-center space-x-3 pb-4 border-b border-gray-300 dark:border-neutral-600">
        <img src="{{ asset('images/logo-yysn.png') }}" alt="Logo"
            class="w-12 h-12 object-cover rounded-full shadow-md">
        <span id="userName" class="font-semibold text-black text-sm leading-tight">
            Admin<br>{{ strtoupper(auth()->user()->name) }}
        </span>
    </div>


    <!-- Sidebar Menu -->
    <div data-simplebar class="flex-1 mt-4">
        <ul class="space-y-2">
            @foreach ($menu as $m)
                @php
                    $isActive = Request::is($m->menu->link . '*');
                @endphp
                <li>
                    <a href="/{{ $m->menu->link }}"
                        class="flex items-center gap-4 py-2.5 px-4 text-sm font-medium rounded
                            {{ $isActive ? 'text-violet-600 bg-gray-100 dark:bg-zinc-700 font-semibold' : 'text-gray-900 hover:text-violet-500 dark:text-gray-300 dark:hover:text-white' }}">
                        <i class="fa-solid {{ $m->menu->icon }}"></i>
                        <span class="menu-text">{{ $m->menu->title }}</span>
                    </a>
                </li>
                </li>
            @endforeach
            <li>
                <form method="POST"
                    action="{{ Auth::user()->role == 'admin' ? route('admin.logoutAdmin') : route('admin.logoutSuperAdmin') }}">
                    @csrf
                    <button class="block p-3 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50 w-full text-left"
                        type="submit">
                        <span
                            class="menu-text text-lg bg-[oklch(62.7%_0.194_149.214)] text-white px-4 py-2 rounded-md block text-center">
                            Logout
                        </span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>

<!-- Konten Utama -->
<div id="mainContent" class="ml-52 p-6 transition-all duration-300"></div>

<!-- Script untuk Toggle Sidebar -->
<script>
    const toggleSidebar = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");
    const toggleIcon = document.getElementById("toggleIcon");
    const menuTexts = document.querySelectorAll(".menu-text");
    const userName = document.getElementById("userName");
    const logoWrapper = document.getElementById("logoWrapper");

    toggleSidebar.addEventListener("click", () => {
        sidebar.classList.toggle("w-20");
        sidebar.classList.toggle("w-64");
        mainContent.classList.toggle("ml-4");
        mainContent.classList.toggle("ml-2");


        if (sidebar.classList.contains("w-20")) {
            toggleIcon.classList.replace("fa-chevron-left", "fa-chevron-right");
            userName.classList.add("hidden"); // sembunyikan nama admin
            logoWrapper.classList.add("justify-center");
            logoWrapper.classList.remove("items-center", "space-x-3");
        } else {
            toggleIcon.classList.replace("fa-chevron-right", "fa-chevron-left");
            userName.classList.remove("hidden"); // tampilkan nama admin
            logoWrapper.classList.remove("justify-center");
            logoWrapper.classList.add("items-center", "space-x-3");
        }

        menuTexts.forEach(text => {
            text.classList.toggle("hidden");
            const parent = text.closest("a");
            parent.classList.toggle("justify-center");
            // parent.classList.toggle("gap-4");
        });
    });
</script>
