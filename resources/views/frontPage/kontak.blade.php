<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

    <div class="contact-header bg-gradient-to-r from-orange to-reds text-white text-center py-6 text-2xl font-bold">
        CONTACT
    </div>

    <div class="contact-cards-container bg-white rounded-lg shadow mx-6 my-10 p-6 h-3/6 flex items-center justify-center">
        <div class="contact-cards flex justify-center gap-20 flex-wrap">
        
            <div class="contact-card text-center border border-gray-300 rounded-lg shadow-md p-6 w-60 bg-white">
                <img src="https://storage.googleapis.com/a1aa/image/dvxiOBjl5wrFCZ0v12Mqgne7SM4u6tIYSAp7M8MJG6H8wl4JA.jpg" alt="Foto 1" class="rounded-full w-28 h-28 mx-auto">
                <div class="name  mt-4">
                    <p class="font-bold text-lg">Ust. Jalal</p>
                    <p>Admin XYZ</p>
                </div>
                <a href="https://wa.me/6289656488667?text=Assalamualaikum" target="_blank" class="contact-btn bg-reds text-white px-4 py-2 rounded hover:bg-green-700 mt-4 inline-block">Contact</a>
            </div>

            <div class="contact-card text-center border border-gray-300 rounded-lg shadow-md p-6 w-60 bg-white">
                <img src="https://storage.googleapis.com/a1aa/image/dvxiOBjl5wrFCZ0v12Mqgne7SM4u6tIYSAp7M8MJG6H8wl4JA.jpg" alt="Foto 2" class="rounded-full w-28 h-28 mx-auto">
                <div class="name text-lg mt-4">
                    <p class="font-bold text-lg">Ust. Izza</p>
                    <p>Admin XYZ</p>
                </div>
                <a href="https://wa.me/6289656488667?text=Assalamualaikum%2C%20Halo%20Bapak%2FIbu.%20Saya%20ingin%20bertanya%20tentang%20pendaftaran%20sekolah" target="_blank" class="contact-btn bg-gradient-to-r from-orange to-reds text-white px-4 py-2 rounded hover:bg-green-700 mt-4 inline-block">Contact</a>
            </div>

            <div class="contact-card text-center border border-gray-300 rounded-lg shadow-md p-6 w-60 bg-white">
                <img src="https://storage.googleapis.com/a1aa/image/dvxiOBjl5wrFCZ0v12Mqgne7SM4u6tIYSAp7M8MJG6H8wl4JA.jpg" alt="Foto 3" class="rounded-full w-28 h-28 mx-auto">
                <div class="name font-bold text-lg mt-4">
                    <p class="font-bold text-lg">Ust. Qusyairi</p>
                    <p>Admin XYZ</p>
                </div>
                <a href="https://wa.me/6289656488667?text=Assalamualaikum%2C%20Halo%20Bapak%2FIbu.%20Saya%20ingin%20bertanya%20tentang%20pendaftaran%20sekolah" target="_blank" class="contact-btn bg-gradient-to-r from-orange to-reds text-white px-4 py-2 rounded hover:bg-green-700 mt-4 inline-block">Contact</a>
            </div>
        </div>
    </div>

    <div class="contact-info flex gap-3 p-3 bg-white rounded-lg shadow mx-6 my-10 h-5/6">
        <div class="info bg-gradient-to-r from-orange to-reds text-white p-6 rounded-lg w-1/3">
            <h2 class="font-bold text-xl mb-6">Contact Information</h2>
            <p class="mb-4"><i class="fas fa-phone"></i> 085781000933 ( Jalal )</p>
            <p class="mb-4"><i class="fas fa-phone"></i> 089656488667 ( Izza )</p>
            <p class="mb-4"><i class="fas fa-phone"></i> 087754441485 ( Qusyairi )</p>
            <p class="mb-4"><i class="fas fa-envelope"></i> psb.yppnuha20@gmail.com</p>
            <p class="mb-4"><i class="fas fa-map-marker-alt"></i> Jalan Sencaki No. 64, Simolawang, Simokerto, Surabaya</p>
            <div class="social-icons flex gap-5 mt-64">
                <a href="#" class="text-white text-2xl"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white text-2xl"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white text-2xl"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="text-white text-2xl"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="image w-2/3">
            <img src="https://github.com/0xcu8e5p4c3/Contact-Page/blob/master/img/Pondok%20Nurul%20huda.jpg?raw=true" alt="Image of the building" class="rounded-lg w-full h-full object-cover">
        </div>
    </div>


<div class="contact-form-map  bg-white rounded-lg shadow mx-6 my-10">
 
        <div class="map w-full h-96">
            <div id="map" class="rounded-lg w-full h-full"></div>
        </div>
 </div>

    <script>

        const map = L.map('map').setView([-7.24917, 112.75083], 15); // Koordinat Surabaya, Indonesia

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        const marker = L.marker([-7.24917, 112.75083]).addTo(map);

        marker.bindPopup("<b>Pondok Nurul Huda</b><br>Jalan Sencaki No. 64, Simolawang, Simokerto, Surabaya").openPopup();
    </script>


        </div>
    </div>
      
</x-layout>

