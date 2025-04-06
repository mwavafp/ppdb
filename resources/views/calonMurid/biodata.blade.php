<x-layout-login>
    <x-slot:title>{{ $title }}</x-slot:title>

    <x-tahapan class="mx-auto"></x-tahapan>

    <div class="flex flex-col lg:flex-row gap-6 ">
        <!-- Foto -->
        <div class="lg:w-1/4 w-full">
            <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center justify-center">
                <img id="profile-photo" src="https://via.placeholder.com/200" alt="Foto Riwayat Pendidikan"
                    class="rounded-lg border border-gray-300 w-full h-auto object-cover">
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
                <div class="flex flex-wrap border-b border-gray-300">
                    <button onclick="showTab(0)" class="tab-btn px-4 py-2 focus:outline-none border-b-2"
                        id="tab-0">Data Siswa</button>
                    <button onclick="showTab(1)" class="tab-btn px-4 py-2 focus:outline-none" id="tab-1">Data
                        Wali</button>
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
                                        <td class="border px-4 py-2">
                                            <input type="text" class="editable-field w-full"
                                                value="{{ $all_data->name }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tempat Lahir Siswa</td>
                                        <td class="border px-4 py-2">
                                            <input type="text" class="editable-field w-full"
                                                value="{{ $all_data->tmpt_lahir }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tanggal Lahir Siswa</td>
                                        <td class="border px-4 py-2">
                                            <input type="date" class="editable-field w-full"
                                                value="{{ $all_data->tgl_lahir }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Alamat Siswa</td>
                                        <td class="border px-4 py-2">
                                            <input type="text" class="editable-field w-full"
                                                value="{{ $all_data->alamat }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Asal Sekolah</td>
                                        <td class="border px-4 py-2">
                                            <input type="text" class="editable-field w-full"
                                                value="{{ $all_data->asl_sekolah }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">NISN</td>
                                        <td class="border px-4 py-2">
                                            <input type="number" class="editable-field w-full"
                                                value="{{ $all_data->nisn }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tab 2 -->
                    <div class="tab-panel hidden" id="panel-1">
                        <div class="">
                            <table class="table-auto w-full border border-gray-300">
                                <tbody>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Nama Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field w-full"
                                                value="{{ $all_data->nm_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">No KK</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field w-full"
                                                value="{{ $all_data->nmr_kk }}"></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">NIK Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field w-full"
                                                value="{{ $all_data->nik_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tempat Lahir Ayah</td>
                                        <td class="border px-4 py-2"><input type="text" class="editable-field w-full"
                                                value="{{ $all_data->tmpt_lhr_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tanggal Lahir Ayah</td>
                                        <td class="border px-4 py-2"><input type="date"
                                                class="editable-field w-full" value="{{ $all_data->tgl_lhr_ayah }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Alamat Ayah</td>
                                        <td class="border px-4 py-2"><input type="text"
                                                class="editable-field w-full" value="{{ $all_data->almt_ayah }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">No WA Ayah</td>
                                        <td class="border px-4 py-2"><input type="text"
                                                class="editable-field w-full" value="{{ $all_data->nmr_ayah_wa }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Pekerjaan Ayah</td>
                                        <td class="border px-4 py-2"><input type="text"
                                                class="editable-field w-full"
                                                value="{{ $all_data->pekerjaan_ayah }}"></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Nama Ibu</td>
                                        <td class="border px-4 py-2"><input type="text"
                                                class="editable-field w-full" value="{{ $all_data->nm_ibu }}"></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">NIK Ibu</td>
                                        <td class="border px-4 py-2"><input type="text"
                                                class="editable-field w-full" value="{{ $all_data->nik_ibu }}"></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tempat Lahir Ibu</td>
                                        <td class="border px-4 py-2"><input type="text"
                                                class="editable-field w-full" value="{{ $all_data->tmpt_lhr_ibu }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Tanggal Lahir Ibu</td>
                                        <td class="border px-4 py-2"><input type="date"
                                                class="editable-field w-full" value="{{ $all_data->tgl_lhr_ibu }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Alamat Ibu</td>
                                        <td class="border px-4 py-2"><input type="text"
                                                class="editable-field w-full" value="{{ $all_data->almt_ibu }}"></td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">No WA Ibu</td>
                                        <td class="border px-4 py-2"><input type="text"
                                                class="editable-field w-full" value="{{ $all_data->nmr_ibu_wa }}">
                                        </td>
                                    </tr>
                                    <tr class="odd:bg-white even:bg-gray-50">
                                        <td class="border px-4 py-2 font-bold">Pekerjaan Ibu</td>
                                        <td class="border px-4 py-2"><input type="text"
                                                class="editable-field w-full" value="{{ $all_data->pekerjaan_ibu }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @if (session('pdf_download'))
        <script>
            //pembuatan pdf otomatis
            document.addEventListener('DOMContentLoaded', function() {
                const pdfData = "{{ session('pdf_download.content') }}";
                const filename = "{{ session('pdf_download.filename') }}";

                const blob = b64toBlob(pdfData, 'application/pdf');
                const blobUrl = URL.createObjectURL(blob);

                const link = document.createElement('a');
                link.href = blobUrl;
                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                URL.revokeObjectURL(blobUrl);
            });

            // Helper untuk convert base64 ke blob
            function b64toBlob(b64Data, contentType = '', sliceSize = 512) {
                const byteCharacters = atob(b64Data);
                const byteArrays = [];

                for (let offset = 0; offset < byteCharacters.length; offset += sliceSize) {
                    const slice = byteCharacters.slice(offset, offset + sliceSize);
                    const byteNumbers = new Array(slice.length);
                    for (let i = 0; i < slice.length; i++) {
                        byteNumbers[i] = slice.charCodeAt(i);
                    }
                    const byteArray = new Uint8Array(byteNumbers);
                    byteArrays.push(byteArray);
                }

                return new Blob(byteArrays, {
                    type: contentType
                });
            }
        </script>
    @endif


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

        document.addEventListener('DOMContentLoaded', () => {
            showTab(0);
        });

        function toggleEditMode() {
            const isEditing = document.body.classList.toggle('editing');
            const editButton = document.getElementById('edit-btn');

            editButton.textContent = isEditing ? "Simpan" : "Edit";
            document.querySelectorAll('.editable-field').forEach(input => {
                input.disabled = !isEditing;
                input.parentElement.classList.toggle('bg-yellow-100', isEditing);
            });
        }
    </script>

    <style>
        .editing .editable-field:enabled {
            background-color: #fffbcc;
        }
    </style>
</x-layout-login>
