<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<x-layoute>
    <x-slot:title>Pengaturan Web</x-slot:title>
    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <header class="mb-4 ">
        <div class=" container flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold">Pengaturan Berita</h1>
                <p class="text-sm text-gray-500 mt-1">Manajemen Berita</p>
            </div>
            <a href="{{ route('kategori.index') }}"
                class="inline-block bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium py-2 px-4 rounded">
                Edit Kategori
            </a>

            <!-- Tombol Tambah -->
            <a href="{{ route('createberita') }}"
                class="mt-3 md:mt-0 inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-4 rounded">
                + Tambah Berita
            </a>


        </div>
        
    </header>
    <main class="container  py-4">



        <div class="bg-white ">
            <table class="w-full divide-y divide-gray-200" id="dataTable">
                <thead class="bg-[oklch(62.7%_0.194_149.214)] border-b-2">
                    <tr class="text-white">
                        <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                        <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Judul</th>
                        {{-- <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Abstrak</th> --}}
                        <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Isi</th>
                        <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Kategori
                        </th>
                        <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenjang
                        </th>
                        <th class="px-2 py-3 text-center text-xs font-medium uppercase tracking-wider">Gambar
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                    @if ($all_teks->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center py-4 text-gray-500">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @else
                        @foreach ($all_teks as $item)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="border px-4 py-2 text-center text-sm">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2 text-center text-[10px] truncate max-w-[200px]"
                                    title="{{ $item->judul }}">{{ $item->judul }}</td>
                                {{-- <td class="border px-4 py-2 text-center text-[10px] truncate max-w-[200px]" title="{{ $item->abstrak }}">{{ $item->abstrak }}</td> --}}
                                <td class="border px-4 py-2 text-center text-[10px] truncate max-w-[200px]"
                                    title="{{ $item->isi }}">{{ Str::limit(strip_tags($item->isi), 100, '...') }}
                                </td>
                                <td class="border px-4 py-2 text-center text-sm">{{ $item->nama }}</td>
                                <td class="border px-4 py-2 text-center text-sm">{{ $item->unit }}</td>
                                <td class="border px-4 py-2 text-center text-sm">
                                    @if ($item->gambar)
                                        <a href="{{ asset('storage/' . $item->gambar) }}" target="_blank"
                                            rel="noopener noreferrer" title="Lihat gambar">
                                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Berita"
                                                class="w-16 h-16 object-cover rounded mx-auto">
                                        </a>
                                    @else
                                        <span class="text-gray-400">Tidak ada</span>
                                    @endif
                                </td>

                                <td class="border px-4 py-2 text-center text-sm">
                                    <!-- Modal -->

                                    <div x-data="{ isModalOpen: false, isDetailOpen: false }">
                                        <!-- Tombol untuk membuka modal -->
                                        <div class="flex space-x-2">
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('berita.edit', $item->id_berita) }}"
                                                class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded text-sm flex items-center justify-center"
                                                title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>


                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('berita.destroy', $item->id_berita) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 text-sm flex items-center justify-center"
                                                    title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>


                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </main>


    <!-- Header Section -->


</x-layoute>
