<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-layoute>
    <div class="px-9 py-3 flex justify-between items-center mb-4">
        <h1 class="font-bold text-xl mr-2">SELEKSI SISWA</h1>
        <div class="relative pt-[20px]">
            <form method="GET" action="{{ route('seleksi.search') }}" id="searchForm">
                <input type="text" id="searchInput" name="search"
                    class="border border-gray-400 rounded-full py-2 px-4 pl-10 w-[500px]"
                    placeholder="Cari nama atau NISN..." oninput="document.getElementById('searchForm').submit()">
                <i class="fas fa-search absolute left-2 pt-[14px] text-gray-400"></i>
            </form>
        </div>
        <span
            class=" text-white bg-[oklch(62.7%_0.194_149.214)] py-2 px-4 rounded-md">{{ strtoupper(auth()->user()->name) }}</span>
    </div>

    <!-- Form Filter -->
    <form method="GET" action="{{ route('seleksi.filter') }}">
        <div class="max-w-7xl px-8 bg-white   my-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status Seleksi</label>
                    <select id="filterSelect" name="status"
                        class="mt-1 block w-full py-2 px-3 border border-gray-400 bg-white rounded-md shadow-sm focus:outline-none focus:border-black sm:text-sm">
                        <option value="">Semua Status</option>
                        <option value="Lolos">Lolos</option>
                        <option value="Tidak Lolos">Tidak Lolos</option>
                        <option value="Belum Ditentukan">Belum Ditentukan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Jenjang</label>
                    <select id="jenjangSelect" name="jenjang"
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
                <div class="flex mt-4 mx-4">
                    <button type="submit"
                        class="bg-green-500 text-white py-2 px-4 rounded-md mr-2 w-[100px] border border-transparent hover:bg-green-600 hover:border-green-600 transition">Cari</button>
                    <a href="{{ route('seleksi.filter') }}"
                        class="bg-red-500 text-white py-2 px-4 rounded-md w-[100px] border border-transparent hover:bg-red-600 hover:border-red-600 transition text-center">Reset</a>
                </div>
            </div>
        </div>
    </form>

    <div class="bg-white p-4 ">
        <table class="min-w-full divide-y divide-gray-200" id="dataTable">
            <thead class="bg-[oklch(62.7%_0.194_149.214)] text-white border-b-2">
                <tr>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">NISN</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Jenjang</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Kelas</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Berkas</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status DP</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status Calon</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status Seleksi</th>
                    <th class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="data-table-body">
                @if ($data->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center py-4 text-gray-500">
                            Data tidak ditemukan
                        </td>
                    </tr>
                @else
                    @foreach ($data as $student)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 text-center">{{ $student->nama }}</td>
                            <td class="border px-4 py-2 text-center">{{ $student->nisn }}</td>
                            <td class="border px-4 py-2 text-center">{{ ucfirst($student->jenjang) }}</td>
                            <td class="border px-4 py-2 text-center">{{ $student->kelas ?? '-' }}</td>
                            <td class="border px-4 py-2">
                                <p
                                    class="{{ $student->status_kk === 'diserahkan' ? 'bg-green-500 text-white rounded-lg px-2 text-center my-2' : 'bg-red-500 text-white rounded-lg px-2 text-center my-2' }}">
                                    Kartu Keluarga
                                </p>
                                <p
                                    class="{{ $student->status_pas_foto === 'diserahkan' ? 'bg-green-500 text-white rounded-lg px-2 text-center my-2' : 'bg-red-500 text-white rounded-lg px-2 text-center my-2' }}">
                                    Pas Foto
                                </p>
                                <p
                                    class="{{ $student->status_ijazah_akhir === 'diserahkan' ? 'bg-green-500 text-white rounded-lg px-2 text-center my-2' : 'bg-red-500 text-white rounded-lg px-2 text-center my-2' }}">
                                    Ijazah Akhir
                                </p>
                                <p
                                    class="{{ $student->status_kip === 'diserahkan' ? 'bg-green-500 text-white rounded-lg px-2 text-center my-2' : 'bg-red-500 text-white rounded-lg px-2 text-center my-2' }}">
                                    KIP
                                </p>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <span>{{ strtoupper($student->byr_dft_ulang) }}</span>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                @if ($student->status_user === 'aktif')
                                    <span class="bg-green-500 text-white px-2 py-1 rounded text-sm">Aktif
                                    @elseif ($student->status_user === 'tidak_aktif')
                                        <span class="bg-red-500 text-white px-2 py-1 rounded text-sm">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-center">
                                @if ($student->status_seleksi === 'LOLOS')
                                    <span
                                        class="bg-[oklch(62.7%_0.194_149.214)] text-white px-2 py-1 rounded text-sm">{{ $student->status_seleksi }}</span>
                                @elseif($student->status_seleksi === 'PENDING')
                                    <span
                                        class="bg-blue-500 text-white px-2 py-1 rounded text-sm">{{ $student->status_seleksi }}</span>
                                @elseif($student->status_seleksi === 'TIDAK LOLOS')
                                    <span
                                        class="bg-red-500 text-white px-2 py-1 rounded text-sm">{{ $student->status_seleksi }}</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <button type="button"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex items-center"
                                    data-bs-toggle="modal" data-bs-target="#ModalEditSiswa{{ $student->id_user }}">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        @foreach ($data as $student)
            <!-- Modal untuk setiap siswa -->
            <div class="modal fade" id="ModalEditSiswa{{ $student->id_user }}" tabindex="-1"
                aria-labelledby="ModalEditSiswaLabel{{ $student->id_user }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Header Modal -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="ModalEditSiswaLabel{{ $student->id_user }}">Edit Siswa</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <!-- Body Modal -->
                        <form action="{{ route('seleksi.update', $student->id_user) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <!-- Input Kelas -->
                                <div class="mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select id="kelas" name="kelas" class="form-select" required>
                                        <option value="" disabled selected>Pilih Kelas</option>
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"
                                                {{ $student->kelas == $i ? 'selected' : '' }}>
                                                Kelas {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status_user" class="form-label">Status Calon</label>
                                    <select id="status_user" name="status" class="form-select">
                                        <option value="aktif"
                                            {{ $student->status_user == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="tidak_aktif"
                                            {{ $student->status_user == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif
                                        </option>

                                    </select>
                                </div>
                                <!-- Input Status Seleksi -->
                                <div class="mb-3">
                                    <label for="status_seleksi" class="form-label">Status Seleksi</label>
                                    <select id="status_seleksi" name="status_seleksi" class="form-select">
                                        <option value="LOLOS"
                                            {{ $student->status_seleksi == 'LOLOS' ? 'selected' : '' }}>LOLOS</option>
                                        <option value="PENDING"
                                            {{ $student->status_seleksi == 'PENDING' ? 'selected' : '' }}>PENDING
                                        </option>
                                        <option value="TIDAK LOLOS"
                                            {{ $student->status_seleksi == 'TIDAK LOLOS' ? 'selected' : '' }}>TIDAK
                                            LOLOS</option>
                                    </select>
                                </div>

                                <!-- Input Status KKa -->
                                <div class="mb-3">
                                    <label for="status_kk" class="form-label">Status KK</label>
                                    <select id="status_kk" name="status_kk" class="form-select">
                                        <option value="diserahkan"
                                            {{ $student->status_kk == 'diserahkan' ? 'selected' : '' }}>Diserahkan
                                        </option>
                                        <option value="belum_diserahkan"
                                            {{ $student->status_kk == 'belum_diserahkan' ? 'selected' : '' }}>Belum
                                            Diserahkan</option>
                                    </select>
                                </div>

                                <!-- Input Dokumen Tambahan -->
                                <div class="mb-3">
                                    <label for="status_ijazah_akhir" class="form-label">Ijazah Terakhir</label>
                                    <select id="status_ijazah_akhir" name="status_ijazah_akhir" class="form-select">
                                        <option value="diserahkan"
                                            {{ $student->status_ijazah_akhir == 'diserahkan' ? 'selected' : '' }}>
                                            Diserahkan</option>
                                        <option value="belum_diserahkan"
                                            {{ $student->status_ijazah_akhir == 'belum_diserahkan' ? 'selected' : '' }}>
                                            Belum Diserahkan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status_pas_foto" class="form-label">Pas Foto</label>
                                    <select id="status_pas_foto" name="status_pas_foto" class="form-select">
                                        <option value="diserahkan"
                                            {{ $student->status_pas_foto == 'diserahkan' ? 'selected' : '' }}>
                                            Diserahkan</option>
                                        <option value="belum_diserahkan"
                                            {{ $student->status_pas_foto == 'belum_diserahkan' ? 'selected' : '' }}>
                                            Belum Diserahkan</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status_kip" class="form-label">Status KIP</label>
                                    <select id="status_kip" name="status_kip" class="form-select">
                                        <option value="diserahkan"
                                            {{ $student->status_kip == 'diserahkan' ? 'selected' : '' }}>Diserahkan
                                        </option>
                                        <option value="belum_diserahkan"
                                            {{ $student->status_kip == 'belum_diserahkan' ? 'selected' : '' }}>Belum
                                            Diserahkan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Footer Modal -->
                            <div class="modal-footer">
                                <button type="submit"
                                    class=" text-white px-4 py-2  bg-[oklch(62.7%_0.194_149.214)] rounded-lg">
                                    Simpan
                                </button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach

        <!-- Pagination Controls -->
        <div class="mt-4">
            {{ $data->appends(request()->except('page'))->links() }}
        </div>
    </div>

    </div>
    </div>

</x-layoute>
