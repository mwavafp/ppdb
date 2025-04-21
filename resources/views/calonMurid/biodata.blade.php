<x-layout-login>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-tahapan class="mx-auto"></x-tahapan>

    <form method="POST" action="{{ route('biodata.update') }}">
        @csrf

        <div class="flex flex-col lg:flex-row gap-6 ">
            <!-- Foto -->
            <div class="lg:w-1/4 w-full">
                <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center justify-center">
                    <img id="profile-photo" src="https://via.placeholder.com/200" alt="{{$all_data->nama}}"
                        class="rounded-lg border border-gray-300 w-full h-auto object-cover">
                    <input id="profile-photo-input" type="file" class="hidden mt-2" accept="image/*">
                    <a href="https://wa.me/+62{{$all_data->cp}}" target="_blank" class="whatsapp-button">
                        <button type="button" class="whatsapp-btn">Chat with us on WhatsApp</button>
                    </a>
                    {{-- <h2>{{$all_data->cp}}</h2> --}}
                </div>
            </div>

            <!-- Data Pendaftar -->
            <div class="lg:w-3/4 w-full">
                <div class="bg-white shadow rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4 p-6">Data Pendaftar</h3>

                    <!-- Tombol Edit & Simpan -->
                    <div class="flex items-center ml-10 mb-4">
                        <button type="button" id="edit-btn" onclick="toggleEditMode()"
                            class="px-4 py-2 bg-green-500 text-white rounded-md">Edit</button>
                        <button type="submit" id="save-btn"
                            class="ml-4 px-4 py-2 bg-blue-500 text-white rounded-md hidden">Simpan</button>
                    </div>

                    <!-- Tab Navigation -->
                    <div class="flex flex-wrap border-b border-gray-300">
                        <button onclick="showTab(0)" type="button" class="tab-btn px-4 py-2 focus:outline-none border-b-2"
                            id="tab-0">Data Siswa</button>
                        <button onclick="showTab(1)" type="button" class="tab-btn px-4 py-2 focus:outline-none"
                            id="tab-1">Data Wali</button>
                    </div>

                    <!-- Tab Content -->
                    <div id="tab-content" class="p-6 w-full overflow-auto">
                        <!-- Tab 1 -->
                        <div class="tab-panel h-auto" id="panel-0">
                            <div class="overflow-x-auto">
                                <table class="table-auto w-full border border-gray-300">
                                    <tbody>
                                        <tr class="odd:bg-white even:bg-gray-50">
                                            <td class="border px-4 py-2 font-bold">Nama Lengkap</td>
                                            <td class="border px-4 py-2"><input type="text" name="name"
                                                    class="editable-field w-full" value="{{ $all_data->name }}"
                                                    disabled></td>
                                        </tr>
                                        <tr class="odd:bg-white even:bg-gray-50">
                                            <td class="border px-4 py-2 font-bold">Tempat Lahir Siswa</td>
                                            <td class="border px-4 py-2"><input type="text" name="tmpt_lahir"
                                                    class="editable-field w-full" value="{{ $all_data->tmpt_lahir }}"
                                                    disabled></td>
                                        </tr>
                                        <tr class="odd:bg-white even:bg-gray-50">
                                            <td class="border px-4 py-2 font-bold">Tanggal Lahir Siswa</td>
                                            <td class="border px-4 py-2"><input type="date" name="tgl_lahir"
                                                    class="editable-field w-full" value="{{ $all_data->tgl_lahir }}"
                                                    disabled></td>
                                        </tr>
                                        <tr class="odd:bg-white even:bg-gray-50">
                                            <td class="border px-4 py-2 font-bold">Alamat Siswa</td>
                                            <td class="border px-4 py-2"><input type="text" name="alamat"
                                                    class="editable-field w-full" value="{{ $all_data->alamat }}"
                                                    disabled></td>
                                        </tr>
                                        <tr class="odd:bg-white even:bg-gray-50">
                                            <td class="border px-4 py-2 font-bold">Asal Sekolah</td>
                                            <td class="border px-4 py-2"><input type="text" name="asl_sekolah"
                                                    class="editable-field w-full" value="{{ $all_data->asl_sekolah }}"
                                                    disabled></td>
                                        </tr>
                                        <tr class="odd:bg-white even:bg-gray-50">
                                            <td class="border px-4 py-2 font-bold">NISN</td>
                                            <td class="border px-4 py-2"><input type="number" name="nisn"
                                                    class="editable-field w-full" value="{{ $all_data->nisn }}"
                                                    disabled></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Tab 2 -->
                        <div class="tab-panel hidden" id="panel-1">
                            <table class="table-auto w-full border border-gray-300">
                                <tbody>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Nama Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" name="nm_ayah"
                                                class="editable-field w-full" value="{{ $all_data->nm_ayah }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">No KK</td>
                                        <td class="border px-4 py-2"><input type="text" name="nmr_kk"
                                                class="editable-field w-full" value="{{ $all_data->nmr_kk }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">NIK Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" name="nik_ayah"
                                                class="editable-field w-full" value="{{ $all_data->nik_ayah }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tempat Lahir Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" name="tmpt_lhr_ayah"
                                                class="editable-field w-full" value="{{ $all_data->tmpt_lhr_ayah }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tanggal Lahir Ayah</td>
                                        <td class="border px-4 py-2"><input type="date" name="tgl_lhr_ayah"
                                                class="editable-field w-full" value="{{ $all_data->tgl_lhr_ayah }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Alamat Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" name="almt_ayah"
                                                class="editable-field w-full" value="{{ $all_data->almt_ayah }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">No WA Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" name="nmr_ayah_wa"
                                                class="editable-field w-full" value="{{ $all_data->nmr_ayah_wa }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Pekerjaan Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" name="pekerjaan_ayah"
                                                class="editable-field w-full" value="{{ $all_data->pekerjaan_ayah }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Nama Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" name="nm_ibu"
                                                class="editable-field w-full" value="{{ $all_data->nm_ibu }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">NIK Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" name="nik_ibu"
                                                class="editable-field w-full" value="{{ $all_data->nik_ibu }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tempat Lahir Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" name="tmpt_lhr_ibu"
                                                class="editable-field w-full" value="{{ $all_data->tmpt_lhr_ibu }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tanggal Lahir Ibu</td>
                                        <td class="border px-4 py-2"><input type="date" name="tgl_lhr_ibu"
                                                class="editable-field w-full" value="{{ $all_data->tgl_lhr_ibu }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Alamat Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" name="almt_ibu"
                                                class="editable-field w-full" value="{{ $all_data->almt_ibu }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">No WA Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" name="nmr_ibu_wa"
                                                class="editable-field w-full" value="{{ $all_data->nmr_ibu_wa }}"
                                                disabled></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Pekerjaan Ibu</td>
                                        <td class="border px-4 py-2"><input type="text" name="pekerjaan_ibu"
                                                class="editable-field w-full" value="{{ $all_data->pekerjaan_ibu }}"
                                                disabled></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <script>
        function showTab(index) {
            const tabs = document.querySelectorAll('.tab-btn');
            const panels = document.querySelectorAll('.tab-panel');

            tabs.forEach((tab, i) => {
                tab.classList.toggle('border-b-2', i === index);
                tab.classList.toggle('border-blue-500', i === index);
                tab.classList.toggle('text-blue-500', i === index);
            });

            panels.forEach((panel, i) => {
                panel.classList.toggle('hidden', i !== index);
            });
        }

        function toggleEditMode() {
            const isEditing = document.body.classList.toggle('editing');
            const editButton = document.getElementById('edit-btn');
            const saveButton = document.getElementById('save-btn');

            editButton.classList.toggle('hidden', isEditing);
            saveButton.classList.toggle('hidden', !isEditing);

            document.querySelectorAll('.editable-field').forEach(input => {
                input.disabled = !isEditing;
                input.parentElement.classList.toggle('bg-yellow-100', isEditing);
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            showTab(0);
        });
    </script>

    <style>
        .editing .editable-field:enabled {
            background-color: #fffbcc;
        }
    </style>
</x-layout-login>
