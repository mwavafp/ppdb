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
            @foreach ($contactPersons as $contact)
                <div class="text-center border border-gray-300 rounded-lg shadow-md p-6 w-60 bg-white">
                    @if ($contact->photo)
                        <img src="{{ $contact->photo_base64 }}" alt="{{ $contact->name }}" class="rounded-full w-28 h-28 mx-auto object-cover">
                    @else
                        <div class="rounded-full w-28 h-28 mx-auto bg-gray-200 flex items-center justify-center text-gray-500 text-4xl">
                            {{ substr($contact->name, 0, 1) }}
                        </div>
                    @endif
                    <div class="mt-4">
                        <p class="font-bold text-lg">{{ $contact->name }}</p>
                        <p>{{ $contact->description }}</p>
                    </div>
                    <a href="{{ $contact->whatsapp_url }}" target="_blank"
                        class="bg-[oklch(62.7%_0.194_149.214)] text-white hover:scale-110 px-4 py-2 rounded mt-4 inline-block transition-transform">
                        Contact
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-6 bg-white rounded-lg shadow mx-4 md:mx-10 p-6 mb-10">
        <div
            class="flex flex-col justify-between bg-[oklch(62.7%_0.194_149.214)] text-white p-6 rounded-lg w-full lg:w-1/3">
            <div>
                <h2 class="font-bold text-xl mb-6">Contact Information</h2>
                @foreach ($contactPersons as $contact)
                    <p class="mb-4"><i class="fas fa-phone"></i> {{ $contact->phone }} ({{ $contact->name }})</p>
                @endforeach
                <p class="mb-4"><i class="fas fa-envelope"></i> {{ $settings->email ?? 'psb.yppnuha20@gmail.com' }}</p>
                <p class="mb-4"><i class="fas fa-map-marker-alt"></i> {{ $settings->address ?? 'Jalan Sencaki No. 64, Simolawang, Simokerto, Surabaya' }}</p>
            </div>

            <div class="bg-white p-3 rounded-lg shadow mt-6">
                <div id="map" class="rounded-lg w-full h-52"></div>
            </div>

        <div class="flex gap-5 mt-6">
            <a href="{{ $settings->facebook_url ?? 'https://facebook.com/' }}" class="hover:scale-110 text-white text-2xl" target="_blank">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="{{ $settings->instagram_url ?? 'https://instagram.com/' }}" class="hover:scale-110 text-white text-2xl" target="_blank">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="{{ $settings->whatsapp_url ?? 'https://wa.me/' }}" class="hover:scale-110 text-white text-2xl" target="_blank">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="{{ $settings->youtube_url ?? 'https://youtube.com/' }}" class="hover:scale-110 text-white text-2xl" target="_blank">
                <i class="fab fa-youtube"></i>
            </a>
        </div>

        </div>

        <div class="w-full lg:w-2/3">
            @if ($settings && $settings->building_image)
                <img src="{{ $settings->building_image_base64 }}" alt="Image of the building"
                    class="rounded-lg w-full h-full max-h-[600px] object-cover">
            @else
                <div class="bg-gray-200 rounded-lg w-full h-full max-h-[600px] flex items-center justify-center text-gray-500 text-xl">
                    Building Image
                </div>
            @endif
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