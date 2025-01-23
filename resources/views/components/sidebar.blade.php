@if (Auth::user()->role == 'admin')
    @php
        $menu = [
            (object) [
                'menu' => (object) ['icon' => 'fa-house', 'title' => 'Dashboard', 'link' => 'dashboard-admin'],
                'items' => [],
            ],
            (object) [
                'menu' => (object) ['icon' => 'fa-users', 'title' => 'Data Siswa', 'link' => 'siswa'],
                'items' => [],
            ],
            (object) [
                'menu' => (object) ['icon' => 'fa-user-check', 'title' => 'Seleksi Siswa', 'link' => 'seleksiSiswa'],
                'items' => [],
            ],

            (object) [
                'menu' => (object) [
                    'icon' => 'fa-file-invoice-dollar',
                    'title' => 'Tagihan Siswa',
                    'link' => 'tagihan-admin',
                ],
                'items' => [],
            ],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-file-invoice-dollar',
                    'title' => 'Pembagian Kelas',
                    'link' => 'pembagiankelas',
                ],
                'items' => [],
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
                'items' => [],
            ],
            (object) [
                'menu' => (object) ['icon' => 'fa-users', 'title' => 'Data User Admin', 'link' => 'data-admin'],
                'items' => [],
            ],
            (object) [
                'menu' => (object) [
                    'icon' => 'fa-user-check',
                    'title' => 'Tahun Ajaran Pengaturan',
                    'link' => 'tahun-ajaran-pengaturan',
                ],
                'items' => [],
            ],

            (object) [
                'menu' => (object) [
                    'icon' => 'fa-file-invoice-dollar',
                    'title' => 'Pengaturan Website',
                    'link' => 'pengaturan-website',
                ],
                'items' => [],
            ],
        ];
    @endphp
@endif


<div id="sidebar"
    class="fixed top-0 left-0 m-0 z-10 h-screen w-64 bg-slate-50 border-r border-gray-200 dark:bg-zinc-800 dark:border-neutral-700 transition-all duration-300">
    <!-- Tombol Collapse -->
    <button id="toggleSidebar"
        class="absolute top-4 right-[-16px] w-8 h-8 bg-violet-500 text-white rounded-full shadow-md hover:bg-violet-600 flex items-center justify-center">
        <i class="fa-solid fa-chevron-left" id="toggleIcon"></i>
    </button>

    <!-- Simplebar (Scrollbar Styling) -->
    <div data-simplebar class="h-full">
        <!-- Sidebar Menu -->
        <div class="pb-10 pt-2.5">
            <ul class="space-y-2">
                <img src="images/logo-yysn.png" alt="Logo"
                    class="w-12 h-12 object-cover rounded-full shadow-md mb-10 ml-2">
                @foreach ($menu as $m)
                    <li>
                        <a href='/{{ $m->menu->link }}'
                            class="flex items-center gap-4 py-2.5 px-4 text-sm font-medium text-gray-900 hover:text-violet-500 dark:text-gray-300 dark:hover:text-white">
                            <i class="fa-solid {{ $m->menu->icon }}"></i>
                            <span class="menu-text">{{ $m->menu->title }}</span>
                        </a>
                    </li>
                @endforeach
                <li>
                    <a
                        class="flex items-center gap-4 py-2.5 px-4 text-sm font-medium  text-gray-900 hover:text-violet-500 dark:text-gray-300 dark:hover:text-white">


                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button class="block p-3 hover:bg-gray-50/50 dark:hover:bg-zinc-700/50" type="submit">
                            <span class="menu-text text-lg bg-primary text-white px-4 py-2 rounded-md">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
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

    toggleSidebar.addEventListener("click", () => {
        sidebar.classList.toggle("w-16");
        sidebar.classList.toggle("w-64");
        mainContent.classList.toggle("ml-2");
        mainContent.classList.toggle("ml-4");

        // Ubah ikon tombol toggle
        if (sidebar.classList.contains("w-16")) {
            toggleIcon.classList.replace("fa-chevron-left", "fa-chevron-right");
        } else {
            toggleIcon.classList.replace("fa-chevron-right", "fa-chevron-left");
        }

        // Sembunyikan atau tampilkan teks menu
        menuTexts.forEach(text => {
            text.classList.toggle("hidden");
        });
    });
</script>
