<x-layout>
    <x-slot:title>Verifikasi Data Siswa</x-slot:title>
    <x-tahapan></x-tahapan>
    <div class="container mx-auto my-5 flex flex-col items-center justify-center text-center">

        <!-- Title (Centered) -->
        <h1 class="mt-4 mb-5 text-primary font-bold text-2xl">VERIFIKASI DATA SISWA</h1>

            <!-- Border Tengah -->
            <div class="border-4 mx-auto p-8" style="max-width: 800px; border: 4px solid #ccc; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            
            <!-- Card Data Siswa -->
            <div class="card border-primary shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Data Siswa</h2>
                </div>
                <div class="card-body">
                    <p><strong>Nama:</strong> </p>
                    <p><strong>NIS:</strong> </p>
                    <p><strong>Kelas:</strong> </p>
                    <p><strong>Alamat:</strong> </p>
                    <p><strong>No. HP:</strong> </p>
                </div>
            </div>

            <!-- Card Berkas -->
            <div class="card border-success shadow-sm mb-4">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0">Berkas yang Sudah Diterima</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Pas Foto 3x4 (2 Lembar): <strong>Sudah</strong></li>
                        <li class="list-group-item">Fotokopi Ijazah Terakhir: <strong>Belum</strong></li>
                        <li class="list-group-item">Surat Pernyataan: <strong>Sudah</strong></li>
                        <li class="list-group-item">Surat Keterangan Sehat: <strong>Belum</strong></li>
                    </ul>
                </div>
            </div>

            <!-- Card Informasi Pembayaran -->
            <div class="card border-danger shadow-sm mb-4">
                <div class="card-header bg-danger text-white">
                    <h2 class="mb-0">Informasi Pembayaran</h2>
                </div>
                <div class="card-body">
                    <p><strong>Status Pembayaran:</strong> <span class="text-danger">Belum Lunas</span></p>
                    <p><strong>Total Pembayaran:</strong> <span class="text-success">Rp1.000.000</span></p>
                    <p><strong>Tanggal Pembayaran Terakhir:</strong> <em>Belum Ada</em></p>
                </div>
            </div>
        </div>
    </div>
</x-layout>
