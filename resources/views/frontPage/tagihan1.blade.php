<x-layout>
    <x-slot:title>Tagihan Biaya</x-slot:title>

    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        <!-- Card Container -->
        <div class="bg-white border-2 border-gray-200 shadow-lg rounded-lg w-full max-w-5xl">
            <!-- Header -->
            <div class="bg-green-500 text-center text-white py-3 font-bold text-xl rounded-t-lg">
                Tagihan Biaya
            </div>

            <!-- Content -->
            <div class="p-6 space-y-6">
                <!-- Grid Section -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Nomor Pembayaran -->
                    <div>
                        <p class="text-gray-600 font-semibold">Nomor Pembayaran</p>
                        <p class="text-lg font-bold text-gray-800">#123456789</p>
                    </div>
                    <!-- Deskripsi Pembayaran -->
                    <div>
                        <p class="text-gray-600 font-semibold">Deskripsi Pembayaran</p>
                        <p class="text-lg font-bold text-gray-800">Biaya Formulir PPDB</p>
                    </div>
                    <!-- Metode Pembayaran -->
                    <div>
                        <p class="text-gray-600 font-semibold">Metode Pembayaran</p>
                        <select
                            class="border border-gray-300 rounded-md w-full px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400"
                        >
                            <option value="tunai">Tunai</option>
                            <option value="non-tunai">Non-Tunai</option>
                        </select>
                    </div>
                    <!-- Jumlah Biaya -->
                    <div>
                        <p class="text-gray-600 font-semibold">Jumlah Biaya</p>
                        <p class="text-lg font-bold text-gray-800">Rp. 250.000</p>
                    </div>
                    <!-- Biaya Tambahan -->
                    <div>
                        <p class="text-gray-600 font-semibold">Biaya Tambahan</p>
                        <p class="text-lg font-bold text-gray-800">Rp. 0</p>
                    </div>
                    <!-- Total Pembayaran -->
                    <div>
                        <p class="text-gray-600 font-semibold">Total Pembayaran</p>
                        <p class="text-2xl font-bold text-gray-800">Rp. 250.000</p>
                    </div>
                </div>

                <!-- Status Pembayaran -->
                <div class="border-t pt-4 flex justify-between items-center">
                    <div>
                        <p class="text-gray-600 font-semibold mb-1">Status Pembayaran</p>
                        <div class="inline-block bg-red-500 text-white px-4 py-1 rounded-md font-bold">
                            Belum Lunas
                        </div>
                    </div>
                    <!-- Tombol Menunggu Pembayaran -->
                    <div>
                        <button
                            class="bg-green-500 text-white font-bold px-6 py-2 rounded-md hover:bg-green-600 transition duration-200"
                        >
                            Menunggu Pembayaran
                        </button>
                    </div>
                </div>
            </div>

            <!-- Footer Panduan -->
            <div class="bg-gray-100 px-6 py-3 flex items-center gap-2 border-t">
                <div class="text-yellow-500">
                    <!-- Ikon Panduan -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM8 6a1 1 0 000 2h4a1 1 0 100-2H8zm-1 5a1 1 0 011-1h4a1 1 0 010 2H8a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                </div>
                <a href="#" class="text-blue-600 font-semibold underline hover:text-blue-800 transition">
                    Buku Panduan Pembayaran
                </a>
            </div>
        </div>
    </div>
</x-layout>
