<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
<body class="bg-gray-100 p-16">
    <div class="max-w-2xl mx-auto bg-white p-6 shadow-md">
        <div class="border-b pb-2 mb-4">
            <h2 class="text-lg font-semibold">BIODATA PESERTA DIDIK</h2>
        </div>
        <form>
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nama Lengkap</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">NIK</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tempat Lahir Siswa</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Lahir Siswa</label>
                <input type="date" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Alamat</label>
                <textarea class="w-full border border-gray-300 p-2 mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Kode Pos</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Asal Sekolah</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">NISN</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
    <label class="block text-gray-700">Unit Pendidikan</label>
    <label >{{$unitPendidikan}}</label>
</div>

            <div class="border-b pb-2 mb-4">
                <h2 class="text-lg font-semibold">IDENTITAS ORANG TUA/WALI</h2>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Nama Ayah</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Nomor KK</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">NIK Ayah</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tempat Tanggal Lahir Ayah</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Lahir Ayah</label>
                <input type="date" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Alamat Ayah</label>
                <textarea class="w-full border border-gray-300 p-2 mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Pekerjaan Ayah</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Nomor WA Ayah</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Nama Ibu</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">NIK Ibu</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tempat Tanggal Lahir Ibu</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Lahir Ibu</label>
                <input type="date" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Alamat Ibu</label>
                <textarea class="w-full border border-gray-300 p-2 mt-1"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Pekerjaan Ibu</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Nomor WA Ibu</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div>
            <div class="text-center">
                <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded">Daftar</button>
            </div>
        </form>
    </div>
</body>
</x-layout>