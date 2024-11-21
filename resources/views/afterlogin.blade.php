<x-layout>
    <x-slot:title>{{$title}}</x-slot:title>
    <!--taruh kode disini-->

    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold mb-4">Selamat Datang</h2>

        <!-- Langkah-langkah Pendaftaran -->
        <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-5">
            @foreach ([ 
                'Pengisian Biodata', 
                'Upload Berkas', 
                'Seleksi', 
                'Pengumuman', 
                'Daftar Ulang', 
                'Verifikasi Data' 
            ] as $step)
            <!-- Nanti diisi menyesuaikan -->
            <div class="bg-blue-50 p-4 rounded-lg shadow hover:bg-blue-100 ">
                <h3 class="font-semibold">{{ $loop->iteration }}. {{ $step }}</h3>
                <p class="text-sm text-gray-600">Selesai: {{ now()->toDateString() }}</p>
            </div>
            @endforeach
        </div>

        <!-- Tabel Informasi dan Foto Samping -->
        <div class="flex flex-col lg:flex-row gap-6">

            <!-- Foto bagian kiri -->
            <div class="lg:w-1/4 w-full">
                <div class="bg-white shadow rounded-lg p-6 flex items-center justify-center">
                    <img id="profile-photo" src="https://via.placeholder.com/200" alt="Foto Riwayat Pendidikan" class="rounded-lg border border-gray-300">
                    <!-- Foto input hanya muncul dalam mode edit -->
                    <input id="profile-photo-input" type="file" class="hidden mt-2" accept="image/*">
                </div>
            </div>

            <!-- Data Pendaftar bagian kanan -->
            <div class="lg:w-3/4 w-full">
                <div class="bg-white shadow rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4 p-6">Data Pendaftar</h3>

                    <!-- Tombol Edit -->
                    <button id="edit-btn" onclick="toggleEditMode()" class="px-4 py-2 bg-green-500 text-black rounded-md mb-4">Edit</button>

                    <!-- Tab Navigation -->
                    <div class="flex border-b border-gray-300">
                        <button onclick="showTab(0)" class="tab-btn px-4 py-2 focus:outline-none border-b-2" id="tab-0">Data Siswa</button>
                        <button onclick="showTab(1)" class="tab-btn px-4 py-2 focus:outline-none" id="tab-1">Data Wali</button>
                        <button onclick="showTab(2)" class="tab-btn px-4 py-2 focus:outline-none" id="tab-2">Data lain</button>
                    </div>

                    <!-- Tab Content -->
                    <div id="tab-content" class="p-6">
                        
                        <!-- Tab 1 -->
                        <div class="tab-panel" id="panel-0">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full border border-gray-300">
                                    <tbody>
                                        <tr class="odd:bg-gray-100 even:bg-white">
                                            <td class="border px-4 py-2 font-bold">Apapun</td>
                                            <td class="border px-4 py-2"><input type="text" class="editable-field" value="Isien rek"></td>
                                        </tr>
                                        <tr class="odd:bg-gray-100 even:bg-white">
                                            <td class="border px-4 py-2 font-bold">Yom a</td>
                                            <td class="border px-4 py-2"><input type="text" class="editable-field" value="Oi"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tab 2 -->
                        <div class="tab-panel hidden" id="panel-1">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full border border-gray-300">
                                    <tbody>
                                        <tr class="odd:bg-gray-100 even:bg-white">
                                            <td class="border px-4 py-2 font-bold">Apapun</td>
                                            <td class="border px-4 py-2"><input type="text" class="editable-field" value="Isien rek"></td>
                                        </tr>
                                        <tr class="odd:bg-gray-100 even:bg-white">
                                            <td class="border px-4 py-2 font-bold">Yom i</td>
                                            <td class="border px-4 py-2"><input type="text" class="editable-field" value="Oi"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tab 3 -->
                        <div class="tab-panel hidden" id="panel-2">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full border border-gray-300">
                                    <tbody>
                                        <tr class="odd:bg-gray-100 even:bg-white">
                                            <td class="border px-4 py-2 font-bold">Apapun</td>
                                            <td class="border px-4 py-2"><input type="text" class="editable-field" value="Isien rek"></td>
                                        </tr>
                                        <tr class="odd:bg-gray-100 even:bg-white">
                                            <td class="border px-4 py-2 font-bold">Yom o</td>
                                            <td class="border px-4 py-2"><input type="text" class="editable-field" value="Oi"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tab switching logic
        function showTab(index) {
            // Get all tabs and panels
            const tabs = document.querySelectorAll('.tab-btn');
            const panels = document.querySelectorAll('.tab-panel');

            // Loop through tabs to reset styles
            tabs.forEach((tab, i) => {
                if (i === index) {
                    tab.classList.add('border-b-2', 'border-blue-500', 'text-blue-500');
                } else {
                    tab.classList.remove('border-b-2', 'border-blue-500', 'text-blue-500');
                }
            });

            // Show/Hide panels
            panels.forEach((panel, i) => {
                if (i === index) {
                    panel.classList.remove('hidden');
                } else {
                    panel.classList.add('hidden');
                }
            });
        }

        // Show the first tab by default
        document.addEventListener('DOMContentLoaded', () => {
            showTab(0);
        });

        // Toggle edit mode
        function toggleEditMode() {
            const isEditing = document.body.classList.toggle('editing');
            const editButton = document.getElementById('edit-btn');
            
            // Toggle button text
            if (isEditing) {
                editButton.textContent = "Simpan";
                document.querySelectorAll('.editable-field').forEach(input => input.disabled = false);
                document.getElementById('profile-photo-input').classList.remove('hidden');
            } else {
                editButton.textContent = "Edit";
                document.querySelectorAll('.editable-field').forEach(input => input.disabled = true);
                document.getElementById('profile-photo-input').classList.add('hidden');
            }
        }

        // Optionally, handle file input for photo
        document.getElementById('profile-photo-input').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-photo').src = e.target.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
</x-layout>
