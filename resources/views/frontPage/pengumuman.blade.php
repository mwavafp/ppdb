<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>

    <title>Pengumuman Hasil Seleksi</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <body class="bg-white h-[85vh]">
        <div class="bg-[oklch(62.7%_0.194_149.214)] text-white text-center py-4">
            <h1 class="text-xl font-bold">PENGUMUMAN HASIL SELEKSI ASAL SEKOLAH PENDAFTAR</h1>
        </div>
        <div class="container mx-auto px-4 py-[80px] pb-[107px] ">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 ">
                <!-- Card 1 -->
                <div class="relative border-2 border-[oklch(62.7%_0.194_149.214)] rounded-lg p-7 text-center h-40">
                    <div
                        class="absolute top-0 left-0 bg-[oklch(62.7%_0.194_149.214)] text-white px-2 py-1 rounded-br-lg">
                        <span class="text-sm">📢 Pengumuman</span>
                    </div>
                    <div class="py-4 flex flex-col items-center justify-center">
                        <h3 class="text-2xl font-bold mb-4">TK</h3>
                        <a href="{{ route('pengumumantk') }}"
                            class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded hover:bg-green-800">KLIK
                            DISINI</a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="relative border-2 border-[oklch(62.7%_0.194_149.214)] rounded-lg p-7 text-center h-40">
                    <div
                        class="absolute top-0 left-0 bg-[oklch(62.7%_0.194_149.214)] text-white px-2 py-1 rounded-br-lg">
                        <span class="text-sm">📢 Pengumuman</span>
                    </div>
                    <div class="py-4 flex flex-col items-center justify-center">
                        <h3 class="text-2xl font-bold mb-4">SD</h3>
                        <a href="{{ route('pengumumansd') }}"
                            class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded hover:bg-green-800">KLIK
                            DISINI</a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="relative border-2 border-[oklch(62.7%_0.194_149.214)] rounded-lg p-7 text-center h-40">
                    <div
                        class="absolute top-0 left-0 bg-[oklch(62.7%_0.194_149.214)] text-white px-2 py-1 rounded-br-lg">
                        <span class="text-sm">📢 Pengumuman</span>
                    </div>
                    <div class="py-4 flex flex-col items-center justify-center">
                        <h3 class="text-2xl font-bold mb-4">SMP</h3>
                        <a href="{{ route('pengumumansmp') }}"
                            class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded hover:bg-green-800">KLIK
                            DISINI</a>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="relative border-2 border-[oklch(62.7%_0.194_149.214)] rounded-lg p-7 text-center h-40">
                    <div
                        class="absolute top-0 left-0 bg-[oklch(62.7%_0.194_149.214)] text-white px-2 py-1 rounded-br-lg">
                        <span class="text-sm">📢 Pengumuman</span>
                    </div>
                    <div class="py-4 flex flex-col items-center justify-center">
                        <h3 class="text-2xl font-bold mb-4">SMA</h3>
                        <a href="{{ route('pengumumansma') }}"
                            class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded hover:bg-green-800">KLIK
                            DISINI</a>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="relative border-2 border-[oklch(62.7%_0.194_149.214)] rounded-lg p-7 text-center h-40">
                    <div
                        class="absolute top-0 left-0 bg-[oklch(62.7%_0.194_149.214)] text-white px-2 py-1 rounded-br-lg">
                        <span class="text-sm">📢 Pengumuman</span>
                    </div>
                    <div class="py-4 flex flex-col items-center justify-center">
                        <h3 class="text-2xl font-bold mb-4">TPQ</h3>
                        <a href="{{ route('pengumumantpq') }}"
                            class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded hover:bg-green-800">KLIK
                            DISINI</a>
                    </div>
                </div>
                <!-- Card 6 -->
                <div class="relative border-2 border-[oklch(62.7%_0.194_149.214)] rounded-lg p-7 text-center h-40">
                    <div
                        class="absolute top-0 left-0 bg-[oklch(62.7%_0.194_149.214)] text-white px-2 py-1 rounded-br-lg">
                        <span class="text-sm">📢 Pengumuman</span>
                    </div>
                    <div class="py-4 flex flex-col items-center justify-center">
                        <h3 class="text-2xl font-bold mb-4">MADIN</h3>
                        <a href="{{ route('pengumumanmadin') }}"
                            class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded hover:bg-green-800">KLIK
                            DISINI</a>
                    </div>
                </div>
                <!-- Card 7 -->
                <div class="relative border-2 border-[oklch(62.7%_0.194_149.214)] rounded-lg p-7 text-center h-40">
                    <div
                        class="absolute top-0 left-0 bg-[oklch(62.7%_0.194_149.214)] text-white px-2 py-1 rounded-br-lg">
                        <span class="text-sm">📢 Pengumuman</span>
                    </div>
                    <div class="py-4 flex flex-col items-center justify-center">
                        <h3 class="text-2xl font-bold mb-4">PONDOK</h3>
                        <a href="{{ route('pengumumanpondok') }}"
                            class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-4 rounded hover:bg-green-800">KLIK
                            DISINI</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</x-layout>
