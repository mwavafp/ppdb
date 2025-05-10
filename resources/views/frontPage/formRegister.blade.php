<x-layout>

    {{-- <div class="mb-4">
                <label class="block text-gray-700">Nama Lengkap</label>
                <input type="text" class="w-full border border-gray-300 p-2 mt-1">
            </div> --}}
    <div class="bg-gray-100 p-8">
        <div class="m-auto w-1/2 rounded-lg bg-white p-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="border-b pb-2 mb-4">
                    <h2 class="text-md font-semibold">BIODATA PESERTA</h2>
                </div>
                <!-- Name -->

                <div class="border-b pb-2 mb-4">
                    <h2 class="text-md font-semibold">AKUN PESERTA DIDIK</h2>
                </div>
                <div class="mb-4 relative">
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username"
                        :value="old('username')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>



                <!-- Password -->

                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <div class="relative">
                        <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password"
                            onclick="togglePassword()" />
                        <span class="absolute top-1/2 right-3 -translate-y-1/2 transform cursor-pointer">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                <!-- Data Diri -->

                <div class="mb-4">
                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="items-center gap-6 mb-4">
                    <x-input-label for="name" :value="__('Jenis Kelamin')" />
                    <div class="flex mt-2">
                        <label for="pria" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="pria" name="gender" value="laki-laki" class="hidden peer"
                                onclick="toggleCheckbox(this, 'perempuan')" />
                            <!-- Kotak custom -->
                            <div
                                class="rounded-md w-5 h-5 border-2 border-gray-300 peer-checked:bg-[oklch(45.7%_0.24_277.023)] peer-checked:border-[oklch(45.7%_0.24_277.023)] transition-all">
                            </div>
                            <span class="text-gray-700 peer-checked:font-semibold">Laki-Laki</span>
                        </label>
                        <label for="perempuan" class="flex items-center space-x-2 cursor-pointer">
                            <input type="radio" id="perempuan" name="gender" value="perempuan" class="hidden peer"
                                onclick="toggleCheckbox(this, 'pria')" />
                            <div
                                class="rounded-md w-5 h-5 border-2 border-gray-300 peer-checked:bg-pink-500 peer-checked:border-pink-500 transition-all">
                            </div>
                            <!-- Text Label -->
                            <span class="text-gray-700 peer-checked:font-semibold">Perempuan</span>
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>




                <div class="mb-4">
                    <x-input-label for="tmpt_lahir" :value="__('Tempat Lahir Siswa')" />
                    <x-text-input id="tmpt_lahir" class="block mt-1 w-full" type="text" name="tmpt_lahir"
                        :value="old('tmpt_lahir')" required />
                    <x-input-error :messages="$errors->get('tmpt_lahir')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <label for="tgl_lahir" class="block cursor-pointer">
                        <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir Siswa')" />
                        <x-text-input id="tgl_lahir" class="block mt-1 w-full cursor-pointer" type="date"
                            name="tgl_lahir" :value="old('tgl_lahir')" required />
                    </label>
                    <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
                </div>


                <div class="mb-4">
                    <x-input-label for="address" :value="__('Alamat')" />
                    <textarea id="alamat" name="alamat" class="resize-none block mt-1 w-full border-2 border-gray-400 rounded-md">{{ old('alamat') }}</textarea>
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>


                <div class="mb-4">
                    <x-input-label for="school_origin" :value="__('Asal Sekolah')" />
                    <x-text-input id="asl_sekolah" class="block mt-1 w-full" type="text" name="asl_sekolah"
                        :value="old('asl_sekolah')" required />
                    <x-input-error :messages="$errors->get('school_origin')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="nisn" :value="__('NISN')" />
                    <x-text-input id="nisn" class="block mt-1 w-full" type="number" name="nisn"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" :value="old('nisn')" required />
                    <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
                </div>
                <div class="mb-4 ">
                    <x-input-label for="nisn" :value="__('Status Pendaftar')" />
                    <select class="block mt-1 w-full rounded-md border-2 border-gray-400" name="tipe_siswa"
                        id="">
                        <option>Pilih Status</option>
                        <option value="umum">Umum</option>
                        <option value="alumni">Alumni</option>
                    </select>
                    <x-input-error :messages="$errors->get('tipe_siswa')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="unt_pendidikan" :value="__('Unit Pendidikan')" />
                    <input id="unt_pendidikan" class="block mt-1 w-full" type="text" name='unt_pendidikan'
                        value='{{ $unitPendidikan }}' readonly />
                    <x-input-error :messages="$errors->get('unt_pendidikan')" class="mt-2" />
                </div>

                <input id="unt_pendidikan" class="block mt-1 w-full" type="text" name='cnt'
                    value='{{ $cnt }}' hidden />


                <div class="mb-4">
                    <x-input-label for="gelombang" :value="__('Gelombang')" />
                    <p>{{ $getGelombang->namaAcara }}</p>
                    <input id="unt_pendidikan" class="block mt-1 w-full" type="text" name='id_acara'
                        value='{{ $getGelombang->id_acara }}' readonly hidden />

                    <x-input-error :messages="$errors->get('unt_pendidikan')" class="mt-2" />
                </div>


                <!--Data ortu -->

                <div class="border-b pb-2 mb-4">
                    <h2 class="text-lg font-semibold">IDENTITAS ORANG TUA/WALI</h2>
                </div>
                <div class="mb-4">
                    <x-input-label for="number_kk" :value="__('Nomor KK')" />
                    <x-text-input id="warning-16" class="block mt-1 w-full" type="text" name="nmr_kk"
                        min="" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                        maxlength="16" onpaste="handlePaste(event)" :value="old('nmr_kk')" required />

                    {{-- Real-time warning --}}
                    <p id="nik-warning" class="text-red-500 text-sm mt-1 hidden">
                        Nomor KK harus terdiri dari 16 digit angka.
                    </p>

                    {{-- Laravel backend error --}}
                    <x-input-error :messages="$errors->get('nmr_kk')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="name_daddy" :value="__('Nama Ayah')" />
                    <x-text-input id="name_dady" class="block mt-1 w-full" type="text" name="nm_ayah"
                        :value="old('nm_ayah')" required />
                    <x-input-error :messages="$errors->get('nm_ayah')" class="mt-2" />
                </div>


                <div class="mb-4">
                    <x-input-label for="nik_ayah" :value="__('NIK Ayah')" />
                    <x-text-input id="warning-16" class="block mt-1 w-full" type="text" name="nik_ayah"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="16"
                        onpaste="handlePaste(event)" :value="old('nik_ayah')" required />

                    {{-- Real-time warning --}}
                    <p id="nik-warning" class="text-red-500 text-sm mt-1 hidden">
                        Nomor NIK harus terdiri dari 16 digit angka.
                    </p>

                    {{-- Laravel backend error --}}
                    <x-input-error :messages="$errors->get('nik_ayah')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="place_born_daddy" :value="__('Tempat Tanggal Lahir Ayah')" />
                    <x-text-input id="place_born_daddy" class="block mt-1 w-full" type="text"
                        name="tmpt_lhr_ayah" :value="old('tmpt_lhr_ayah')" required />
                    <x-input-error :messages="$errors->get('place_born_daddy')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="date_born_daddy" :value="__('Tanggal Lahir Ayah')" />
                    <x-text-input id="date_born_daddy" class="block mt-1 w-full" type="date" name="tgl_lhr_ayah"
                        :value="old('tgl_lhr_ayah')" required />
                    <x-input-error :messages="$errors->get('date_born_daddy')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="nisn" :value="__('Alamat Ayah')" />
                    <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="almt_ayah"
                        :value="old('almt_ayah')" required />
                    <x-input-error :messages="$errors->get('almt_ayah')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="nisn" :value="__('Pekerjaan Ayah')" />
                    <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="pekerjaan_ayah"
                        :value="old('pekerjaan_ayah')" required />
                    <x-input-error :messages="$errors->get('pekerjaan_ayah')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="nisn" :value="__('Nomor Whatsapp Ayah')" />
                    <x-text-input id="tes" class="block mt-1 w-full" type="number" name="nmr_ayah_wa"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" :value="old('nmr_ayah_wa')" required />
                    <x-input-error :messages="$errors->get('nmr_ayah_wa')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="nm_ibu" :value="__('Nama Ibu')" />
                    <x-text-input id="nm_ibu" class="block mt-1 w-full" type="text" name="nm_ibu"
                        :value="old('nm_ibu')" required />
                    <x-input-error :messages="$errors->get('nm_ibu')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="nik_ibu" :value="__('NIK Ibu')" />
                    <x-text-input id="warning-16" class="block mt-1 w-full" type="text" name="nik_ibu"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="16"
                        onpaste="handlePaste(event)" :value="old('nik_ibu')" required />

                    {{-- Real-time warning --}}
                    <p id="nik-warning" class="text-red-500 text-sm mt-1 hidden">
                        Nomor NIK harus terdiri dari 16 digit angka.
                    </p>

                    {{-- Laravel backend error --}}
                    <x-input-error :messages="$errors->get('nik_ibu')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="tmpt_lahir_ibu" :value="__('Tempat Lahir Ibu')" />
                    <x-text-input id="tmpt_lhr_ibu" class="block mt-1 w-full" type="text" name="tmpt_lhr_ibu"
                        :value="old('tmpt_lahir_ibu')" required />
                    <x-input-error :messages="$errors->get('tmpt_lhr_ibu')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="tgl_lhr_ibu" :value="__('Tanggal Lahir Ibu')" />
                    <x-text-input id="tgl_lhr_ibu" class="block mt-1 w-full" type="date" name="tgl_lhr_ibu"
                        :value="old('tgl_lhr_ibu')" required />
                    <x-input-error :messages="$errors->get('tgl_lhr_ibu')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="almt_ibu" :value="__('Alamat Ibu')" />
                    <x-text-input id="almt_ibu" class="block mt-1 w-full" type="text" name="almt_ibu"
                        :value="old('almt_ibu')" required />
                    <x-input-error :messages="$errors->get('almt_ibu')" class="mt-2" />
                </div>

                <div class="mb-4">
                    <x-input-label for="pekerjaan_ibu" :value="__('Pekerjaan Ibu')" />
                    <x-text-input id="pekerjaan_ibu" class="block mt-1 w-full" type="text" name="pekerjaan_ibu"
                        :value="old('pekerjaan_ibu')" required />
                    <x-input-error :messages="$errors->get('pekerjaan_ibu')" class="mt-2" />
                </div>
                <div class="mb-4">
                    <x-input-label for="nmr_ibu_wa" :value="__('Nomor Whatsapp Ibu')" />
                    <x-text-input id="nmr_ibu_wa" class="block mt-1 w-full" type="number" name="nmr_ibu_wa"
                        onkeypress="return event.charCode >= 48 && event.charCode <= 57" :value="old('nmr_ibu_wa')" required />
                    <x-input-error :messages="$errors->get('nmr_ibu_wa')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>


</x-layout>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const nikInput = document.getElementById("warning-16");
        const warning = document.getElementById("nik-warning");

        nikInput.addEventListener("input", function() {
            // Tampilkan warning kalau panjang bukan 16 atau ada karakter bukan angka

            if (this.value.length !== 16 || !/^\d+$/.test(this.value)) {
                warning.classList.remove("hidden");
            } else {
                warning.classList.add("hidden");
            }
        });
    });

    function handlePaste(e) {
        const pasted = (e.clipboardData || window.clipboardData).getData('text');
        const warning = document.getElementById("nik-warning");

        if (!/^\d{16}$/.test(pasted)) {
            e.preventDefault();
            warning.classList.remove("hidden");
        } else {
            warning.classList.add("hidden");
        }
    }

    function toggleCheckbox(currentCheckbox, otherCheckboxId) {
        const otherCheckbox = document.getElementById(otherCheckboxId);

        // Jika checkbox ini di-check, uncheck checkbox lainnya
        if (currentCheckbox.checked) {
            otherCheckbox.checked = false;
        }
    }

    function handlePaste(e) {
        const paste = (e.clipboardData || window.clipboardData).getData('text');
        if (!/^\d+$/.test(paste)) {
            e.preventDefault(); // Tolak paste kalau mengandung non-digit
        }
    }

    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('eyeIcon');

        if (input.type === 'password') {
            input.type = 'text';
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.953 9.953 0 012.182-3.362m3.687-2.58A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.956 9.956 0 01-1.507 2.888M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 6L6 6" />
            `;
        } else {
            input.type = 'password';
            icon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            `;
        }
    }
</script>
