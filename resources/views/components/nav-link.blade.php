@props(['href'])
<a href="{{ $href }}" 
   class="{{ request()->is(trim($href, '/')) || request()->is($href) ? 'bg-primary  text-white block' : 'text-orange block  hover:text-orangehrv hover:bg-green-200 rounded-md' }} px-4 py-2 rounded-md" 
   aria-current="{{ request()->is(trim($href, '/')) ? 'page' : '' }}">
   {{ $slot }}
</a>