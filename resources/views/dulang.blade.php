<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Selamat Datang</h2>
    </div>
    <x-tahapan></x-tahapan>

        
</x-layout>