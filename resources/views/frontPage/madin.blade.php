<x-layout>
  <x-slot:title>{{$title}}</x-slot:title>

<div class="bg-gray-100 my-4  ">
  <main class="container mx-auto mt-6">
      <div class="bg-primary text-white text-center py-4 rounded-md">
       <h1 class="text-xl font-bold">
        INFORMASI MADIN
       </h1>
      </div>
      <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
    <div class="bg-white p-4 rounded-md shadow-md">
     <img alt="Informational Poster" class="w-full rounded-md" height="300" src="https://storage.googleapis.com/a1aa/image/PEqUfIexZ1trwUEMnrfoiRof9ZuU7J1S5jBiYPe28wthQhfBF.jpg" width="400"/>
    </div>
    @foreach ($all_teks as $teks)
    <div class="bg-white p-4 rounded-md shadow-md">
     <h2 class="text-lg font-bold">
      Company Profile
     </h2>
     <p>
     {{ $teks->deskripsi }}
     </p>
    </div>
   </section>
   <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
    <div class="bg-white p-4 rounded-md shadow-md">
      <center>
     <h2 class="text-primary text-lg font-bold mb-4">
      VISI
     </h2>
     </center>
     <p class="mt-4">
     {{ $teks->visi }}
     </p>
    </div>
    <div class="bg-white p-4 rounded-md shadow-md">
      <center>
     <h2 class="text-primary text-lg font-bold mb-4">
      MISI
     </h2>
     </center>
     <p class="mt-4">
     {{ $teks->misi }}
     </p>
    </div>
   </section>
   @endforeach
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-6">
      
       <div class="bg-white p-6 rounded-md shadow-md">
        <h2 class="text-primary text-lg font-bold mb-4">
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
        <h2 class="text-primary text-lg font-bold mb-4">
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
        <a href="/form?unit_pendidikan=SMP" class="bg-primary text-white py-2 px-4 rounded-md">
         DAFTAR KLIK DISINI
        </a>
       </div>
       <div class="bg-white p-6 rounded-md shadow-md  tabel-2">
        <h2 class="text-primary text-lg font-bold mt-6 mb-4">
         BERKAS YANG HARUS DISIAPKAN
        </h2>
        <ul class="space-y-2">
         <li class="flex items-center">
          <i class="fas fa-check text-primary">
          </i>
          <span class="ml-2">
           Fotocopy KK 2 Lembar
          </span>
         </li>
         <li class="flex items-center">
          <i class="fas fa-check text-primary">
          </i>
          <span class="ml-2">
          Fotocopy Akte Kelahiran 2 Lembar
          </span>
         </li>
         <li class="flex items-center">
          <i class="fas fa-check text-primary">
          </i>
          <span class="ml-2">
           Foto Berwarna 3x4 2 Lembar
          </span>
         </li>
        </ul>
       </div>
       </div>
       
      </div>
      
     </main>
</div>

</x-layout>