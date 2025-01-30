<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@vite('resources/css/app.css')

<!-- Tombol untuk membuka modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalEditSiswa">
    Edit Siswa
</button>

<!-- Modal Pop-Up -->
<div class="modal fade" id="ModalEditSiswa" tabindex="-1" aria-labelledby="ModalEditSiswaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Header Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEditSiswaLabel">Edit Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Body Modal -->
            <form action="{{ route('seleksi.update', $data->id_user) }}" method="POST">
                @csrf
                @method('PUT') <!-- Gunakan metode PUT untuk pembaruan -->
                <div class="modal-body">
                    <!-- Input Kelas -->
                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input 
                            type="number" 
                            id="kelas" 
                            name="kelas" 
                            value="{{ $data->kelas }}" 
                            class="form-control" 
                            required>
                    </div>

                    <!-- Input Status Seleksi -->
                    <div class="mb-3">
                        <label for="status_seleksi" class="form-label">Status Seleksi</label>
                        <select 
                            id="status_seleksi" 
                            name="status_seleksi" 
                            class="form-select">
                            <option value="LOLOS" {{ $data->status_seleksi == 'LOLOS' ? 'selected' : '' }}>LOLOS</option>
                            <option value="PENDING" {{ $data->status_seleksi == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                            <option value="TIDAK LOLOS" {{ $data->status_seleksi == 'TIDAK LOLOS' ? 'selected' : '' }}>TIDAK LOLOS</option>
                        </select>
                    </div>

                    <!-- Input Status KKa -->
                    <div class="mb-3">
                        <label for="status_kk" class="form-label">Status KK</label>
                        <select 
                            id="status_kk" 
                            name="status_kk" 
                            class="form-select">
                            <option value="diserahkan" {{ $data->status_kk == 'diserahkan' ? 'selected' : '' }}>Diserahkan</option>
                            <option value="belum_diserahkan" {{ $data->status_kk == 'belum_diserahkan' ? 'selected' : '' }}>Belum Diserahkan</option>
                        </select>
                    </div>

                    <!-- Input Dokumen Tambahan -->
                    <div class="mb-3">
                        <label for="status_ijazah_akhir" class="form-label">Ijazah Terakhir</label>
                        <select 
                            id="status_ijazah_akhir" 
                            name="status_ijazah_akhir" 
                            class="form-select">
                            <option value="diserahkan" {{ $data->status_ijazah_akhir == 'diserahkan' ? 'selected' : '' }}>Diserahkan</option>
                            <option value="belum_diserahkan" {{ $data->status_ijazah_akhir == 'belum_diserahkan' ? 'selected' : '' }}>Belum Diserahkan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status_pas_foto" class="form-label">Pas Foto</label>
                        <select 
                            id="status_pas_foto" 
                            name="status_pas_foto" 
                            class="form-select">
                            <option value="diserahkan" {{ $data->status_pas_foto == 'diserahkan' ? 'selected' : '' }}>Diserahkan</option>
                            <option value="belum_diserahkan" {{ $data->status_pas_foto == 'belum_diserahkan' ? 'selected' : '' }}>Belum Diserahkan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="status_kip" class="form-label">Status KIP</label>
                        <select 
                            id="status_kip" 
                            name="status_kip" 
                            class="form-select">
                            <option value="diserahkan" {{ $data->status_kip == 'diserahkan' ? 'selected' : '' }}>Diserahkan</option>
                            <option value="belum_diserahkan" {{ $data->status_kip == 'belum_diserahkan' ? 'selected' : '' }}>Belum Diserahkan</option>
                        </select>
                    </div>
                </div>
                <!-- Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
