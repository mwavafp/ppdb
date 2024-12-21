<x-layoute>
  <main class="flex-1 p-6">
    <!-- Header -->
    <header class="flex justify-between items-center bg-white p-4 rounded-xl mb-6">
      <h1 class="text-3xl font-semibold text-black">Pembagian Kelas</h1>
      <button class="bg-yellow-500 text-white px-5 py-2 rounded-lg shadow hover:bg-yellow-400 transition">
        <span>Fatwa Bawahsi</span>
      </button>
    </header>
<!-- Search and Filter Container -->
<div class="flex items-center justify-center mb-6 space-x-4">
  <!-- Search Input -->
  <div class="relative w-2/6">
    <input
      type="text"
      id="searchInput"
      class="w-full p-3 pl-10 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400"
      placeholder="Cari nama..."
      onkeyup="searchTable()"
    />
    <svg
      class="w-5 h-5 absolute left-3 top-3 text-gray-400"
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
      <path
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M15 17l5 5m-5 0l-5-5M12 3a9 9 0 1 0 9 9 9 9 0 0 0-9-9z"
      />
    </svg>
  </div>

  <!-- Filter Button -->
  <button
    id="openFilterPopup"
    class="bg-green-500 text-white px-6 py-2 rounded-full shadow hover:bg-green-400 transition"
  >
    FILTER
  </button>
</div>

<!-- Popup Modal -->
<div
  id="filterPopup"
  class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden"
>
  <!-- Modal Content -->
  <div class="bg-white p-6 rounded-lg shadow-lg w-96">
    <!-- Modal Header -->
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Filter</h2>

    <!-- Filter Form -->
    <div class="space-y-4">
      <!-- Filter by Status -->
      <div>
        <label for="filterStatus" class="block text-gray-600 font-medium mb-2">Status</label>
        <select
          id="filterStatus"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
        >
          <option value="">Semua Status</option>
          <option value="Lolos">Lolos</option>
          <option value="Tidak Lolos">Tidak Lolos</option>
          <option value="Belum Ditentukan">Belum Ditentukan</option>
        </select>
      </div>

      <!-- Filter by Sekolah -->
      <div>
        <label for="filterSekolah" class="block text-gray-600 font-medium mb-2">Sekolah</label>
        <select
          id="filterSekolah"
          class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
        >
          <option value="">Semua Unit</option>
          <option value="TK">TK</option>
          <option value="SD">SD</option>
          <option value="SMP">SMP</option>
          <option value="SMA">SMA</option>
          <option value="Madin">Madin</option>
          <option value="Pondok">Pondok</option>
        </select>
      </div>
    </div>

    <!-- Modal Footer -->
    <div class="flex justify-end space-x-2 mt-6">
      <button
        id="cancelFilter"
        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition"
      >
        Cancel
      </button>
      <button
        id="saveFilter"
        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-400 transition"
      >
        Save
      </button>
    </div>
  </div>
</div>

    <!-- Data Table -->
    <div class="mt-6 overflow-hidden bg-white shadow rounded-lg">
      <table class="w-full table-auto text-sm">
        <thead class="bg-gray-100">
          <tr>
            <th class="border px-4 py-2 text-center">No</th>
            <th class="border px-4 py-2 text-center">Nama</th>
            <th class="border px-4 py-2 text-center">Kelas</th>
            <th class="border px-4 py-2 text-center">Golongan</th>
            <th class="border px-4 py-2 text-center">Unit Pendidikan</th>
            <th class="border px-4 py-2 text-center">Status Calon</th>
            <th class="border px-4 py-2 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody id="data-table-body">
          @foreach($students as $index => $student)
            <tr class="hover:bg-gray-50 transition">
              <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
              <td class="border px-4 py-2 text-center">{{ $student->name }}</td>
              <td class="border px-4 py-2 text-center">{{ $student->kelas }}</td>
              <td class="border px-4 py-2 text-center">{{ $student->kls_identitas }}</td>
              <td class="border px-4 py-2 text-center">{{ $student->unt_pendidikan }}</td>
              <td class="border px-4 py-2 text-center">
                <span class="inline-block px-3 py-1 rounded-full text-white {{ $student->kls_status == 'Lolos' ? 'bg-green-500' : ($student->kls_status == 'Tidak Lolos' ? 'bg-red-500' : 'bg-yellow-500') }}">
                  {{ $student->kls_status }}
                </span>
              </td>
              <td class="border px-4 py-2 text-center flex justify-center space-x-2">
                <!-- Edit Button -->
                <button onclick="openModal('{{ $student->id_kelas }}', '{{ $student->name }}', '{{ $student->kelas }}', '{{ $student->kls_identitas }}', '{{ $student->unt_pendidikan }}', '{{ $student->kls_status }}')" class="bg-teal-600 text-white px-4 py-2 rounded-lg hover:bg-teal-500 transition">
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                  </svg>
                  Edit
                </button>
                <!-- Detail Button -->
                <button onclick="openDetailModal('{{ $student->name }}', '{{ $student->kelas }}', '{{ $student->kls_identitas }}', '{{ $student->unt_pendidikan }}', '{{ $student->kls_status }}')" class="bg-teal-600 text-white px-4 py-2 rounded-lg hover:bg-teal-500 transition">
                  <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12l9-4-9-4v8zm-6 0l-9 4 9 4V12z" />
                  </svg>
                  Detail
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
        <!-- Pesan jika kosong -->
        <tbody id="empty-message" class="hidden">
          <tr>
            <td colspan="7" class="text-center py-4 text-gray-500">Tidak ada data yang tersedia.</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>

  <!-- Edit Modal -->
  <div id="editModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex hidden items-center justify-center ">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">Edit Data</h2>
      <form>
        <div class="space-y-4">
          <div>
            <label for="nama" class="block text-gray-600 font-medium mb-2">Nama</label>
            <input type="text" id="nama" class="w-full p-3 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label for="kelas" class="block text-gray-600 font-medium mb-2">Kelas</label>
            <input type="text" id="kelas" class="w-full p-3 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label for="golongan" class="block text-gray-600 font-medium mb-2">Golongan</label>
            <input type="text" id="golongan" class="w-full p-3 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label for="unitPendidikan" class="block text-gray-600 font-medium mb-2">Unit Pendidikan</label>
            <input type="text" id="unitPendidikan" class="w-full p-3 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label for="status" class="block text-gray-600 font-medium mb-2">Status</label>
            <select id="status" class="w-full p-3 border border-gray-300 rounded-lg">
              <option value="Lolos">Lolos</option>
              <option value="Tidak Lolos">Tidak Lolos</option>
              <option value="Belum Ditentukan">Belum Ditentukan</option>
            </select>
          </div>
        </div>
        <div class="flex justify-end space-x-2 mt-6">
          <button type="button" onclick="closeModal()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">Cancel</button>
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-400 transition">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Detail Modal -->
  <div id="detailModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">Detail Data</h2>
      <div class="space-y-4">
        <div>
          <label class="block text-gray-600 font-medium mb-2">Nama</label>
          <p id="detailNama" class="text-gray-600"></p>
        </div>
        <div>
          <label class="block text-gray-600 font-medium mb-2">Kelas</label>
          <p id="detailKelas" class="text-gray-600"></p>
        </div>
        <div>
          <label class="block text-gray-600 font-medium mb-2">Golongan</label>
          <p id="detailGolongan" class="text-gray-600"></p>
        </div>
        <div>
          <label class="block text-gray-600 font-medium mb-2">Unit Pendidikan</label>
          <p id="detailUnitPendidikan" class="text-gray-600"></p>
        </div>
        <div>
          <label class="block text-gray-600 font-medium mb-2">Status</label>
          <p id="detailStatus" class="text-gray-600"></p>
        </div>
      </div>
      <div class="flex justify-end mt-6">
        <button onclick="closeDetailModal()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition">Close</button>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script>
    // Search function
function searchTable() {
  const input = document.getElementById('searchInput');
  const filter = input.value.toLowerCase();
  const rows = document.querySelectorAll('#data-table-body tr');
  let emptyMessage = document.getElementById('empty-message');
  let found = false;

  rows.forEach(row => {
    const name = row.getElementsByTagName('td')[1].textContent.toLowerCase();
    if (name.indexOf(filter) > -1) {
      row.style.display = '';
      found = true;
    } else {
      row.style.display = 'none';
    }
  });

  emptyMessage.classList.toggle('hidden', found);
}

// Filter function
function applyFilter() {
  const statusFilter = document.getElementById('filterStatus').value;
  const unitFilter = document.getElementById('filterSekolah').value;
  const rows = document.querySelectorAll('#data-table-body tr');
  let emptyMessage = document.getElementById('empty-message');
  let found = false;

  rows.forEach(row => {
    const status = row.getElementsByTagName('td')[5].textContent.trim();
    const unit = row.getElementsByTagName('td')[4].textContent.trim();

    let matchesStatus = !statusFilter || status === statusFilter;
    let matchesUnit = !unitFilter || unit === unitFilter;

    if (matchesStatus && matchesUnit) {
      row.style.display = '';
      found = true;
    } else {
      row.style.display = 'none';
    }
  });

  emptyMessage.classList.toggle('hidden', found);
}

    // Open Edit Modal
    function openModal(id, name, kelas, golongan, unitPendidikan, status) {
      document.getElementById('nama').value = name;
      document.getElementById('kelas').value = kelas;
      document.getElementById('golongan').value = golongan;
      document.getElementById('unitPendidikan').value = unitPendidikan;
      document.getElementById('status').value = status;
      document.getElementById('editModal').classList.remove('hidden');
    }

    // Close Edit Modal
    function closeModal() {
      document.getElementById('editModal').classList.add('hidden');
    }

    // Open Detail Modal
    function openDetailModal(name, kelas, golongan, unitPendidikan, status) {
      document.getElementById('detailNama').textContent = name;
      document.getElementById('detailKelas').textContent = kelas;
      document.getElementById('detailGolongan').textContent = golongan;
      document.getElementById('detailUnitPendidikan').textContent = unitPendidikan;
      document.getElementById('detailStatus').textContent = status;
      document.getElementById('detailModal').classList.remove('hidden');
    }

    // Close Detail Modal
    function closeDetailModal() {
      document.getElementById('detailModal').classList.add('hidden');
    }

    // Table Search Function
    function searchTable() {
      const input = document.getElementById("searchInput");
      const filter = input.value.toUpperCase();
      const table = document.querySelector("table");
      const rows = table.getElementsByTagName("tr");
      let emptyMessage = document.getElementById("empty-message");

      let found = false;
      for (let i = 1; i < rows.length; i++) {
        let cells = rows[i].getElementsByTagName("td");
        if (cells) {
          let name = cells[1].textContent.toUpperCase();
          if (name.indexOf(filter) > -1) {
            rows[i].style.display = "";
            found = true;
          } else {
            rows[i].style.display = "none";
          }
        }
      }
      
      if (found) {
        emptyMessage.classList.add('hidden');
      } else {
        emptyMessage.classList.remove('hidden');
      }
    }

    const openFilterPopup = document.getElementById('openFilterPopup');
    const filterPopup = document.getElementById('filterPopup');
    const cancelFilter = document.getElementById('cancelFilter');
    const saveFilter = document.getElementById('saveFilter');

    openFilterPopup.addEventListener('click', () => {
    filterPopup.classList.remove('hidden');
    });

    cancelFilter.addEventListener('click', () => {
    filterPopup.classList.add('hidden');
    });

    saveFilter.addEventListener('click', () => {
    applyFilter();
    filterPopup.classList.add('hidden');
    });
    </script>

</x-layoute>
