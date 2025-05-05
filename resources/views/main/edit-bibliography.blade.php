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
                                <strong>.jpg</strong>, <strong>.jpeg</strong>.
                            </p>
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
                                <input type="{{ $field === 'tahun_terbit' ? 'number' : 'text' }}" name="{{ $field }}"
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
    <div class="card border shadow max-h-max">
        <div class="card-body">
            <div class="flex justify-between items-center">
                <label class="font-bold text-xl text-gray-800">Data Koleksi</label>
                <div class="flex mb-3">
                    <button onclick="openCreateModal()"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-3 py-2 rounded shadow transition">
                        <i class="ti ti-plus mr-1"></i> Tambah Eksemplar
                    </button>
                </div>
            </div>

            <div class="relative overflow-x-autorounded-xl border border-gray-200 mt-3">
                <!-- Scrollable container -->
                <div class="overflow-y-auto max-h-64">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100 sticky top-0">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Kode Eksemplar
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Tipe Koleksi
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Lokasi
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Lokasi Rak
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($buku->eksemplar as $item)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        {{ $item->kode_eksemplar }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        {{ $item->tipe_koleksi }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        {{ $item->lokasi }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        {{ $item->lokasi_rak }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <a href="{{ route('eksemplar.print', $item->kode_eksemplar) }}" target="_blank"
                                            class="inline-block px-3 py-1 text-blue-600 hover:text-blue-800 hover:bg-blue-100 rounded-md text-xs font-medium transition">
                                            <i class="ti ti-printer"></i>
                                        </a>
                                        <a href="javascript:void(0);"
                                            class="btn-edit-eksemplar inline-block px-3 py-1 text-yellow-600 hover:text-yellow-800 hover:bg-yellow-100 rounded-md text-xs font-medium transition"
                                            data-kode="{{ $item->kode_eksemplar }}"
                                            data-nomor="{{ $item->nomor_panggil }}"
                                            data-tipe="{{ $item->tipe_koleksi }}"
                                            data-tanggal="{{ $item->tanggal_penerimaan }}"
                                            data-lokasi="{{ $item->lokasi }}" data-rak="{{ $item->lokasi_rak }}">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('eksemplar.destroy', $item->kode_eksemplar) }}"
                                            method="POST" onsubmit="return confirmDelete(this);"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block px-3 py-1 text-red-600 hover:text-red-800 hover:bg-red-100 rounded-md text-xs font-medium transition">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data eksemplar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif
    <script>
        // ================== Preview Cover ==================
        const defaultImage = "https://www.flaticon.com/free-icon/image_1829415";
        const previewImg = document.getElementById('previewImage');
        const fileInput = document.getElementById('coverInput');

        function previewTailwindCover(event) {
            const file = event.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = () => {
                previewImg.src = reader.result;
                previewImg.classList.remove('opacity-50');
            };
            reader.readAsDataURL(file);
        }

        // ================== Modal Eksemplar ==================
        const modal = document.getElementById('modalEksemplar');
        const form = document.getElementById('formEksemplar');
        const methodField = document.getElementById('_methodField');
        const fields = ['kode_eksemplar', 'nomor_panggil', 'tipe_koleksi', 'tanggal_penerimaan', 'lokasi', 'lokasi_rak'];

        function setField(name, value = '', readOnly = false) {
            const input = document.getElementById('form_' + name);
            if (input) {
                input.value = value;
                input.readOnly = readOnly;
            }
        }
        document.querySelectorAll('.btn-edit-eksemplar').forEach(button => {
            button.addEventListener('click', () => {
                const data = {
                    kode_eksemplar: button.dataset.kode,
                    nomor_panggil: button.dataset.nomor,
                    tipe_koleksi: button.dataset.tipe,
                    tanggal_penerimaan: button.dataset.tanggal,
                    lokasi: button.dataset.lokasi,
                    lokasi_rak: button.dataset.rak,
                };

                openEditModal(data);
            });
        });

        function resetFields() {
            fields.forEach(field => setField(field));
        }


        function toggleModal(show = true) {
            modal.classList.toggle('hidden', !show);
        }

        function openCreateModal() {
            document.getElementById('modalTitle').innerText = 'Tambah Eksemplar';
            document.getElementById('submitBtn').innerText = 'Simpan';
            form.action = '{{ route('eksemplar.store') }}';
            methodField.value = 'POST';
            setField('kode_eksemplar', '', false); // editable
            resetFields();
            toggleModal(true);
        }

        function openEditModal(data) {
            document.getElementById('modalTitle').innerText = 'Edit Eksemplar';
            document.getElementById('submitBtn').innerText = 'Update';
            form.action = `/eksemplar/${data.kode_eksemplar}`;
            methodField.value = 'PUT';

            fields.forEach(field => {
                const value = data[field] || '';
                const readOnly = field === 'kode_eksemplar';
                setField(field, value, readOnly);
            });

            toggleModal(true);
        }

        function confirmDelete(form) {
            event.preventDefault(); // Cegah form langsung submit

            Swal.fire({
                title: 'Hapus eksemplar?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

            return false;
        }
    </script>
@endsection
