@extends('layouts.master')

@section('title', 'Data Buku')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    @vite('resources/css/app.css')
@endsection

@section('pageContent')
    <form action="{{ route('buku.update', $buku->id_buku) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row w-100 g-4 h-100">
            <p class="font-bold text-2xl text-gray-800">Edit Buku</p>

            <!-- Cover Upload -->
            <div class="col-md-4">
                <div class="card border shadow">
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="font-bold text-xl text-gray-800">Cover <span class="text-red-500">*</span></label>
                            <div
                                class="relative mt-2 w-72 h-80 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center bg-gray-50 hover:bg-gray-100 group">
                                <img id="previewImage" src="/covers/{{ $buku->cover }}" alt="Preview"
                                    class="max-h-full max-w-full object-contain opacity-50 group-hover:opacity-75 transition" />

                                <input name="cover" id="coverInput" type="file" accept=".png, .jpg, .jpeg"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                    onchange="previewTailwindCover(event)" />
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Format yang diterima: <strong>.png</strong>,
                                <strong>.jpg</strong>, <strong>.jpeg</strong>.</p>
                        </div>
                    </div>
                </div>

                <!-- Registrasi -->
                <div class="card border shadow mt-4 h-[514px]">
                    <div class="card-body">
                        <label class="font-bold text-xl text-gray-800">Registrasi</label>
                        @php
                            $registrasiFields = [
                                'ISBN' => 'Masukan ISBN buku',
                                'pengarang' => 'Masukan pengarang buku',
                                'penerbit' => 'Masukan nama penerbit',
                                'tempat_penerbit' => 'Masukan tempat terbit',
                                'tahun_terbit' => 'Masukan tahun terbit',
                            ];
                        @endphp
                        @foreach ($registrasiFields as $field => $placeholder)
                            <div class="flex flex-col mt-3">
                                <p class="font-medium text-gray-700">
                                    {{ str_replace('_', ' ', ucfirst($field)) }} <span class="text-red-500">*</span>
                                </p>
                                <input
                                    type="{{ $field === 'tahun_terbit' ? 'number' : 'text' }}"
                                    name="{{ $field }}"
                                    value="{{ $buku->$field }}"
                                    class="mt-1 border rounded w-full py-2 px-3 text-gray-700 placeholder:text-sm placeholder-gray-400 focus:outline-none focus:shadow-outline"
                                    placeholder="{{ $placeholder }}">
                            </div>
                        @endforeach
                    </div>
                </div>                
            </div>

            <!-- Detail -->
            <div class="col-md-8">
                <div class="card border shadow max-h-max">
                    <div class="card-body">
                        <label class="font-bold text-xl text-gray-800">Detail</label>

                        <div class="flex flex-col mt-3">
                            <p class="font-medium text-gray-700">Judul Buku <span class="text-red-500">*</span></p>
                            <input type="text" name="judul_buku" value="{{ $buku->judul_buku }}"
                                class="mt-1 border rounded w-full py-2 px-3 text-gray-700 placeholder:text-sm placeholder-gray-400 focus:outline-none focus:shadow-outline"
                                placeholder="Masukan judul buku">
                        </div>

                        <div class="flex flex-col mt-3">
                            <label for="abstrak" class="font-medium text-gray-700">Abstrak <span
                                    class="text-red-500">*</span></label>
                            <textarea id="abstrak" name="abstrak" rows="4"
                                class="p-2.5 w-full h-[220px] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 placeholder-gray-400"
                                placeholder="Masukan sinopsis buku">{{ $buku->abstrak }}</textarea>
                        </div>

                        @php
                            $detailFields = [
                                'deskripsi_fisik' => 'Masukan deskripsi fisik',
                                'edisi' => 'Masukan edisi',
                                'bahasa' => 'Masukan bahasa',
                                'subyek' => 'Masukan subyek',
                                'gmd' => 'Masukan GMD',
                                'no_panggil' => 'Masukan nomor panggil',
                                'klasifikasi' => 'Masukan klasifikasi',
                            ];
                        @endphp
                        @foreach ($detailFields as $field => $placeholder)
                            <div class="flex flex-col mt-3">
                                <p class="font-medium text-gray-700">{{ str_replace('_', ' ', ucfirst($field)) }} <span
                                        class="text-red-500">*</span></p>
                                <input type="text" name="{{ $field }}" value="{{ $buku->$field }}"
                                    class="mt-1 border rounded w-full py-2 px-3 text-gray-700 placeholder:text-sm placeholder-gray-400 focus:outline-none focus:shadow-outline"
                                    placeholder="{{ $placeholder }}">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-[40px] mb-[40px]">
                    <a href="{{ route('main.index-bibliography') }}"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Batal</a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-[150px]">Simpan</button>
                </div>
            </div>
        </div>
    </form>
    <!-- Modal Tambah Eksemplar -->
    <!-- Modal Tambah/Edit Eksemplar -->
    <div id="modalEksemplar" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 relative animate-fade-in">
            <h3 id="modalTitle" class="text-lg font-semibold text-gray-800 mb-4">Tambah Eksemplar</h3>
            <form id="formEksemplar" method="POST">
                @csrf
                <input type="hidden" id="_methodField" name="_method" value="POST">
                <input type="hidden" name="id_buku" id="form_id_buku" value="{{ $buku->id_buku }}">
                <div class="space-y-4">
                    <div class="flex gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kode Eksemplar</label>
                            <input type="text" name="kode_eksemplar" id="form_kode_eksemplar" required
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nomor Panggil</label>
                            <input type="text" name="nomor_panggil" id="form_nomor_panggil" required
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tipe Koleksi</label>
                            <input type="text" name="tipe_koleksi" id="form_tipe_koleksi" required
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Penerimaan</label>
                            <input type="date" name="tanggal_penerimaan" id="form_tanggal_penerimaan" required
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Lokasi</label>
                            <input type="text" name="lokasi" id="form_lokasi" required
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Lokasi Rak</label>
                            <input type="text" name="lokasi_rak" id="form_lokasi_rak" required
                                class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-2">
                    <button type="button" onclick="toggleModal(false)"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                        Batal
                    </button>
                    <button type="submit" id="submitBtn"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Simpan
                    </button>
                </div>
            </form>

            <!-- Tombol Close -->
            <button onclick="toggleModal(false)"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl font-bold">
                &times;
            </button>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatable/datatable-basic.init.js') }}"></script>
    <script>
        const defaultImage =
            "https://www.flaticon.com/free-icon/image_1829415?term=picture&page=1&position=11&origin=search&related_id=1829415";
        const previewImg = document.getElementById('previewImage');
        const removeBtn = document.getElementById('removeBtn');
        const fileInput = document.getElementById('coverInput');

        function previewTailwindCover(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function() {
                previewImg.src = reader.result;
                previewImg.classList.remove('opacity-50');
                removeBtn.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }

        removeBtn.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent click from triggering file input
            previewImg.src = defaultImage;
            previewImg.classList.add('opacity-50');
            fileInput.value = ''; // Reset file input
            removeBtn.classList.add('hidden');
        });
    </script>
    <script>
        function toggleModal(show) {
            const modal = document.getElementById('modalEksemplar');
            modal.classList.toggle('hidden', !show);
        }

        // Untuk TAMBAH
        function openCreateModal() {
            document.getElementById('modalTitle').innerText = 'Tambah Eksemplar';
            document.getElementById('submitBtn').innerText = 'Simpan';
            document.getElementById('formEksemplar').action = '{{ route('eksemplar.store') }}';
            document.getElementById('_methodField').value = 'POST';

            // Kosongkan semua input
            document.getElementById('form_kode_eksemplar').readOnly = false;
            document.getElementById('form_kode_eksemplar').value = '';
            document.getElementById('form_nomor_panggil').value = '';
            document.getElementById('form_tipe_koleksi').value = '';
            document.getElementById('form_tanggal_penerimaan').value = '';
            document.getElementById('form_lokasi').value = '';
            document.getElementById('form_lokasi_rak').value = '';

            toggleModal(true);
        }

        // Untuk EDIT
        function openEditModal(data) {
            document.getElementById('modalTitle').innerText = 'Edit Eksemplar';
            document.getElementById('submitBtn').innerText = 'Update';
            document.getElementById('formEksemplar').action = `/eksemplar/${data.kode_eksemplar}`;
            document.getElementById('_methodField').value = 'PUT';

            // Isi form
            document.getElementById('form_kode_eksemplar').readOnly = true;
            document.getElementById('form_kode_eksemplar').value = data.kode_eksemplar;
            document.getElementById('form_nomor_panggil').value = data.nomor_panggil;
            document.getElementById('form_tipe_koleksi').value = data.tipe_koleksi;
            document.getElementById('form_tanggal_penerimaan').value = data.tanggal_penerimaan;
            document.getElementById('form_lokasi').value = data.lokasi;
            document.getElementById('form_lokasi_rak').value = data.lokasi_rak;

            toggleModal(true);
        }
    </script>

    <script>
        function confirmDelete(form) {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>
@endsection
