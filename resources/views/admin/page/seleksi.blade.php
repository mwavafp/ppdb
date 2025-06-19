<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-layoute>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">SELEKSI PENDAFTAR</h1>
        <div class="relative pt-[20px]">
            <form method="GET" action="{{ route('seleksi.search') }}" id="searchForm">
                <input type="text" id="searchInput" name="search"
                    class="border border-gray-400 bg-white rounded-full py-2 px-4 pl-10 w-[500px]"
                    placeholder="Cari nama atau NISN..."value="{{ request('search') }}"
                    oninput="document.getElementById('searchForm').submit()">
                <i class="fas fa-search absolute left-2 pt-[14px] text-gray-400"></i>
            </form>
        </div>
    </div>
    <div class=" my-8 ">
        <form method="GET" action="{{ route('seleksi.filter') }}">

            <div class="flex items-end flex-wrap gap-4">
                <div>
                    <label class="block text-sm font-medium">Status Seleksi</label>
                    <select name="status"
                        class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                        <option value="">Semua Status</option>
                        <option value="Lolos">Lolos</option>
                        <option value="Tidak Lolos">Tidak Lolos</option>
                        <option value="Belum Ditentukan">Belum Ditentukan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Jenjang</label>
                    <select name="jenjang"
                        class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                        <option value="">Semua Jenjang</option>
                        <option value="tk">TK</option>
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sma">SMA</option>
                        <option value="tpq">TPQ</option>
                        <option value="madin">MADIN</option>
                        <option value="pondok">PONDOK</option>
                    </select>
                </div>

                <div class="flex gap-2">
                    <button type="submit"
                        class="bg-green-500 text-white rounded-md px-6 py-2 text-sm hover:bg-green-600">
                        Cari
                    </button>
                    <a href="{{ route('seleksi.filter') }}"
                        class="bg-red-500 text-white rounded-md px-6 py-2 text-sm hover:bg-red-600 text-center">
                        Reset
                    </a>
                </div>
            </div>




        </form>
    </div>

    <div class="w-full ">
        <table class="w-full divide-y divide-gray-200" id="dataTable">
            <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white border-b-2">
                <tr>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">No</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">Nama</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">NISN</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">Jenjang</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">Kelas</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">Berkas</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">Status DP</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">Status Calon</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">Status Seleksi</th>
                    <th class="px-2 py-3 text-center text-xs font-medium uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($data as $student)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-2 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-2 py-2 text-center">{{ $student->nama }}</td>
                        <td class="border px-2 py-2 text-center">{{ $student->nisn }}</td>
                        <td class="border px-2 py-2 text-center">{{ ucfirst($student->jenjang) }}</td>
                        <td class="border px-2 py-2 text-center">{{ $student->kelas ?? '-' }}</td>
                        <td class="border px-2 py-2">
                            @foreach (['kk' => 'Kartu Keluarga', 'pas_foto' => 'Pas Foto', 'ijazah_akhir' => 'Ijazah Akhir', 'kip' => 'KIP','akta' => 'akta'] as $key => $label)
                                <p
                                    class="{{ $student->{'status_' . $key} === 'diserahkan' ? 'bg-green-500' : 'bg-red-500' }} text-white rounded-lg px-2 text-center my-2">
                                    {{ $label }}
                                </p>
                            @endforeach
                        </td>
                        <td class="border px-2 py-2 text-center">
                            <span>{{ strtoupper($student->byr_dft_ulang) }}</span>
                        </td>
                        <td class="border px-2 py-2 text-center break-words whitespace-normal w-[100px]">
                            @if ($student->status_user === 'aktif')
                                <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">Aktif</span>
                            @elseif ($student->status_user === 'tidak_aktif')
                                <span class="bg-red-500 text-white px-2 py-1 rounded text-sm">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="border px-2 py-2 text-center">
                            <span
                                class="{{ $student->status_seleksi === 'LOLOS'
                                    ? 'bg-[oklch(62.7%_0.194_149.214)]'
                                    : ($student->status_seleksi === 'PENDING'
                                        ? 'bg-blue-500'
                                        : 'bg-red-500') }} text-white px-2 py-1 rounded text-sm">
                                {{ $student->status_seleksi }}
                            </span>
                        </td>
                        <td class="border px-4 py-2 text-center">
                            <div x-data="{ open: false }">
                                <button @click="open = true"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex items-center">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </button>
                                <div x-show="open"
                                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                                    style="display: none;">
                                    <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/2 p-6 relative">
                                        <button @click="open = false"
                                            class="absolute top-2 right-4 text-4xl text-gray-600 hover:text-gray-900">&times;</button>
                                        <form action="{{ route('seleksi.update', $student->id_user) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <h2 class="text-xl font-bold mb-4">Edit Siswa</h2>

                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium">Kelas</label>
                                                <select name="kelas"
                                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option value="{{ $i }}"
                                                            {{ $student->kelas == $i ? 'selected' : '' }}>
                                                            Kelas {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium text-left">Status Calon</label>
                                                <select name="status"
                                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                    <option value="aktif"
                                                        {{ $student->status_user == 'aktif' ? 'selected' : '' }}>
                                                        Aktif</option>
                                                    <option value="tidak_aktif"
                                                        {{ $student->status_user == 'tidak_aktif' ? 'selected' : '' }}>
                                                        Tidak Aktif</option>
                                                </select>
                                            </div>

                                            <div class="mb-4">
                                                <label class="block mb-1 font-medium text-left">Status Seleksi</label>
                                                <select name="status_seleksi"
                                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                    <option value="LOLOS"
                                                        {{ $student->status_seleksi == 'LOLOS' ? 'selected' : '' }}>
                                                        LOLOS</option>
                                                    <option value="PENDING"
                                                        {{ $student->status_seleksi == 'PENDING' ? 'selected' : '' }}>
                                                        PENDING</option>
                                                    <option value="TIDAK LOLOS"
                                                        {{ $student->status_seleksi == 'TIDAK LOLOS' ? 'selected' : '' }}>
                                                        TIDAK LOLOS</option>
                                                </select>
                                            </div>

                                            @foreach (['kk' => 'KK', 'ijazah_akhir' => 'Ijazah Terakhir', 'pas_foto' => 'Pas Foto', 'kip' => 'KIP', 'akta' => 'akta'] as $field => $label)
                                                <div class="mb-4">
                                                    <label class="block mb-1 font-medium text-left">Status
                                                        {{ $label }}</label>
                                                    <select name="status_{{ $field }}"
                                                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                        <option value="diserahkan"
                                                            {{ $student->{'status_' . $field} == 'diserahkan' ? 'selected' : '' }}>
                                                            Diserahkan</option>
                                                        <option value="belum_diserahkan"
                                                            {{ $student->{'status_' . $field} == 'belum_diserahkan' ? 'selected' : '' }}>
                                                            Belum Diserahkan</option>
                                                    </select>
                                                </div>
                                            @endforeach
                                            @if ($student->nama_admin && $student->updated_at)
                                                <div class="text-sm text-gray-600 mt-4">
                                                    Terakhir diupdate oleh <span class="font-semibold">{{ $student->nama_admin }}</span>
                                                    pada <span>{{ \Carbon\Carbon::parse($student->updated_at)}}</span>
                                                </div>
                                            @endif
                                            

                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="bg-[oklch(62.7%_0.194_149.214)] text-white px-4 py-2 rounded-lg">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-gray-500">Data tidak ditemukan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $data->appends(request()->except('page'))->links() }}
        </div>
    </div>

</x-layoute>
