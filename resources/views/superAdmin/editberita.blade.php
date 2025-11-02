<x-layoute>
    <x-slot:title>Edit Berita</x-slot:title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <body class="bg-white text-gray-900 min-h-screen overflow-x-hidden">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Header Section -->
            <header class="mb-10">
                <div class="container flex flex-col">
                    <h1 class="text-3xl font-bold break-words">Edit Berita</h1>
                </div>
            </header>
            <div class="bg-white px-4 sm:px-7 pb-7 pt-1 rounded-lg shadow-lg w-full">


                <form action="{{ route('berita.update', $berita->id_berita) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="judul" class="block font-medium">Judul</label>
                        <input type="text" name="judul" id="judul" class="w-full border px-3 py-2 rounded"
                            value="{{ old('judul', $berita->judul) }}" required>
                    </div>
                    <!--<div class="mb-4">-->
                    <!--    <label for="abstrak" class="block font-medium">Abstrak</label>-->
                    <!--    <textarea name="abstrak" id="abstrak" rows="3" class="w-full border px-3 py-2 rounded">{{ old('abstrak', $berita->abstrak) }}</textarea>-->
                    <!--</div>-->
                    <div class="mb-4">
                        <label for="isi" class="block font-medium">Isi</label>
                        <textarea name="isi" id="isi" rows="5" class="w-full border px-3 py-2 rounded" required>{{ old('isi', $berita->isi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="id_kategori" class="block font-medium">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="w-full border px-3 py-2 rounded" required>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}"
                                    {{ $berita->id_kategori == $kat->id_kategori ? 'selected' : '' }}>
                                    {{ $kat->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="id_unit" class="block font-medium">Unit</label>
                        <select name="id_unit" id="id_unit" class="w-full border px-3 py-2 rounded" required>
                            @foreach ($unit as $u)
                                <option value="{{ $u->id_unit }}"
                                    {{ $berita->id_unit == $u->id_unit ? 'selected' : '' }}>
                                    {{ $u->unit }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="gambar" class="block font-medium">Gambar (opsional)</label>
                        <p for="gambar" class="block font-medium">Ukuran Maksimal 2MB</p>
                        <input type="file" name="gambar" id="gambar"
                            class="block w-full text-sm text-gray-500
           file:mr-4 file:py-2 file:px-4
           file:rounded-sm file:border-0
           file:text-sm file:font-semibold
           file:bg-[oklch(62.7%_0.194_149.214)] file:text-white
           hover:file:bg-green-400">
                        @if ($berita->gambar)
                            <p class="text-sm mt-2">Gambar saat ini: <span
                                    class="text-blue-600">{{ $berita->gambar }}</span></p>
                        @endif
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('pengaturanberita') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Perbarui</button>
                    </div>
                </form>
            </div>
</x-layoute>
<script>
    $(document).ready(function() {
        // Konfigurasi maksimal karakter untuk semua field
        const maxLength = 1500;

        const ids = [
            'isi'
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
