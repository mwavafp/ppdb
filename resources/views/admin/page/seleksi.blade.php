<x-layoute>
    <div class="">
        <div>
            <div class="flex h-screen">
                <!-- Main Content -->
                <main class="flex-1 p-6">
                    <!-- Header -->
                    <header class="flex justify-between items-center">
                        <h1 class="text-2xl font-semibold">Seleksi Siswa</h1>
                        <button class="bg-yellow-400 text-white px-4 py-2 rounded">Nama Admin</button>
                    </header>

                    <!-- Search and Filter -->
                    <div class="flex justify-between items-center mt-6">
                        <input type="text" id="searchInput" placeholder="Cari nama atau NISN..."
                            class="w-1/3 p-2 border border-gray-300 rounded" onkeyup="searchTable()" />
                        <select id="filterSelect" onchange="filterTable()" class="p-2 border border-gray-300 rounded">
                            <option value="">Semua Status</option>
                            <option value="Lolos">Lolos</option>
                            <option value="Tidak Lolos">Tidak Lolos</option>
                            <option value="Belum Ditentukan">Belum Ditentukan</option>
                        </select>
                    </div>

                    <!-- Data Table -->
                    <div class="mt-12">
                        <table class="w-full border border-gray-200 bg-white rounded">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border p-2 text-left">No</th>
                                    <th class="border p-2 text-left">Nama</th>
                                    <th class="border p-2 text-left">NISN</th>
                                    <th class="border p-2 text-left">Jenjang</th>
                                    <th class="border p-2 text-left">Kelas</th>
                                    <th class="border p-2 text-left">Berkas</th>
                                    <th class="border p-2 text-left">Status Bayar</th>
                                    <th class="border p-2 text-left">Status Calon</th>
                                    <th class="border p-2 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody id="data-table-body">
                                @foreach ($data as $student)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                                        <td class="border p-2">{{ $student->nama }}</td>
                                        <td class="border p-2">{{ $student->nisn }}</td>
                                        <td class="border p-2">{{ ucfirst($student->jenjang) }}</td>
                                        <td class="border p-2">{{ $student->kelas ?? '-' }}</td>
                                        <td class="border p-2">
                                            <p class="bg-primary text-white rounded-lg px-2  text-center my-2">kk</p>
                                            <p class="bg-red-500 text-white rounded-lg px-2  text-center my-2">kip</p>
                                            <p class="bg-primary text-white rounded-lg px-2  text-center my-2">kis</p>
                                        </td>
                                        <td class="border p-2"><span>lunas</span></td>
                                        <td class="border p-2 status">
                                            <span
                                                class="bg-yellow-400 text-white px-2 py-1 rounded text-sm">{{ $student->status_user }}</span>
                                        </td>
                                        <td class="border p-2 flex space-x-2">
                                            <button
                                                onclick="openModal('{{ $student->nisn }}', '{{ $student->nama }}', '{{ $student->nisn }}', '{{ $student->jenjang }}', '{{ $student->kelas ?? '-' }}', '{{ $student->status_user }}')"
                                                class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
                                            <button
                                                onclick="openDetailModal('{{ $student->nama }}', '{{ $student->nisn }}', '{{ $student->jenjang }}', '{{ $student->kelas ?? '-' }}', 'Lihat Berkas', '{{ $student->status_user }}')"
                                                class="bg-blue-500 text-white px-3 py-1 rounded">Detail</button>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Tambahkan data lainnya di sini -->
                            </tbody>
                        </table>
                        <div class="mt-4  ">
                            {{ $data->appends(request()->except('page'))->links() }}
                        </div>
                    </div>
                </main>
            </div>

            <!-- Modal Edit -->
            <div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
                <div class="bg-white w-96 p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-4">Edit Data Siswa</h2>
                    <form id="editForm">
                        <div class="mb-4">
                            <label for="no" class="block text-sm font-medium">No</label>
                            <input type="text" id="no"
                                class="w-full p-2 border border-gray-300 rounded bg-gray-100" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium">Nama</label>
                            <input type="text" id="nama"
                                class="w-full p-2 border border-gray-300 rounded bg-gray-100" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="nisn" class="block text-sm font-medium">NISN</label>
                            <input type="text" id="nisn"
                                class="w-full p-2 border border-gray-300 rounded bg-gray-100" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="jenjang" class="block text-sm font-medium">Jenjang</label>
                            <input type="text" id="jenjang"
                                class="w-full p-2 border border-gray-300 rounded bg-gray-100" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="kelas" class="block text-sm font-medium">Kelas</label>
                            <input type="text" id="kelas"
                                class="w-full p-2 border border-gray-300 rounded bg-gray-100" readonly>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium">Status Calon</label>
                            <select id="status" class="w-full p-2 border border-gray-300 rounded">
                                <option value="Lolos">Lolos</option>
                                <option value="Tidak Lolos">Tidak Lolos</option>
                            </select>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" onclick="closeModal()"
                                class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Detail -->
            <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
                <div class="bg-white w-96 p-6 rounded shadow">
                    <h2 class="text-xl font-semibold mb-4">Detail Data Siswa</h2>
                    <div class="mb-4">
                        <strong>Nama:</strong> <span id="detailNama"></span>
                    </div>
                    <div class="mb-4">
                        <strong>NISN:</strong> <span id="detailNISN"></span>
                    </div>
                    <div class="mb-4">
                        <strong>Jenjang:</strong> <span id="detailJenjang"></span>
                    </div>
                    <div class="mb-4">
                        <strong>Kelas:</strong> <span id="detailKelas"></span>
                    </div>
                    <div class="mb-4">
                        <strong>Berkas:</strong> <span id="detailBerkas"></span>
                    </div>
                    <div class="mb-4">
                        <strong>Status Calon:</strong> <span id="detailStatus"></span>
                    </div>
                    <div class="flex justify-end">
                        <button onclick="closeDetailModal()" class="bg-gray-300 px-4 py-2 rounded">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div>

        </div>
    </div>

    <!-- Container -->




    <!-- JavaScript -->
    <script>
        const modal = document.getElementById("editModal");
        const detailModal = document.getElementById("detailModal");
        let currentRowId = null;

        function openModal(no, nama, nisn, jenjang, kelas, status) {
            currentRowId = no;
            document.getElementById("no").value = no;
            document.getElementById("nama").value = nama;
            document.getElementById("nisn").value = nisn;
            document.getElementById("jenjang").value = jenjang;
            document.getElementById("kelas").value = kelas;
            document.getElementById("status").value = status;
            modal.classList.remove("hidden");
        }

        function closeModal() {
            modal.classList.add("hidden");
        }

        function openDetailModal(nama, nisn, jenjang, kelas, berkas, status) {
            document.getElementById("detailNama").textContent = nama;
            document.getElementById("detailNISN").textContent = nisn;
            document.getElementById("detailJenjang").textContent = jenjang;
            document.getElementById("detailKelas").textContent = kelas;
            document.getElementById("detailBerkas").textContent = berkas;
            document.getElementById("detailStatus").textContent = status;
            detailModal.classList.remove("hidden");
        }

        function closeDetailModal() {
            detailModal.classList.add("hidden");
        }

        // Search Functionality
        function searchTable() {
            const searchInput = document.getElementById("searchInput").value.toLowerCase();
            const rows = document.querySelectorAll("#data-table-body tr");
            rows.forEach(row => {
                const nama = row.children[1].textContent.toLowerCase();
                const nisn = row.children[2].textContent.toLowerCase();
                if (nama.includes(searchInput) || nisn.includes(searchInput)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        // Filter Functionality
        function filterTable() {
            const filterValue = document.getElementById("filterSelect").value;
            const rows = document.querySelectorAll("#data-table-body tr");
            rows.forEach(row => {
                const status = row.querySelector(".status span").textContent;
                if (filterValue === "" || status === filterValue) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        document.getElementById("editForm").addEventListener("submit", function(e) {
            e.preventDefault();
            const newStatus = document.getElementById("status").value;
            const row = document.querySelector(`tr[data-id="${currentRowId}"]`);
            const statusCell = row.querySelector(".status span");
            if (newStatus === "Lolos") {
                statusCell.textContent = "Lolos";
                statusCell.className = "bg-green-500 text-white px-2 py-1 rounded text-sm";
            } else if (newStatus === "Tidak Lolos") {
                statusCell.textContent = "Tidak Lolos";
                statusCell.className = "bg-red-500 text-white px-2 py-1 rounded text-sm";
            }
            closeModal();
        });
    </script>
</x-layoute>
