<x-layout>
    <div class="container mx-auto px-4 py-6 min-h-[100vh]">
        <h2 class="text-2xl font-bold mb-6 text-center text-[oklch(62.7%_0.194_149.214)]">{{ $title }}</h2>

        <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg mx-auto max-w-7xl">

            <!-- Search Bar -->
            <div class="flex justify-center mb-6">
                <form method="GET" action="{{ route('pengumumansmp.search') }}" class="w-full max-w-2xl">
                    <div class="relative">
                        <input type="text" name="search"
                            class="w-full pl-10 pr-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-200 focus:outline-none"
                            placeholder="Cari berdasarkan nama atau NISN" value="{{ request('search') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-2.5 h-5 w-5 text-gray-400"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 10-14 0 7 7 0 0014 0z" />
                        </svg>
                    </div>
                </form>
            </div>

            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-300 border rounded-lg shadow">
                    <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white text-xs uppercase font-bold tracking-wide">
                        <tr>
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Nama Lengkap</th>
                            <th class="px-4 py-3 text-left">Alamat</th>
                            <th class="px-4 py-3 text-left">NISN</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-sm">
                        @if ($all_data->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">
                                    Data tidak ditemukan
                                </td>
                            </tr>
                        @else
                            @foreach ($all_data as $item)
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ $loop->iteration + ($all_data->currentPage() - 1) * $all_data->perPage() }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">{{ $item->name }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $item->alamat }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $item->nisn }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex justify-center">
                {{ $all_data->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
</x-layout>
