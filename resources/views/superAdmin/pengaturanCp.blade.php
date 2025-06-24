<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!-- Sembunyikan elemen dengan x-cloak sebelum Alpine aktif -->
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>

    <header class=" mb-10">
        <div class="container  flex flex-col">
            <h1 class="text-3xl font-bold">Pengaturan CP</h1>
            <p class="text-sm text-gray-500 mt-1">Mengatur CP</p>
        </div>
    </header>

    <div class="rounded-lg shadow">
        <table class="w-full divide-y divide-gray-200" id="dataTable">
            <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white border-b-2 rounded-md">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama Admin</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Link Group</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenjang</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                @foreach ([$data1, $data2, $data3, $data4, $data5, $data6] as $index => $data)
                    @if($data)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2 text-center">{{ $data->nama }}</td>
                        <td class="border px-4 py-2 text-center">{{ $data->cp }}</td>
                        <td class="border px-4 py-2 text-center"> 
                        @if ($index == 0)
                            pondok
                        @elseif ($index == 1)
                            madin & tpq
                        @elseif ($index == 2)
                            TK
                        @elseif ($index == 3)
                            SD
                        @elseif ($index == 4)
                            SMP
                        @else
                            SMA
                        @endif
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <div x-data="{ isEditOpen{{ $index }}: false }" class="inline-block">
                                <button @click="isEditOpen{{ $index }} = true"
                                    class="text-white bg-amber-500 px-4 py-2 rounded-md hover:underline">
                                    <i class="fas fa-edit mr-2"></i>Edit
                                </button>

                                <!-- Modal Edit -->
                                <div x-show="isEditOpen{{ $index }}" x-cloak
                                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                                    <div class="bg-white p-6 rounded shadow-lg w-1/2 relative">
                                        <button @click="isEditOpen{{ $index }} = false"
                                            class="absolute top-2 right-2 text-gray-700 hover:text-black">&times;</button>
                                        <form action="{{ route('admin.update-admin', $data->id_contact) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <h2 class="text-xl font-bold mb-4">Edit CP</h2>
                                            <div class="mb-4">
                                                <label class="text-left block text-gray-700">Nama</label>
                                                <input type="text" name="nama" value="{{ $data->nama }}"
                                                    class="w-full border border-gray-300 rounded p-2" required>
                                            </div>
                                            <div class="mb-4">
                                                <label class="text-left block text-gray-700">Contact</label>
                                                <input type="text" name="cp" value="{{ $data->cp }}"
                                                    class="w-full border border-gray-300 rounded p-2" required>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit"
                                                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</x-layoute>