<!-- Komponen x-nav-link -->
@props(['href'])
<a {{ $attributes}} 
   class="{{ request()->is($href) ? 'bg-red-500 text-white' : 'text-orange hover:text-orangehrv hover:bg-red-200 rounded-md' }} px-4 py-2 rounded-md" 
   aria-current="page">
   {{ $slot }}
</a>
