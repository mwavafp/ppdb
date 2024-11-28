<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CAmin Dashboard') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <x-dropdown-link :href="route('admin.logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>

    
</x-app-layout>
