<x-layoute>
    <x-slot:title>Pengaturan Informasi MADIN</x-slot:title>

    <title>Pengaturan Informasi MADIN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <body class="bg-white text-gray-900 overflow-x-hidden">

        <!-- Header Section -->
        <header class="mb-10 max-w-full">
            <div class="container flex flex-col max-w-full">
                <h1 class="text-3xl font-bold">Pengaturan Website</h1>
                <p class="text-sm text-gray-500 mt-1">Halaman TK</p>
            </div>
        </header>

        <!-- Form Section -->
        <div class="bg-white px-7 pb-7 pt-1 rounded-lg shadow-lg max-w-full">
            <form method="POST" action="{{ route('pengaturantk-update') }}" enctype="multipart/form-data"
                class="space-y-8 max-w-full">
                @csrf
                <input type="hidden" name="id_tk" value="{{ $data->id_tk }}">

                <!-- Deskripsi -->
                <div class="w-full">
                    <label for="deskripsi" class="block text-xl font-semibold mb-2">Deskripsi</label>
                    <div class="text-sm text-gray-500 mb-1">
                        <span id="deskripsi-count">0</span>/1500 karakter
                    </div>
                    <div class="w-full overflow-hidden">
                        <textarea id="deskripsi" name="deskripsi" class="w-full">{{ $data->deskripsi }}</textarea>
                    </div>
                </div>
 <div id="gambar-deskripsi " class="mb-8">
                    <div class="w-full">

                        <label for="deskripsi" class="block text-xl font-semibold mb-2 break-words">Foto
                            Deskripsi</label>
                        <div class="py-4">
                            <p class="text-md pb-2">Foto Sekarang</p>
                            <img class="rounded-xl" src="{{ asset('storage/' . $data->image_tk) }}" alt=""
                                width="400">
                        </div>
                        <div>
                            <p>Edit Photo</p>
                            <input type="file" name="image_tk" id=""
                                class="block w-full text-sm text-gray-500
           file:mr-4 file:py-2 file:px-4
           file:rounded-sm file:border-0
           file:text-sm file:font-semibold
           file:bg-[oklch(62.7%_0.194_149.214)] file:text-white
           hover:file:bg-green-400">
                        </div>

                    </div>
                </div>
                <!-- Visi -->
                <div class="w-full">
                    <label for="visi" class="block text-xl font-semibold mb-2">Visi</label>
                    <div class="text-sm text-gray-500 mb-1">
                        <span id="visi-count">0</span>/1500 karakter
                    </div>
                    <div class="w-full overflow-hidden">
                        <textarea id="visi" name="visi" class="w-full">{{ $data->visi }}</textarea>
                    </div>
                </div>

                <!-- Misi -->
                <div class="w-full">
                    <label for="misi" class="block text-xl font-semibold mb-2">Misi</label>
                    <div class="text-sm text-gray-500 mb-1">
                        <span id="misi-count">0</span>/1500 karakter
                    </div>
                    <div class="w-full overflow-hidden">
                        <textarea id="misi" name="misi" class="w-full">{{ $data->misi }}</textarea>
                    </div>
                </div>
  <!-- Gallery -->
                <div id="gallery " class="mb-8">
                    <div class="w-full">

                        <label for="deskripsi" class="block text-xl font-semibold mb-2 break-words">Foto
                            Gallery TK</label>
                        <div class="flex flex-wrap">
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang Gallery A</p>
                                <div>
                                    <img class="rounded-xl" src="{{ asset('storage/' . $data->gallery_tk_a) }}"
                                        alt="" width="200">
                                </div>
                                <div>
                                    <p>Edit Photo</p>
                                    <input type="file" name="gallery_tk_a" id=""
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-sm file:font-semibold file:bg-[oklch(62.7%_0.194_149.214)] file:text-white hover:file:bg-green-400">
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang Gallery B</p>
                                <div>
                                    <img class="rounded-xl" src="{{ asset('storage/' . $data->gallery_tk_b) }}"
                                        alt="" width="200">
                                </div>
                                <div>
                                    <p>Edit Photo</p>
                                    <input type="file" name="gallery_tk_b" id=""
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-sm file:font-semibold file:bg-[oklch(62.7%_0.194_149.214)] file:text-white hover:file:bg-green-400">
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang Gallery C</p>
                                <div>

                                    <img class="rounded-xl" src="{{ asset('storage/' . $data->gallery_tk_c) }}"
                                        alt="" width="200">
                                </div>
                                <div>
                                    <p>Edit Photo</p>
                                    <input type="file" name="gallery_tk_c" id=""
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-sm file:font-semibold file:bg-[oklch(62.7%_0.194_149.214)] file:text-white hover:file:bg-green-400">
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang Gallery D</p>
                                <div>
                                    <img class="rounded-xl" src="{{ asset('storage/' . $data->gallery_tk_d) }}"
                                        alt="" width="200">
                                </div>
                                <div>
                                    <p>Edit Photo</p>
                                    <input type="file" name="gallery_tk_d" id=""
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-sm file:font-semibold file:bg-[oklch(62.7%_0.194_149.214)] file:text-white hover:file:bg-green-400">
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang Gallery E</p>
                                <div>
                                    <img class="rounded-xl" src="{{ asset('storage/' . $data->gallery_tk_e) }}"
                                        alt="" width="200">
                                </div>
                                <div>
                                    <p>Edit Photo</p>
                                    <input type="file" name="gallery_tk_e" id=""
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-sm file:font-semibold file:bg-[oklch(62.7%_0.194_149.214)] file:text-white hover:file:bg-green-400">
                                </div>
                            </div>
                            <div class="py-4">
                                <p class="text-md pb-2">Foto Sekarang Gallery F</p>
                                <div>
                                    <img class="rounded-xl" src="{{ asset('storage/' . $data->gallery_tk_f) }}"
                                        alt="" width="200">
                                </div>
                                <div>
                                    <p>Edit Photo</p>
                                    <input type="file" name="gallery_tk_f" id=""
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-sm file:border-0 file:text-sm file:font-semibold file:bg-[oklch(62.7%_0.194_149.214)] file:text-white hover:file:bg-green-400">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="text-center">
                    <a href="{{ route('pengaturanpage') }}"
                        class="bg-red-500 text-white py-3 px-8 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-gray-500 mr-4">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-blue-500 text-white py-3 px-8 rounded-lg shadow-md hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-500">
                        Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>

    </body>

    <!-- Summernote Init Script -->
    <script>
        $(document).ready(function() {
            // Konfigurasi maksimal karakter untuk semua field
            const maxLength = 1500;

            const ids = ['deskripsi', 'visi', 'misi'];

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
                    placeholder: 'Tulis di sini...',
                    tabsize: 2,
                    height: 200,
                    width: '100%',
                    disableResizeEditor: true,
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

                            // Memastikan editor tidak melebar
                            $('.note-editor').css({
                                'max-width': '100%',
                                'width': '100%',
                                'box-sizing': 'border-box'
                            });
                            $('.note-editable').css({
                                'word-wrap': 'break-word',
                                'word-break': 'break-word',
                                'white-space': 'pre-wrap',
                                'overflow-wrap': 'break-word'
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

            // CSS tambahan untuk memastikan tidak ada overflow horizontal
            $('<style>')
                .prop('type', 'text/css')
                .html(`
                    .note-editor {
                        max-width: 100% !important;
                        width: 100% !important;
                        box-sizing: border-box !important;
                    }
                    .note-toolbar {
                        max-width: 100% !important;
                        overflow-x: auto !important;
                        white-space: nowrap !important;
                    }
                    .note-editable {
                        word-wrap: break-word !important;
                        word-break: break-word !important;
                        white-space: pre-wrap !important;
                        overflow-wrap: break-word !important;
                        max-width: 100% !important;
                    }
                    body {
                        overflow-x: hidden !important;
                    }
                `)
                .appendTo('head');
        });
    </script>
</x-layoute>
