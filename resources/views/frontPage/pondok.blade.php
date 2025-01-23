<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>

<div class="bg-gray-100">
    <main class="container mx-auto mt-6">
        <div class="bg-red-600 text-white text-center py-4 rounded-md">
         <h1 class="text-xl font-bold">
          INFORMASI PONDOK
         </h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-6">
         
         <div class="bg-white p-6 rounded-md shadow-md">
          <h2 class="text-orange-600 text-lg font-bold mb-4">
           ALUR PENDAFTARAN
          </h2>
          <ul class="space-y-4">
           <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1">
            </i>
            <div class="ml-2">
             <strong>
              STEP 1 - DAFTAR
             </strong>
             <p>
              Selesai mendaftar, pendaftar akan menerima notifikasi whatsapp untuk melanjutkan proses pembayaran
             </p>
            </div>
           </li>
           <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1">
            </i>
            <div class="ml-2">
             <strong>
              STEP 2 - ISI FORMULIR PENDAFTARAN
             </strong>
             <p>
              Isi dan lengkapi isi formulir pendaftaran dan pilih tujuan daftar (Daycare, Playgroup, TK).
             </p>
            </div>
           </li>
           <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1">
            </i>
            <div class="ml-2">
             <strong>
              STEP 3 - PEMBAYARAN
             </strong>
             <p>
              Lakukan pembayaran sesuai nominal dan nomer rekening yang tertera
             </p>
            </div>
           </li>
           <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1">
            </i>
            <div class="ml-2">
             <strong>
              STEP 4 - ISI BIODATA
             </strong>
             <p>
              Lengkapi biodata calon murid dan orang tua guna pendataan.
             </p>
            </div>
           </li>
           <li class="flex items-start">
            <i class="fas fa-check text-green-500 mt-1">
            </i>
            <div class="ml-2">
             <strong>
              STEP 5 - CETAK KARTU
             </strong>
             <p>
              Lakukan cetak kartu dan simpan sebagai bukti pada saat registrasi ulang.
             </p>
            </div>
           </li>
          </ul>
         </div>
         <div class='flex flex-col'>
         <div class="bg-white p-6 rounded-md shadow-md mb-4 tabel-1">
          <h2 class="text-orange-600 text-lg font-bold mb-4">
           JADWAL PENDAFTARAN
          </h2>
          <ul class="space-y-2 mb-4">
           <li>
            Gelombang 1 :
            <br/>
            2 Desember 2024 - 28 Februari 2025
           </li>
           <li>
            Gelombang 2 :
            <br/>
            1 Maret - 31 Mei 2025
           </li>
           <li>
            Gelombang 3 :
            <br/>
            1 Juni - 14 Juli 2025
           </li>
          </ul>
          <a href="/form?unit_pendidikan=SMP" class="bg-orange-600 text-white py-2 px-4 rounded-md">
         DAFTAR KLIK DISINI
        </a>
         </div>
         <div class="bg-white p-6 rounded-md shadow-md  tabel-2">
          <h2 class="text-orange-600 text-lg font-bold mt-6 mb-4">
           BERKAS YANG HARUS DISIAPKAN
          </h2>
          <ul class="space-y-2">
           <li class="flex items-center">
            <i class="fas fa-check text-green-500">
            </i>
            <span class="ml-2">
             Fotocopy Ijazah 3 Lembar
            </span>
           </li>
           <li class="flex items-center">
            <i class="fas fa-check text-green-500">
            </i>
            <span class="ml-2">
            Fotocopy SKHUN 3 Lembar
            </span>
           </li>
           <li class="flex items-center">
            <i class="fas fa-check text-green-500">
            </i>
            <span class="ml-2">
            Fotocopy Akte Kelahiran 3 Lembar
            </span>
           </li>
           <li class="flex items-center">
            <i class="fas fa-check text-green-500">
            </i>
            <span class="ml-2">
            Fotocopy KK 3 Lembar
            </span>
           </li>
           <li class="flex items-center">
            <i class="fas fa-check text-green-500">
            </i>
            <span class="ml-2">
            Foto 3x4 3 Lembar
            </span>
           </li>
          </ul>
         </div>
         </div>
         
        </div>
        
       </main>
</div>
  

</x-layout>
