@vite('resources/css/app.css')
<form action="{{ route('pembagiankelas.update', $student->id_kelas) }}"
                                            method="POST">
                                            @csrf
                                            <h1 class="font-bold text-xl mb-4">Edit Pembagian Kelas</h1>

                                            <div class="mb-4">
                                                <label for="name"
                                                    class="block text-left text-gray-700 font-medium">Nama</label>
                                                <label for="name"
                                                    class="block text-left text-gray-700 font-medium">{{ $student->name }}</label>
                                            </div>

                                            <div class="mb-4">
                                                <label for="kelas"
                                                    class="block text-left text-gray-700 font-medium">Kelas</label>
                                                    <select id="kelas" name="kelas"
                                                            class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 appearance-none">
                                                            <option value="-" {{ $student->kelas == '-' ? 'selected' : '' }}>-</option>
                                                            <option value="1" {{ $student->kelas == '1' ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ $student->kelas == '2' ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ $student->kelas == '3' ? 'selected' : '' }}>3</option>
                                                            <option value="4" {{ $student->kelas == '4' ? 'selected' : '' }}>4</option>
                                                            <option value="5" {{ $student->kelas == '5' ? 'selected' : '' }}>5</option>
                                                            <option value="6" {{ $student->kelas == '6' ? 'selected' : '' }}>6</option>
                                                            <option value="7" {{ $student->kelas == '7' ? 'selected' : '' }}>7</option>
                                                            <option value="8" {{ $student->kelas == '8' ? 'selected' : '' }}>8</option>
                                                            <option value="9" {{ $student->kelas == '9' ? 'selected' : '' }}>9</option>
                                                            <option value="11" {{ $student->kelas == '11' ? 'selected' : '' }}>11</option>
                                                            <option value="12" {{ $student->kelas == '12' ? 'selected' : '' }}>12</option>
                                                        </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="kls_identitas"
                                                    class="block text-left text-gray-700 font-medium">Golongan</label>
                                                    <select id="kls_identitas" name="kls_identitas"
                                                            class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 appearance-none">
                                                            <option value="-" {{ $student->kls_identitas == 'A' ? 'selected' : '' }}>-</option>
                                                            <option value="A" {{ $student->kls_identitas == 'A' ? 'selected' : '' }}>A</option>
                                                            <option value="B" {{ $student->kls_identitas == 'B' ? 'selected' : '' }}>B</option>
                                                            <option value="C" {{ $student->kls_identitas == 'C' ? 'selected' : '' }}>C</option>
                                                            <option value="D" {{ $student->kls_identitas == 'D' ? 'selected' : '' }}>D</option>
                                                            <option value="E" {{ $student->kls_identitas == 'E' ? 'selected' : '' }}>E</option>
                                                            <option value="F" {{ $student->kls_identitas == 'F' ? 'selected' : '' }}>F</option>
                                                        </select>
                                            </div>

                                            <div class="mb-4">
                                                <label for="kls_status"
                                                    class="block text-left text-gray-700 font-medium">Status
                                                    Calon</label>
                                                    <select id="kls_status" name="kls_status" 
                                                        class="block w-full px-4 py-2 pr-8 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-700 appearance-none">
                                                        <option value="Alumni" {{ $student->kls_status == 'Alumni' ? 'selected' : '' }}>Alumni</option>
                                                        <option value="Siswa Aktif" {{ $student->kls_status == 'Siswa Aktif' ? 'selected' : '' }}>Siswa Aktif</option>
                                                        <option value="Siswa Tidak Aktif" {{ $student->kls_status == 'Siswa Tidak Aktif' ? 'selected' : '' }}>Siswa Tidak Aktif</option>
                                                    </select>
                                            </div>

                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="bg-blue-500 text-white px-4 py-2 rounded">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
