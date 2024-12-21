<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<x-layoute>
    <x-slot:title>{{$title}}</x-slot:title>
    
    <div class="px-9 py-5 flex justify-between items-center mb-4">
        <h1 class="font-bold text-xl mr-2">TAGIHAN BIAYA</h1>
        <div class="relative">
        <input type="text" class="border border-gray-400 rounded-full py-2 px-4 pl-10 w-[500px]" placeholder="Search">
        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
        <span class="bg-gray-200 text-black py-2 px-4 rounded-full">Nama Atmin</span>
    </div>

    <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md mt-4">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Tahun Ajaran</label>
                <select class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                    <option>2024/2025</option>
                    <option>2025/2026</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Jenjang</label>
                <select class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                    <option>All</option>
                    <option>TK</option>
                    <option>SD</option>
                    <option>SMP</option>
                    <option>SMA</option>
                    <option>TPQ</option>
                    <option>MADIN</option>
                    <option>PONDOK</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Gelombang</label>
                <select class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none  focus:border-black sm:text-sm">
                    <option>All</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Status</label>
                <select class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none  focus:border-black sm:text-sm">
                    <option>All</option>
                    <option>Lunas</option>
                    <option>Belum Lunas</option>
                </select>
            </div>
            <div class="flex mt-4 mx-4">
                <button class="bg-green-500 text-white py-2 px-4 rounded-md mr-2 w-[100px] border border-transparent hover:bg-green-600 hover:border-green-600 transition">Cari</button>
            </div>
        </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow">
    <table class="min-w-full divide-y divide-gray-200" id="dataTable">
    <thead class="bg-gray-50 border-b-2">
        <tr>
            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenjang Pendidikan</th>
            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Tipe Pembayaran</th>
            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Tagihan</th>
            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Bayar</th>
            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jumlah Kekurangan</th>
            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
        @foreach ($all_data as $item)
        <tr class="hover:bg-gray-50 transition">
            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2 text-center">{{ $item ->name }}</td>
            <td class="border px-4 py-2 text-center">{{ $item ->unt_pendidikan }}</td>
            <td class="border px-4 py-2 text-center">{{ $item ->status }}</td>
            <td class="border px-4 py-2 text-center">100000</td>
            <td class="border px-4 py-2 text-center">{{ $item ->jmlh_byr }}</td>
            <td class="border px-4 py-2 text-center">{{ $item ->jmlh_byr>10000000?0:10000000-$item ->jmlh_byr}}</td>
            <td class="border px-4 py-2 text-center">{{ $item ->byr_dft_ulang }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
                <button class="editButton bg-yellow-500 text-white py-2 px-1 rounded-md border border-transparent hover:bg-yellow-600 hover:border-yellow-600 transition">
                    <i class="fas fa-edit mx-3"></i>
                </button>
                <button class="finishButton hidden bg-green-500 text-white py-2 px-1 rounded-md mr-2 border border-transparent hover:bg-green-600 hover:border-green-600 transition"><i class="fas fa-save mx-3"></i></button>
                <button class="cancelButton hidden bg-red-500 text-white py-2 px-1 rounded-md mr-2 border border-transparent hover:bg-red-600 hover:border-red-600 transition"><i class="fas fa-times mx-3"></i></button>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination Controls -->
<div class="mt-4">
    {{ $all_data->links() }}
</div>

</x-layoute>
<script>

   

    
    // fungsi untuk menambahkan baris secara dinamis


    document.getElementById('dataTable').addEventListener('click', function(e) {
        // Cek jika user klik button edit
        if (e.target && e.target.matches('.editButton')) {
            const row = e.target.closest('tr');
            const bayarInput = row.querySelector('.bayarInput');
            const bayarDisplay = row.querySelector('.bayarDisplay');
            const finishButton = row.querySelector('.finishButton');
            const cancelButton = row.querySelector('.cancelButton');
            const editButton = e.target;

            // Menampilkan inputan bayar dan tombol selesai , batal
            bayarDisplay.classList.add('hidden');
            bayarInput.classList.remove('hidden');
            finishButton.classList.remove('hidden');
            cancelButton.classList.remove('hidden');
            editButton.classList.add('hidden');
        }

        // Cek jika user klik button batal
        if (e.target && e.target.matches('.cancelButton')) {
        const row = e.target.closest('tr');
        const bayarInput = row.querySelector('.bayarInput');
        const bayarDisplay = row.querySelector('.bayarDisplay');
        const finishButton = row.querySelector('.finishButton');
        const cancelButton = row.querySelector('.cancelButton');
        const editButton = row.querySelector('.editButton');

        // Menyembunyikan input bayar dan tombol selesai, batal, menampilkan tombol edit
        bayarInput.classList.add('hidden');
        bayarDisplay.classList.remove('hidden');
        finishButton.classList.add('hidden');
        cancelButton.classList.add('hidden');
        editButton.classList.remove('hidden');
        }

        // Cek jika user klik button selesai
        if (e.target && e.target.matches('.finishButton')) {
            const row = e.target.closest('tr');
            const bayarInput = row.querySelector('.bayarInput');
            const bayarDisplay = row.querySelector('.bayarDisplay');
            const finishButton = row.querySelector('.finishButton');
            const cancelButton = row.querySelector('.cancelButton');
            const editButton = row.querySelector('.editButton');

            // Mengambil nilai inputan bayar dan memastikan nilai tersebut berupa angka (menghapus simbol Rp dan titik)
            const jumlahBayar = parseFloat(bayarInput.value.replace(/[^0-9.-]+/g, "")); // Memastikan format sebagai angka
            const jumlahTagihan = parseFloat(row.querySelector('.jumlahTagihan').textContent.replace('Rp ', '').replace(/\./g, ''));
            
            // Pastikan inputan valid (jumlah bayar dan jumlah tagihan harus lebih besar dari 0)
            if (isNaN(jumlahBayar) || isNaN(jumlahTagihan)) {
                alert('Input jumlah bayar atau jumlah tagihan tidak valid!');
                return;
            }

            // Menghitung jumlah kekurangan
            const jumlahKekurangan = jumlahTagihan - jumlahBayar;

            // Menampilkan hasil perhitungan
            bayarDisplay.textContent = `Rp ${new Intl.NumberFormat().format(jumlahBayar)}`;
            row.querySelector('.jumlahKekurangan').textContent = `Rp ${new Intl.NumberFormat().format(jumlahKekurangan)}`;

            // Update status berdasarkan jumlah kekurangan
            const statusElement = row.querySelector('.statusDisplay');
            if (jumlahKekurangan === 0) {
                statusElement.textContent = 'Lunas';
                statusElement.classList.remove('bg-red-600');
                statusElement.classList.add('bg-green-600');
            } else {
                statusElement.textContent = 'Belum lunas';
                statusElement.classList.remove('bg-green-600');
                statusElement.classList.add('bg-red-600');
            }

            // Menyembunyikan input bayar dan tombol selesai, batal, menampilkan tombol edit
            bayarInput.classList.add('hidden');
            bayarDisplay.classList.remove('hidden');
            finishButton.classList.add('hidden');
            cancelButton.classList.add('hidden');
            editButton.classList.remove('hidden');
        }
    });

    // Menambahkan beberapa data contoh
    const data = [
        {
            no: 1,
            nama: 'Nama Lengkap',
            jenjang: 'SMP',
            gelombang: '1',
            jumlahTagihan: 'Rp 1.500.000',
            jumlahBayar: 'Rp 0',
            jumlahKekurangan: 'Rp 1.500.000',
            status: 'Belum lunas'
        },
        {
            no: 2,
            nama: 'Nama Lengkap Saya',
            jenjang: 'SMA',
            gelombang: '2',
            jumlahTagihan: 'Rp 1.800.000',
            jumlahBayar: 'Rp 0',
            jumlahKekurangan: 'Rp 1.800.000',
            status: 'Belum lunas'
        },
        {
            no: 3,
            nama: 'Nama Siswa Lain',
            jenjang: 'SD',
            gelombang: '3',
            jumlahTagihan: 'Rp 2.000.000',
            jumlahBayar: 'Rp 1.000.000',
            jumlahKekurangan: 'Rp 1.000.000',
            status: 'Belum lunas'
        },
    ];

    displayTable(data);
</script>


