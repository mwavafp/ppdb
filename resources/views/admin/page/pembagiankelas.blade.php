<x-layoute>
    <x-slot:title>{{ $title }}</x-slot:title>


    <div class=" flex items-center mb-16">
        <h1 class="text-3xl font-bold">PEMBAGIAN KELAS</h1>

        <div class="flex-1 flex justify-center relative">
            <form method="GET" action="{{ route('pembagiankelas.search') }}" id="searchForm">
                <input type="text" id="searchInput" name="search"
                    class="border bg-white border-gray-400 rounded-full py-2 px-4 pl-10 w-[500px]" placeholder="Search"
                    value="{{ request('search') }}" oninput="document.getElementById('searchForm').submit()">
            </form>
            <i class="fas fa-search absolute left-[calc(50%-240px+12px)] top-3 text-gray-400"></i>
        </div>
    </div>
    @php
        $adminUnit = auth('admin')->user()->unit;
    @endphp

    @if ($adminUnit === 'super')
        <form method="GET" action="{{ route('pembagiankelas.filter') }}">

            <div class="w-full  my-8">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium">Jenjang</label>
                        <select name="unt_pendidikan"
                            class="mt-1 block w-full py-2  border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                            <option value="">Semua</option>
                            <option value="tk" {{ request('unt_pendidikan') == 'tk' ? 'selected' : '' }}>TK</option>
                            <option value="sd" {{ request('unt_pendidikan') == 'sd' ? 'selected' : '' }}>SD</option>
                            <option value="smp" {{ request('unt_pendidikan') == 'smp' ? 'selected' : '' }}>SMP
                            </option>
                            <option value="sma" {{ request('unt_pendidikan') == 'sma' ? 'selected' : '' }}>SMA
                            </option>
                            <option value="tpq" {{ request('unt_pendidikan') == 'tpq' ? 'selected' : '' }}>TPQ
                            </option>
                            <option value="madin" {{ request('unt_pendidikan') == 'madin' ? 'selected' : '' }}>MADIN
                            </option>
                            <option value="pondok" {{ request('unt_pendidikan') == 'pondok' ? 'selected' : '' }}>PONDOK
                            </option>
                        </select>
                    </div>

                    <div class="flex mt-4 mx-4">
                        <button type="submit"
                            class="bg-green-500 text-white py-2 px-4 rounded-md mr-2 w-[100px] border border-transparent hover:bg-green-600 hover:border-green-600 transition">Cari</button>
                        <a href="{{ route('pembagiankelas.filter') }}"
                            class="bg-red-500 text-white py-2 px-4 rounded-md w-[100px] borderborder-transparent hover:bg-red-600 hover:border-red-600transition text-center">Reset</a>
                    </div>
                </div>
            </div>
        </form>
    @endif
    <div class="bg-white  ">
        <table class="min-w-full divide-y divide-gray-200" id="dataTable">
            <thead class="bg-[oklch(62.7%_0.194_149.214)] border-b-2">
                <tr class="text-white">
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Golongan</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenjang
                        Pendidikan
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="tableBody">
                @foreach ($students as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->name }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->kelas }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->kls_identitas }}</td>
                        <td class="border px-4 py-2 text-center">{{ strtoupper($item->unt_pendidikan) }}</td>

                        <td class="border px-4 py-2 text-center">
                            <div x-data="{ isModalOpen: false }">
                                <button @click="isModalOpen = true"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <div x-show="isModalOpen"
                                    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50"
                                    style="display: none;">
                                    <div class="bg-white rounded-lg shadow-lg w-3/4 md:w-1/2 p-6 relative">
                                        <button @click="isModalOpen = false"
                                            class="absolute top-2 right-4 text-4xl text-gray-600 hover:text-gray-900">
                                            &times;
                                        </button>
                                        <form action="{{ route('pembagiankelas.update', $item->id_kelas) }}"
                                            method="POST">
                                            @csrf
                                            <h1 class="font-bold text-xl mb-4">Edit Pembagian Kelas</h1>

                                            <div class="mb-4">
                                                <label for="name"
                                                    class="block text-left text-gray-700 font-medium">Nama</label>
                                                <label for="name"
                                                    class="block text-left text-gray-700 font-medium">{{ $item->name }}</label>
                                            </div>

                                            <div class="mb-4">
                                                <label for="kelas"
                                                    class="block text-left text-gray-700 font-medium">Kelas</label>
                                                <select id="kelas" name="kelas"
                                                    class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 appearance-none">
                                                    <option value="-" {{ $item->kelas == '-' ? 'selected' : '' }}>
                                                        -</option>
                                                    <option value="1" {{ $item->kelas == '1' ? 'selected' : '' }}>
                                                        1</option>
                                                    <option value="2" {{ $item->kelas == '2' ? 'selected' : '' }}>
                                                        2</option>
                                                    <option value="3" {{ $item->kelas == '3' ? 'selected' : '' }}>
                                                        3</option>
                                                    <option value="4" {{ $item->kelas == '4' ? 'selected' : '' }}>
                                                        4</option>
                                                    <option value="5" {{ $item->kelas == '5' ? 'selected' : '' }}>
                                                        5</option>
                                                    <option value="6" {{ $item->kelas == '6' ? 'selected' : '' }}>
                                                        6</option>
                                                    <option value="7" {{ $item->kelas == '7' ? 'selected' : '' }}>
                                                        7</option>
                                                    <option value="8" {{ $item->kelas == '8' ? 'selected' : '' }}>
                                                        8</option>
                                                    <option value="9" {{ $item->kelas == '9' ? 'selected' : '' }}>
                                                        9</option>
                                                    <option value="11"
                                                        {{ $item->kelas == '11' ? 'selected' : '' }}>11</option>
                                                    <option value="12"
                                                        {{ $item->kelas == '12' ? 'selected' : '' }}>12</option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="kls_identitas"
                                                    class="block text-left text-gray-700 font-medium">Golongan</label>
                                                <select id="kls_identitas" name="kls_identitas"
                                                    class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 appearance-none">
                                                    <option value="-"
                                                        {{ $item->kls_identitas == '-' ? 'selected' : '' }}>-
                                                    </option>
                                                    <option value="A"
                                                        {{ $item->kls_identitas == 'A' ? 'selected' : '' }}>A
                                                    </option>
                                                    <option value="B"
                                                        {{ $item->kls_identitas == 'B' ? 'selected' : '' }}>B
                                                    </option>
                                                    <option value="C"
                                                        {{ $item->kls_identitas == 'C' ? 'selected' : '' }}>C
                                                    </option>
                                                    <option value="D"
                                                        {{ $item->kls_identitas == 'D' ? 'selected' : '' }}>D
                                                    </option>
                                                    <option value="E"
                                                        {{ $item->kls_identitas == 'E' ? 'selected' : '' }}>E
                                                    </option>
                                                    <option value="F"
                                                        {{ $item->kls_identitas == 'F' ? 'selected' : '' }}>F
                                                    </option>
                                                </select>
                                            </div>


                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class=" text-white px-4 py-2  bg-[oklch(62.7%_0.194_149.214)] rounded-lg">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $students->links() }}
        </div>
    </div>



</x-layoute>
