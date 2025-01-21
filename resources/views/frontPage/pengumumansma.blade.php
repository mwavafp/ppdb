<x-layout>
    <div class="container mx-auto p-4">
        <h2 class="text-xl font-bold mb-4 text-center">{{ $title }}</h2>
        <div class="bg-white p-6 rounded shadow-md mx-auto mt-8 max-w-7xl">
            <table class="min-w-full divide-y divide-gray-200" id="dataTable">
                <thead class="bg-gray-50 border-b-2">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Lengkap</th>
                        <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Alamat</th>
                        <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">NISN</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                    @if ($all_data->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @else
                        @foreach ($all_data as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <!-- Menampilkan nomor urut yang disesuaikan dengan halaman -->
                                <td class="border px-4 py-2 text-center">
                                    {{ $loop->iteration + ($all_data->currentPage() - 1) * $all_data->perPage() }}</td>
                                <td class="border px-4 py-2 text-center">{{ $item->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $item->alamat }}</td>
                                <td class="border px-4 py-2 text-center">{{ $item->nisn }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

            <!-- Pagination links -->
            <div class="mt-4 flex justify-center">
                {{ $all_data->appends(request()->except('page'))->links() }}
            </div>
        </div>

    </div>
</x-layout>
