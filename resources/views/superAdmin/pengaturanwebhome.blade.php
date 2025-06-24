<x-layoute>
    <x-slot:title>Pengaturan Web Home</x-slot:title>

    <title>Pengaturan Web Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <body class="bg-white text-gray-900 min-h-screen overflow-x-hidden">

        <!-- Main Container dengan max-width dan padding responsif -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Header Section -->
            <header class="mb-10">
                <div class="container flex flex-col">
                    <h1 class="text-3xl font-bold break-words">Pengaturan Website</h1>
                    <p class="text-sm text-gray-500 mt-1">Halaman Home</p>
                </div>
            </header>

            <!-- Form Section -->
            <div class="bg-white px-4 sm:px-7 pb-7 pt-1 rounded-lg shadow-lg w-full">
                <form method="POST" action="{{ route('pengaturanhome-update') }}" enctype="multipart/form-data"
                    class="space-y-8 w-full">
                    @csrf
                    <input type="hidden" name="id_yayasan" value="{{ $data->id_yayasan }}">
                    <div id="banner  mb-8">
                        <div class="w-full">

                            <label for="deskripsi" class="block text-xl font-semibold mb-2 break-words">Foto
                                Banner</label>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang</p>
                                <img class="rounded-xl" src="{{ asset('storage/' . $data->image_banner) }}"
                                    alt="" width="500">
                            </div>
                            <div>
                                <p>Edit Photo</p>
                                <input type="file" name="image_banner" id=""
                                    class="block w-full text-sm text-gray-500
           file:mr-4 file:py-2 file:px-4
           file:rounded-sm file:border-0
           file:text-sm file:font-semibold
           file:bg-[oklch(62.7%_0.194_149.214)] file:text-white
           hover:file:bg-green-400">
                            </div>

                        </div>
                    </div>
                    <!-- Deskripsi -->
                    <div class="w-full">
                        <label for="deskripsi" class="block text-xl font-semibold mb-2 break-words">Deskripsi</label>
                        <div class="text-sm text-gray-500 mb-1">
                            <span id="deskripsi-count">0</span>/1500 karakter
                        </div>
                        <div class="w-full overflow-hidden">
                            <textarea id="deskripsi" name="deskripsi" class="w-full">{{ $data->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div id="deskripsi  mb-8">
                        <div class="w-full">

                            <label for="deskripsi" class="block text-xl font-semibold mb-2 break-words">Foto
                                Selamat Datang</label>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang</p>
                                <img class="rounded-xl" src="{{ asset('storage/' . $data->image_selamat_datang) }}"
                                    alt="" width="500">
                            </div>
                            <div>
                                <p>Edit Photo</p>
                                <input type="file" name="image_selamat_datang" id=""
                                    class="block w-full text-sm text-gray-500
           file:mr-4 file:py-2 file:px-4
           file:rounded-sm file:border-0
           file:text-sm file:font-semibold
           file:bg-[oklch(62.7%_0.194_149.214)] file:text-white
           hover:file:bg-green-400">
                            </div>

                        </div>
                    </div>

                    <!-- Keunggulan -->
                    <div class="w-full">
                        <label for="keunggulan" class="block text-xl font-semibold mb-2 break-words">Keunggulan</label>
                        <div class="text-sm text-gray-500 mb-1">
                            <span id="keunggulan-count">0</span>/1500 karakter
                        </div>
                        <div class="w-full overflow-hidden">
                            <textarea id="keunggulan" name="keunggulan" class="w-full">{{ $data->keunggulan }}</textarea>
                        </div>
                    </div>
                    <div id="keunggulan  mb-8">
                        <div class="w-full">

                            <label for="deskripsi" class="block text-xl font-semibold mb-2 break-words">Foto
                                Keunggulan</label>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang</p>
                                <img class="rounded-xl" src="{{ asset('storage/' . $data->image_keunggulan) }}"
                                    alt="" width="500">
                            </div>
                            <div>
                                <p>Edit Photo</p>
                                <input type="file" name="image_keunggulan" id=""
                                    class="block w-full text-sm text-gray-500
           file:mr-4 file:py-2 file:px-4
           file:rounded-sm file:border-0
           file:text-sm file:font-semibold
           file:bg-[oklch(62.7%_0.194_149.214)] file:text-white
           hover:file:bg-green-400">
                            </div>

                        </div>
                    </div>

                    <!-- Visi Misi -->
                    <div class="w-full">
                        <label for="visi_misi" class="block text-xl font-semibold mb-2 break-words">Visi dan
                            Misi</label>
                        <div class="text-sm text-gray-500 mb-1">
                            <span id="visi_misi-count">0</span>/1500 karakter
                        </div>
                        <div class="w-full overflow-hidden">
                            <textarea id="visi_misi" name="visi_misi" class="w-full">{{ $data->visi_misi }}</textarea>
                        </div>
                    </div>
                    <div id="deskripsi  mb-8">
                        <div class="w-full">

                            <label for="deskripsi" class="block text-xl font-semibold mb-2 break-words">Foto
                                Visi & Misi</label>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang</p>
                                <img class="rounded-xl" src="{{ asset('storage/' . $data->image_visi) }}" alt=""
                                    width="500">
                            </div>
                            <div>
                                <p>Edit Photo</p>
                                <input type="file" name="image_visi" id=""
                                    class="block w-full text-sm text-gray-500
           file:mr-4 file:py-2 file:px-4
           file:rounded-sm file:border-0
           file:text-sm file:font-semibold
           file:bg-[oklch(62.7%_0.194_149.214)] file:text-white
           hover:file:bg-green-400">
                            </div>

                        </div>
                    </div>

                    <!-- Alasan Memilih 1-6 -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-full">
                        @for ($i = 1; $i <= 6; $i++)
                            <div class="w-full min-w-0">
                                <label for="alasan_memilih_{{ $i }}"
                                    class="block text-xl font-semibold mb-2 break-words">Alasan Memilih
                                    {{ $i }}</label>
                                <div class="text-sm text-gray-500 mb-1">
                                    <span id="alasan_memilih_{{ $i }}-count">0</span>/1500 karakter
                                </div>
                                <div class="w-full overflow-hidden">
                                    <textarea id="alasan_memilih_{{ $i }}" name="alasan_memilih_{{ $i }}" class="w-full">{{ $data->{'alasan_memilih_' . $i} }}</textarea>
                                </div>
                            </div>
                        @endfor
                    </div>

                    <!-- Alur Pendaftaran 1-5 -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 w-full">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="w-full min-w-0">
                                <label for="alur_pendaftaran_{{ $i }}"
                                    class="block text-xl font-semibold mb-2 break-words">Alur Pendaftaran
                                    {{ $i }}</label>
                                <div class="text-sm text-gray-500 mb-1">
                                    <span id="alur_pendaftaran_{{ $i }}-count">0</span>/1500 karakter
                                </div>
                                <div class="w-full overflow-hidden">
                                    <textarea id="alur_pendaftaran_{{ $i }}" name="alur_pendaftaran_{{ $i }}" class="w-full">{{ $data->{'alur_pendaftaran_' . $i} }}</textarea>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <div id="daftar  mb-8">
                        <div class="w-full">

                            <label for="deskripsi" class="block text-xl font-semibold mb-2 break-words">Foto
                                Daftar</label>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang</p>
                                <img class="rounded-xl" src="{{ asset('storage/' . $data->image_daftar) }}"
                                    alt="" width="500">
                            </div>
                            <div>
                                <p>Edit Photo</p>
                                <input type="file" name="image_daftar" id=""
                                    class="block w-full text-sm text-gray-500
           file:mr-4 file:py-2 file:px-4
           file:rounded-sm file:border-0
           file:text-sm file:font-semibold
           file:bg-[oklch(62.7%_0.194_149.214)] file:text-white
           hover:file:bg-green-400">
                            </div>

                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center w-full">
                        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                            <a href="{{ route('pengaturanpage') }}"
                                class="bg-red-500 text-white py-3 px-8 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-gray-500 w-full sm:w-auto text-center">
                                Batal
                            </a>
                            <button type="submit"
                                class="bg-blue-500 text-white py-3 px-8 rounded-lg shadow-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-500 w-full sm:w-auto">
                                Simpan Pengaturan
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>

        <!-- Summernote Init Script -->
        <script>
            $(document).ready(function() {
                // Konfigurasi maksimal karakter untuk semua field
                const maxLength = 1500;

                const ids = [
                    'deskripsi', 'keunggulan', 'visi_misi',
                    'alasan_memilih_1', 'alasan_memilih_2', 'alasan_memilih_3', 'alasan_memilih_4',
                    'alasan_memilih_5', 'alasan_memilih_6',
                    'alur_pendaftaran_1', 'alur_pendaftaran_2', 'alur_pendaftaran_3', 'alur_pendaftaran_4',
                    'alur_pendaftaran_5'
                ];

                // Fungsi untuk menghitung karakter tanpa HTML tags
                function getTextLength(html) {
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;
                    return (tempDiv.textContent || tempDiv.innerText || '').length;
                }

                // Fungsi untuk update counter
                function updateCounter(id, length) {
                    const counter = $('#' + id + '-count');
                    counter.text(length);

                    if (length >= maxLength) {
                        counter.addClass('text-red-500 font-semibold');
                    } else if (length >= maxLength * 0.8) {
                        counter.addClass('text-yellow-500');
                        counter.removeClass('text-red-500 font-semibold');
                    } else {
                        counter.removeClass('text-red-500 font-semibold text-yellow-500');
                    }
                }

                // Fungsi untuk mencegah input berlebih
                function preventExcessInput(e, id) {
                    const content = $('#' + id).summernote('code');
                    const textLength = getTextLength(content);

                    // Jika sudah mencapai batas dan bukan tombol delete/backspace
                    if (textLength >= maxLength && e.keyCode !== 8 && e.keyCode !== 46) {
                        e.preventDefault();
                        return false;
                    }
                }

                // Inisialisasi Summernote untuk setiap field
                ids.forEach(id => {
                    $('#' + id).summernote({
                        placeholder: 'Tulis konten di sini...',
                        tabsize: 2,
                        height: 200,
                        width: '100%', // Pastikan editor menggunakan full width
                        toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['insert', ['link']],
                            ['color', ['color']],
                            ['fontsize', ['fontsize']],
                            ['height', ['height']]
                        ],
                        callbacks: {
                            onInit: function() {
                                // Update counter saat pertama kali load
                                const initialContent = $('#' + id).summernote('code');
                                const initialLength = getTextLength(initialContent);
                                updateCounter(id, initialLength);

                                // Pastikan editor responsif
                                const $editor = $('#' + id).next('.note-editor');
                                $editor.css({
                                    'width': '100%',
                                    'max-width': '100%',
                                    'box-sizing': 'border-box'
                                });

                                // Pastikan note-editable area juga responsif
                                $editor.find('.note-editable').css({
                                    'word-wrap': 'break-word',
                                    'word-break': 'break-word',
                                    'overflow-wrap': 'break-word',
                                    'white-space': 'pre-wrap'
                                });
                            },
                            onKeydown: function(e) {
                                // Cegah input jika sudah mencapai batas
                                return !preventExcessInput(e, id);
                            },
                            onKeyup: function(e) {
                                const content = $('#' + id).summernote('code');
                                let textLength = getTextLength(content);

                                // Potong jika melebihi batas (untuk kasus copy-paste atau lainnya)
                                if (textLength > maxLength) {
                                    const tempDiv = document.createElement('div');
                                    tempDiv.innerHTML = content;
                                    const fullText = tempDiv.textContent || tempDiv.innerText || '';
                                    const truncatedText = fullText.substring(0, maxLength);
                                    $('#' + id).summernote('code', truncatedText);
                                    textLength = maxLength;
                                }

                                updateCounter(id, textLength);
                            },
                            onPaste: function(e) {
                                // Delay untuk memproses paste
                                setTimeout(() => {
                                    const content = $('#' + id).summernote('code');
                                    let textLength = getTextLength(content);

                                    if (textLength > maxLength) {
                                        const tempDiv = document.createElement('div');
                                        tempDiv.innerHTML = content;
                                        const fullText = tempDiv.textContent || tempDiv
                                            .innerText || '';
                                        const truncatedText = fullText.substring(0,
                                            maxLength);
                                        $('#' + id).summernote('code', truncatedText);
                                        textLength = maxLength;
                                    }

                                    updateCounter(id, textLength);
                                }, 100);
                            }
                        }
                    });
                });

                // CSS tambahan untuk memastikan responsivitas
                $('<style>')
                    .prop('type', 'text/css')
                    .html(`
                        .note-editor {
                            width: 100% !important;
                            max-width: 100% !important;
                            box-sizing: border-box !important;
                        }
                        .note-editable {
                            word-wrap: break-word !important;
                            word-break: break-word !important;
                            overflow-wrap: break-word !important;
                            white-space: pre-wrap !important;
                        }
                        .note-toolbar {
                            flex-wrap: wrap !important;
                        }
                        @media (max-width: 768px) {
                            .note-toolbar .note-btn-group {
                                margin-bottom: 5px;
                            }
                        }
                    `)
                    .appendTo('head');
            });
        </script>
    </body>
</x-layoute>
