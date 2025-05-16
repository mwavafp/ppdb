<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<x-layoute>
    <x-slot:title>Pengaturan Web</x-slot:title>

    <div class=" bg-gray-100 px-16 py-12 min-h-[100vh]">
        <header class="mb-10">
            <div class="container  flex flex-col">
                <h1 class="text-3xl font-bold">Pengaturan Website</h1>
                <p class="text-sm text-gray-500 mt-1">Manajemen Konten dan Tampilan Website</p>
            </div>
        </header>

        <!-- Main Content Section -->
        <main class="container  py-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                @php
                    $cards = [
                        ['label' => 'Home', 'route' => 'pengaturanhome-edit', 'icon' => 'fas fa-home'],
                        ['label' => 'TK', 'route' => 'pengaturantk-edit', 'icon' => 'fas fa-child'],
                        ['label' => 'SD', 'route' => 'pengaturansd-edit', 'icon' => 'fas fa-school'],
                        ['label' => 'SMP', 'route' => 'pengaturansmp-edit', 'icon' => 'fas fa-user-graduate'],
                        ['label' => 'SMA', 'route' => 'pengaturansma-edit', 'icon' => 'fas fa-university'],
                        ['label' => 'TPQ', 'route' => 'pengaturantpq-edit', 'icon' => 'fas fa-book-open'],
                        ['label' => 'MADIN', 'route' => 'pengaturanmadin-edit', 'icon' => 'fas fa-mosque'],
                        ['label' => 'Pondok', 'route' => 'pengaturanpondok-edit', 'icon' => 'fas fa-kaaba'],
                        ['label' => 'Kontak', 'route' => 'contact-settings', 'icon' => 'fas fa-envelope'],
                    ];
                @endphp

                @foreach ($cards as $card)
                    <div
                        class="bg-white rounded-xl shadow hover:shadow-lg transition duration-300 p-6 flex flex-col items-center text-center">
                        <div class="text-green-600 text-4xl mb-4">
                            <i class="{{ $card['icon'] }}"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">{{ $card['label'] }}</h3>
                        <a href="{{ route($card['route']) }}"
                            class="mt-auto bg-green-600 hover:bg-green-700 text-white py-2 px-6 rounded-full transition">
                            Edit
                        </a>
                    </div>
                @endforeach

            </div>
        </main>
    </div>

    <!-- Header Section -->


</x-layoute>
