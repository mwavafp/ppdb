<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="border-b pb-2 mb-4">
        <h2 class="text-md font-semibold">BIODATA PESERTA</h2>
    </div>
    <!-- Name -->

    <div class="border-b pb-2 mb-4">
        <h2 class="text-md font-semibold">AKUN PESERTA DIDIK</h2>
    </div>
    <div>
        <x-input-label for="username_generate" :value="__('Username')" />
        <x-text-input id="username_generate" class="block mt-1 w-full" type="text" name="username_generate"
            :value="old('username_generate')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('username_generate')" class="mt-2" />
    </div>



    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password_generate" :value="__('Password')" />

        <x-text-input id="password_generate" class="block mt-1 w-full" type="password" name="password_generate" required
            autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_generate')" class="mt-2" />
    </div>


    <!-- Data Diri -->

    <div class="mb-4">
        <x-input-label for="name" :value="__('Nama Lengkap')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
            required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>



    <div class="mb-4">
        <x-input-label for="tmpt_lahir" :value="__('Tempat Lahir Siswa')" />
        <x-text-input id="tmpt_lahir" class="block mt-1 w-full" type="text" name="tmpt_lahir" :value="old('tmpt_lahir')"
            required />
        <x-input-error :messages="$errors->get('tmpt_lahir')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="tgl_lahir" :value="__('Tanggal Lahir Siswa')" />
        <x-text-input id="tgl_lahir" class="block mt-1 w-full" type="date" name="tgl_lahir" :value="old('tgl_lahir')"
            required />
        <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="address" :value="__('Alamat')" />
        <textarea id="alamat" name="alamat" class="block mt-1 w-full border-gray-300 rounded-md">{{ old('alamat') }}</textarea>
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
    </div>


    <div class="mb-4">
        <x-input-label for="school_origin" :value="__('Asal Sekolah')" />
        <x-text-input id="asl_sekolah" class="block mt-1 w-full" type="text" name="asl_sekolah" :value="old('asl_sekolah')"
            required />
        <x-input-error :messages="$errors->get('school_origin')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="nisn" :value="__('NISN')" />
        <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" :value="old('nisn')"
            required />
        <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
    </div>

    <!--Data ortu -->

    <div class="border-b pb-2 mb-4">
        <h2 class="text-lg font-semibold">IDENTITAS ORANG TUA/WALI</h2>
    </div>
    <div class="mb-4">
        <x-input-label for="number_kk" :value="__('Nomor KK')" />
        <x-text-input id="number_kk" class="block mt-1 w-full" type="text" name="nmr_kk" :value="old('nmr_kk')"
            required />
        <x-input-error :messages="$errors->get('nmr_kk')" class="mt-2" />
    </div>
    <div class="mb-4">
        <x-input-label for="name_daddy" :value="__('Nama Ayah')" />
        <x-text-input id="name_dady" class="block mt-1 w-full" type="text" name="nm_ayah" :value="old('nm_ayah')"
            required />
        <x-input-error :messages="$errors->get('nm_ayah')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="number_daddy" :value="__('NIK Ayah')" />
        <x-text-input id="number_daddy" class="block mt-1 w-full" type="text" name="nik_ayah" :value="old('nik_ayah')"
            required />
        <x-input-error :messages="$errors->get('nik_ayah')" class="mt-2" />
    </div>
    <div class="mb-4">
        <x-input-label for="place_born_daddy" :value="__('Tempat Tanggal Lahir Ayah')" />
        <x-text-input id="place_born_daddy" class="block mt-1 w-full" type="text" name="tmpt_lhr_ayah"
            :value="old('tmpt_lhr_ayah')" required />
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
        <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="almt_ayah" :value="old('almt_ayah')"
            required />
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
        <x-text-input id="tes" class="block mt-1 w-full" type="number" name="nmr_ayah_wa" :value="old('nmr_ayah_wa')"
            required />
        <x-input-error :messages="$errors->get('nmr_ayah_wa')" class="mt-2" />
    </div>

    <div class="mb-4">
        <x-input-label for="nm_ibu" :value="__('Nama Ibu')" />
        <x-text-input id="nm_ibu" class="block mt-1 w-full" type="text" name="nm_ibu" :value="old('nm_ibu')"
            required />
        <x-input-error :messages="$errors->get('nm_ibu')" class="mt-2" />
    </div>
    <div class="mb-4">
        <x-input-label for="nik_ibu" :value="__('NIK Ibu')" />
        <x-text-input id="nik_ibu" class="block mt-1 w-full" type="text" name="nik_ibu" :value="old('nik_ibu')"
            required />
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
        <x-text-input id="almt_ibu" class="block mt-1 w-full" type="text" name="almt_ibu" :value="old('almt_ibu')"
            required />
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
        <x-text-input id="nmr_ibu_wa" class="block mt-1 w-full" type="number" name="nmr_ibu_wa" :value="old('nmr_ibu_wa')"
            required />
        <x-input-error :messages="$errors->get('nmr_ibu_wa')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>
