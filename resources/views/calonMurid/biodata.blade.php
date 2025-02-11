<x-layout-login>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-tahapan></x-tahapan>

    <!-- Tabel Informasi dan Foto Samping -->
    <div class="flex flex-col lg:flex-row gap-6 ">

        <!-- Foto -->
        <div class="lg:w-1/4 w-full">
            <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center justify-center">
                <img id="profile-photo" src="https://via.placeholder.com/200" alt="Foto Riwayat Pendidikan"
                    class="rounded-lg border border-gray-300">
                <!-- Foto input hanya muncul dalam mode edit -->
                <input id="profile-photo-input" type="file" class="hidden mt-2" accept="image/*">
            </div>
        </div>

        <!-- Data Pendaftar -->
        <div class="lg:w-3/4 w-full">
            <div class="bg-white shadow rounded-lg">
                <h3 class="text-lg font-semibold text-gray-700 mb-4 p-6">Data Pendaftar</h3>

                <!-- Tombol Edit -->
                <div class="flex item-center">
                    <button id="edit-btn" onclick="toggleEditMode()"
                        class="px-4 py-2 ml-10 bg-green-500 text-white rounded-md mb-4">Edit</button>
                </div>


                <!-- Tab Navigation -->
                <div class="flex border-b border-gray-300">
                    <button onclick="showTab(0)" class="tab-btn px-4 py-2 focus:outline-none border-b-2"
                        id="tab-0">Data Siswa</button>
                    <button onclick="showTab(1)" class="tab-btn px-4 py-2 focus:outline-none" id="tab-1">Data
                        Wali</button>
                </div>

                <!-- Tab Content -->
                <div id="tab-content" class="p-6 w-3/4">

                    <!-- Tab 1 -->
                    <div class="tab-panel h-[100vh]" id="panel-0">
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full border border-gray-300">
                                <tbody>
                                    <tr class="odd:bg-white-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Nama Lengkap</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->name }}"></td>
                                    </tr>
                                    {{-- <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">NIK</td>
                                        <td class="border px-4 py-2"><input type="number" class="editable-field"
                                                value="123456789"></td>
                                    </tr> --}}
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Tempat Lahir Siswa</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->tmpt_lahir }}"></td>
                                    </tr>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Tanggal Lahir Siswa</td>
                                        <td class="border px-4 py-2"><input type="date" class="editable-field"
                                                value="{{ $all_data->tgl_lahir }}"></td>
                                    </tr>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Alamat Siswa</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->alamat }}"></td>
                                    </tr>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Asal Sekolah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->asl_sekolah }}"></td>
                                    </tr>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">NISN</td>
                                        <td class="border px-4 py-2"><input type="number" class="editable-field"
                                                value="{{ $all_data->nisn }}"></td>
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
                                    <tr class="odd:bg-white-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Nama Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->nm_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">No KK</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->nmr_kk }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">NIK Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->nik_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Tempat Lahir Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->tmpt_lhr_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Tanggal Lahir Ayah</td>
                                        <td class="border px-4 py-2"><input type="date" class="editable-field"
                                                value="{{ $all_data->tgl_lhr_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Alamat Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->almt_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">No WA Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->nmr_ayah_wa }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Pekerjaan Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->pekerjaan_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Nama Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->nm_ibu }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">NIK Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->nik_ibu }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Tempat Lahir Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->tmpt_lhr_ibu }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Tanggal Lahir Ibu</td>
                                        <td class="border px-4 py-2"><input type="date" class="editable-field"
                                                value="{{ $all_data->tgl_lhr_ibu }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Alamat Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->almt_ibu }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">No WA Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->nmr_ibu_wa }}"></td>
                                    </tr>
                                    <tr class="odd:bg-gray-100 even:bg-white">
                                        <td class="border px-4 py-2 font-bold">Pekerjaan Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field"
                                                value="{{ $all_data->pekerjaan_ibu }}"></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function showTab(index) {

            const tabs = document.querySelectorAll('.tab-btn');
            const panels = document.querySelectorAll('.tab-panel');

            tabs.forEach((tab, i) => {
                if (i === index) {
                    tab.classList.add('border-b-2', 'border-blue-500', 'text-blue-500');
                } else {
                    tab.classList.remove('border-b-2', 'border-blue-500', 'text-blue-500');
                }
            });

            panels.forEach((panel, i) => {
                if (i === index) {
                    panel.classList.remove('hidden');
                } else {
                    panel.classList.add('hidden');
                }
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            showTab(0);
        });

        function toggleEditMode() {
            const isEditing = document.body.classList.toggle('editing');
            const editButton = document.getElementById('edit-btn');

            if (isEditing) {
                editButton.textContent = "Simpan";
                document.querySelectorAll('.editable-field').forEach(input => {
                    input.disabled = false;
                    input.parentElement.classList.add('bg-yellow-100');
                });

            } else {
                editButton.textContent = "Edit";
                document.querySelectorAll('.editable-field').forEach(input => {
                    input.disabled = true;
                    input.parentElement.classList.remove('bg-yellow-100');
                });

            }
        }
    </script>

    <style>
        /* Menambahkan kelas CSS untuk latar belakang tabel kuning saat edit mode */
        .editing .editable-field:enabled {
            background-color: #fffbcc;
            /* Kuning muda */
        }
    </style>
</x-layout-login>
