<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<x-layout>
    <x-slot:title>Informasi Jenjang</x-slot:title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>

  <main class="container mx-auto mt-6">
    <!-- Header -->
    <div class="bg-red-600 text-white text-center py-4 rounded-md">
      <h1 class="text-xl font-bold">INFORMASI SMP</h1>
    </div>
    
    <!-- Content -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-6">
    
      <!-- Alur Pendaftaran -->
      <div class="bg-white p-6 rounded-md shadow-md">
        <h2 class="text-orange-600 text-lg font-bold mb-4">ALUR PENDAFTARAN</h2>
        <ul class="space-y-4">
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1"></i>
            <div class="ml-2">
              <strong>STEP 1 - DAFTAR</strong>
              <p>Selesai mendaftar, pendaftar akan menerima notifikasi whatsapp untuk melanjutkan proses pembayaran</p>
            </div>
          </li>
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1"></i>
            <div class="ml-2">
              <strong>STEP 2 - ISI FORMULIR PENDAFTARAN</strong>
              <p>Isi dan lengkapi isi formulir pendaftaran dan pilih tujuan daftar (Daycare, Playgroup, TK).</p>
            </div>
          </li>
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1"></i>
            <div class="ml-2">
              <strong>STEP 3 - PEMBAYARAN</strong>
              <p>Lakukan pembayaran sesuai nominal dan nomer rekening yang tertera</p>
            </div>
          </li>
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1"></i>
            <div class="ml-2">
              <strong>STEP 4 - ISI BIODATA</strong>
              <p>Lengkapi biodata calon murid dan orang tua guna pendataan.</p>
            </div>
          </li>
          <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1"></i>
            <div class="ml-2">
              <strong>STEP 5 - CETAK KARTU</strong>
              <p>Lakukan cetak kartu dan simpan sebagai bukti pada saat registrasi ulang.</p>
            </div>
          </li>
        </ul>
      </div>
      
      <!-- Jadwal Pendaftaran dan Berkas -->
      <div class="flex flex-col space-y-4">
        
        <!-- Jadwal Pendaftaran -->
        <div class="bg-white p-6 rounded-md shadow-md">
          <h2 class="text-orange-600 text-lg font-bold mb-4">JADWAL PENDAFTARAN</h2>
          <ul class="space-y-2 mb-4">
            <li>Gelombang 1 : <br/> 2 Desember 2024 - 28 Februari 2025</li>
            <li>Gelombang 2 : <br/> 1 Maret - 31 Mei 2025</li>
            <li>Gelombang 3 : <br/> 1 Juni - 14 Juli 2025</li>
          </ul>
          <button class="bg-orange-600 text-white py-2 px-4 rounded-md">DAFTAR KLIK DISINI</button>
        </div>

        <!-- Berkas yang Harus Disiapkan -->
        <div class="bg-white p-6 rounded-md shadow-md">
          <h2 class="text-orange-600 text-lg font-bold mt-6 mb-4">BERKAS YANG HARUS DISIAPKAN</h2>
          <ul class="space-y-2">
            <li class="flex items-center">
              <i class="fas fa-check text-green-500"></i>
              <span class="ml-2">Foto Copy Ijazah SD/MI yang di legalisir : 2 lembar</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-check text-green-500"></i>
              <span class="ml-2">Foto Copy Ijazah SKHUN SD/MI yang di legalisir : 2 lembar</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-check text-green-500"></i>
              <span class="ml-2">Foto Copy KK (Kartu Keluarga) : 2 lembar</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-check text-green-500"></i>
              <span class="ml-2">Foto Copy Akte Kelahiran : 2 lembar</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-check text-green-500"></i>
              <span class="ml-2">Photo hitam putih 3 x 4 : 2 lembar</span>
            </li>
            <li class="flex items-center">
              <i class="fas fa-check text-green-500"></i>
              <span class="ml-2">Lembar NISN</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </main>

</x-layout>
