<script>
        function selectTab(tab) {
            const buttons = document.querySelectorAll('.menu-btn');
            buttons.forEach(button => button.classList.remove('active'));

            if (tab) {
                document.querySelector(.menu-btn:contains(${tab})).classList.add('active');
            }
        }
    </script>
    <x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <x-tahapan></x-tahapan>>
    <div class="container mx-auto p-4">
     
    <div class="bg-orange-500 text-black text-center py-4 font-bold text-lg">
        <p>Biaya Pendidikan</p>
    </div>
    <div class="flex justify-center space-x-4 my-4">
        <button class="bg-orange text-white px-6 py-2 rounded hover:bg-orange-600 active:bg-orange-700" onclick="selectTab('TK')">TK</button>
        <button class="bg-orange text-white px-6 py-2 rounded hover:bg-orange-600 active:bg-orange-700" onclick="selectTab('SD')">SD</button>
        <button class="bg-orange text-white px-6 py-2 rounded hover:bg-orange-600 active:bg-orange-700" onclick="selectTab('SMP')">SMP</button>
        <button class="bg-orange text-white px-6 py-2 rounded hover:bg-orange-600 active:bg-orange-700" onclick="selectTab('SMA')">SMA</button>
        <button class="bg-orange text-white px-6 py-2 rounded hover:bg-orange-600 active:bg-orange-700" onclick="selectTab('Pondok')">Pondok</button>
    </div>

    <table class="min-w-full border-2-collapse border-2-4 border-black bg-white shadow-md">
        <thead class="bg-orange-500 text-black">
            <tr>
                <th class="border-2 border-black px-4 py-2">No</th>
                <th class="border-2 border-black px-4 py-2">Deskripsi</th>
                <th class="border-2 border-black px-4 py-2">Biaya</th>
            </tr>
        </thead>
        <tbody class='text-black'>
            <tr>
                <th class="border-2 border-black px-4 py-2">1</th>
                <td class="border-2 border-black px-4 py-2">Formulir</td>
                <td class="border-2 border-black px-4 py-2">Rp 100,000</td>
            </tr>
            <tr>
                <th class="border-2 border-black px-4 py-2">2</th>
                <td class="border-2 border-black px-4 py-2">Uang Pendaftaran</td>
                <td class="border-2 border-black px-4 py-2">Rp 200,000</td>
            </tr>
            <tr>
                <th class="border-2 border-black px-4 py-2">3</th>
                <td class="border-2 border-black px-4 py-2">SPP Bulanan</td>
                <td class="border-2 border-black px-4 py-2">Rp 300,000</td>
            </tr>
            <tr>
                <th class="border-2 border-black px-4 py-2">4</th>
                <td class="border-2 border-black px-4 py-2">Buku Paket</td>
                <td class="border-2 border-black px-4 py-2">Rp 150,000</td>
            </tr>
            <tr>
                <th class="border-2 border-black px-4 py-2">5</th>
                <td class="border-2 border-black px-4 py-2">Ujian Semester</td>
                <td class="border-2 border-black px-4 py-2">Rp 250,000</td>
            </tr>
            <tr>
                <th class="border-2 border-black px-4 py-2">6</th>
                <td class="border-2 border-black px-4 py-2">Seragam</td>
                <td class="border-2 border-black px-4 py-2">Rp 400,000</td>
            </tr>
            <tr>
                <th class="border-2 border-black px-4 py-2">7</th>
                <td class="border-2 border-black px-4 py-2">Asuransi</td>
                <td class="border-2 border-black px-4 py-2">Rp 50,000</td>
            </tr>
            <tr>
                <th class="border-2 border-black px-4 py-2">8</th>
                <td class="border-2 border-black px-4 py-2">Ekstrakurikuler</td>
                <td class="border-2 border-black px-4 py-2">Rp 100,000</td>
            </tr>
        </tbody>
    </table>
</div>
</x-layout>

    
