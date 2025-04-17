<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<x-layoute>
    <x-slot:title></x-slot:title>
    <title>Pengaturan Web</title>

    <body class="bg-white text-gray-800">

        <!-- Header Section -->
        <div class="bg-[oklch(62.7%_0.194_149.214)] text-white text-center py-6 shadow-lg rounded-lg mb-12">
            <h1 class="text-3xl font-semibold">PENGATURAN WEBSITE</h1>
        </div>

        <!-- Main Content Section -->
        <div class="container mx-auto px-6 py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Card 1 -->
                <div
                    class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-2xl font-bold mb-4 text-center">Home</h3>
                    <a href="{{ route('pengaturanhome-edit') }}"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-6 rounded-full block text-center hover:bg-green-800">
                        EDIT
                    </a>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-2xl font-bold mb-4 text-center">TK</h3>
                    <a href="{{ route('pengaturantk-edit') }}"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-6 rounded-full block text-center hover:bg-green-800">
                        EDIT
                    </a>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-2xl font-bold mb-4 text-center">SD</h3>
                    <a href="{{ route('pengaturansd-edit') }}"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-6 rounded-full block text-center hover:bg-green-800">
                        EDIT
                    </a>
                </div>

                <!-- Card 4 -->
                <div
                    class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-2xl font-bold mb-4 text-center">SMP</h3>
                    <a href="{{ route('pengaturansmp-edit') }}"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-6 rounded-full block text-center hover:bg-green-800">
                        EDIT
                    </a>
                </div>

                <!-- Card 5 -->
                <div
                    class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-2xl font-bold mb-4 text-center">SMA</h3>
                    <a href="{{ route('pengaturansma-edit') }}"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-6 rounded-full block text-center hover:bg-green-800">
                        EDIT
                    </a>
                </div>

                <!-- Card 6 -->
                <div
                    class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-2xl font-bold mb-4 text-center">TPQ</h3>
                    <a href="{{ route('pengaturantpq-edit') }}"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-6 rounded-full block text-center hover:bg-green-800">
                        EDIT
                    </a>
                </div>

                <!-- Card 7 -->
                <div
                    class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-2xl font-bold mb-4 text-center">MADIN</h3>
                    <a href="{{ route('pengaturanmadin-edit') }}"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-6 rounded-full block text-center hover:bg-green-800">
                        EDIT
                    </a>
                </div>

                <!-- Card 8 -->
                <div
                    class="bg-white shadow-lg rounded-lg p-6 transform transition duration-300 hover:scale-105 hover:shadow-xl">
                    <h3 class="text-2xl font-bold mb-4 text-center">Pondok</h3>
                    <a href="{{ route('pengaturanpondok-edit') }}"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white py-2 px-6 rounded-full block text-center hover:bg-green-800">
                        EDIT
                    </a>
                </div>

            </div>
        </div>

    </body>
</x-layoute>
