@props(['href'])
<div
    class="   w-64 h-44 text-center flex justify-center flex-col rounded-xl border-[oklch(62.7%_0.194_149.214)] border-4 mx-4 ">
    <h2 class="text-4xl mb-6 font-bold">{{ $slot }}</h2>
    <a href="{{ $href }}"
        class="px-4 py-2 bg-[oklch(62.7%_0.194_149.214)] text-white mx-auto rounded-md font-semibold hover:text-gray-300"><span>Daftar
            Sekarang</span></a>
</div>
