<x-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="bg-[oklch(62.7%_0.194_149.214)] text-white text-center py-5 text-2xl font-bold">
        CONTACT
    </div>

    <div class="bg-white rounded-lg shadow mx-4 md:mx-10 my-10 p-6 flex justify-center">
        <div class="flex flex-wrap justify-center gap-6 md:gap-10">
            @php
                $contacts = [
                    ['name' => 'Ust. Jalal', 'desc' => 'Admin XYZ', 'wa' => '6289656488667?text=Assalamualaikum'],
                    [
                        'name' => 'Ust. Izza',
                        'desc' => 'Admin XYZ',
                        'wa' =>
                            '6289656488667?text=Assalamualaikum%2C%20Halo%20Bapak%2FIbu.%20Saya%20ingin%20bertanya%20tentang%20pendaftaran%20sekolah',
                    ],
                    [
                        'name' => 'Ust. Qusyairi',
                        'desc' => 'Admin XYZ',
                        'wa' =>
                            '6289656488667?text=Assalamualaikum%2C%20Halo%20Bapak%2FIbu.%20Saya%20ingin%20bertanya%20tentang%20pendaftaran%20sekolah',
                    ],
                ];
            @endphp

            @foreach ($contacts as $contact)
                <div class="text-center border border-gray-300 rounded-lg shadow-md p-6 w-60 bg-white">
                    <img src="https://storage.googleapis.com/a1aa/image/dvxiOBjl5wrFCZ0v12Mqgne7SM4u6tIYSAp7M8MJG6H8wl4JA.jpg"
                        alt="Foto" class="rounded-full w-28 h-28 mx-auto">
                    <div class="mt-4">
                        <p class="font-bold text-lg">{{ $contact['name'] }}</p>
                        <p>{{ $contact['desc'] }}</p>
                    </div>
                    <a href="https://wa.me/{{ $contact['wa'] }}" target="_blank"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white hover:scale-110 px-4 py-2 rounded mt-4 inline-block transition-transform">
                        Contact
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-6 bg-white rounded-lg shadow mx-4 md:mx-10 p-6">
        <div
            class="flex flex-col justify-between bg-[oklch(62.7%_0.194_149.214)] text-white p-6 rounded-lg w-full lg:w-1/3">
            <div>
                <h2 class="font-bold text-xl mb-6">Contact Information</h2>
                <p class="mb-4"><i class="fas fa-phone"></i> 085781000933 (Jalal)</p>
                <p class="mb-4"><i class="fas fa-phone"></i> 089656488667 (Izza)</p>
                <p class="mb-4"><i class="fas fa-phone"></i> 087754441485 (Qusyairi)</p>
                <p class="mb-4"><i class="fas fa-envelope"></i> psb.yppnuha20@gmail.com</p>
                <p class="mb-4"><i class="fas fa-map-marker-alt"></i> Jalan Sencaki No. 64, Simolawang, Simokerto,
                    Surabaya</p>
            </div>

            <div class="bg-white p-3 rounded-lg shadow mt-6">
                <div id="map" class="rounded-lg w-full h-52"></div>
                <!-- Ubah height ke h-52 biar gak terlalu tinggi -->
            </div>

            <div class="flex gap-5 mt-6">
                <a href="#" class="hover:scale-110 text-white text-2xl"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:scale-110 text-white text-2xl"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:scale-110 text-white text-2xl"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="hover:scale-110 text-white text-2xl"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="w-full lg:w-2/3">
            <img src="/images/Pondok Nurul huda.jpg" alt="Image of the building"
                class="rounded-lg w-full h-full  max-h-[600px]">
        </div>
    </div>


    <script>
        const map = L.map('map').setView([-7.24917, 112.75083], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        const marker = L.marker([-7.24917, 112.75083]).addTo(map);
        marker.bindPopup("<b>Pondok Nurul Huda</b><br>Jalan Sencaki No. 64, Simolawang, Simokerto, Surabaya").openPopup();
    </script>
</x-layout>
