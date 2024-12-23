@vite('resources/css/app.css')
<form action="{{ route('update-tagihan', $pembayaran->id_bayar) }}" method="POST">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1">
        <h1 class="font-bold text-xl mb-4">Edit Tagihan Mabro</h1>
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium">Nama</label>
            <label for="name" class="block text-gray-700 font-medium">{{ $pembayaran->name }}</label>

        </div>
        <div class="mb-4">
            <label for="jmlh_byr" class="block text-gray-700 font-medium">Jumlah Bayar</label>
            <input type="number" id="jmlh_byr" name="jmlh_byr" value="{{ $pembayaran->jmlh_byr }}"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-medium">Status Tipe Pembayaran </label>
            <select id="status" name="status" value="{{ $pembayaran->status }}"
                class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 appearance-none">
                <option value="DP">DP</option>
                <option value="Lunas">Lunas</option>
                <option value="Cicil">Cicil</option>
            </select>

        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded bg-primary rounded-lg">
                Simpan
            </button>
        </div>
    </div>



</form>
