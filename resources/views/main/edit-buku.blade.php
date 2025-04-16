@extends('layouts.master')

@section('title', 'Data Buku')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    @vite('resources/css/app.css')
@endsection

@section('pageContent')
    <div class="row w-100 g-4 h-100">
        <p class="font-bold text-2xl text-gray-800">Tambah Buku</p>
        <div class="col-md-4">
            <div class="card border shadow">
                <div class="card-body">
                    <div class="mb-4">
                        <label class="font-bold text-xl text-gray-800">Cover <span class="text-red-500">*</span></label>
                        <div
                            class="relative mt-2 w-72 h-80 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center bg-gray-50 hover:bg-gray-100 group">

                            <!-- Preview image -->
                            <img id="previewImage" src="https://cdn-icons-png.flaticon.com/512/149/149852.png"
                                alt="Preview"
                                class="max-h-full max-w-full object-contain opacity-50 group-hover:opacity-75 transition" />

                            <!-- Remove button -->
                            <button id="removeBtn" type="button"
                                class="absolute top-2 right-2 bg-white border border-gray-300 rounded-full p-1 hover:bg-red-100 text-red-500 hidden z-20">
                                &times;
                            </button>

                            <!-- Transparent file input that overlays the container -->
                            <input id="coverInput" type="file" accept=".png, .jpg, .jpeg"
                                class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                onchange="previewTailwindCover(event)" />
                        </div>
                        <p class="text-sm text-gray-500 mt-2">Hanya menerima berkas dengan format <strong>.png</strong>,
                            <strong>.jpg</strong>, atau <strong>.jpeg</strong>.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card border shadow">
                <div class="card-body">
                    <div class="mb-4">
                        <label class="font-bold text-xl text-gray-800">Registrasi</label>
                        <div class="flex flex-col mt-3">
                            <p class="font-medium text-gray-700">
                                ISBN <span class="text-red-500">*</span>
                            </p>
                            <input type="text"
                                class="mt-1 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                placeholder="Masukan ISBN buku" value="{{ $buku->ISBN }}">
                        </div>
                        <div class="flex flex-col mt-3">
                            <p class="font-medium text-gray-700">
                                Pengarang <span class="text-red-500">*</span>
                            </p>
                            <input type="text"
                                class="mt-1 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                placeholder="Masukan pengarang buku" value="{{ $buku->pengarang }}">
                        </div>
                        <div class="flex flex-col mt-3">
                            <label for="isbn" class="mb-1 text-gray-700 font-medium">Penerbit <span
                                    class="text-red-500">*</span></label>
                            <select id="isbn"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline text-sm">
                                <option value="">Pilih penerbit</option>
                                <option value="978-602-03-9310-0">978-602-03-9310-0</option>
                                <option value="978-602-03-9321-6">978-602-03-9321-6</option>
                                <option value="978-602-03-9332-2">978-602-03-9332-2</option>
                            </select>
                        </div>
                        <div class="flex flex-col mt-3">
                            <p class="font-medium text-gray-700">
                                Tahun Terbit <span class="text-red-500">*</span>
                            </p>
                            <input type="text"
                                class="mt-1 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                placeholder="Masukan tahun terbit" value="{{ $buku->tahun_terbit }}">
                        </div>
                        <div class="flex flex-col mt-3">
                            <p class="font-medium text-gray-700">
                                Tahun Langganan <span class="text-red-500">*</span>
                            </p>
                            <input type="text"
                                class="mt-1 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                placeholder="Masukan tahun langganan">
                        </div>
                        <div class="flex flex-col mt-3">
                            <label for="isbn" class="mb-1 text-gray-700 font-medium">Status <span
                                    class="text-red-500">*</span></label>
                            <select id="isbn"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline text-sm">
                                <option value="aktif">Aktif</option>
                                <option value="tidak-aktif">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card border shadow max-h-max">
                <div class="card-body">
                    <div class="table-responsive">
                        <label class="font-bold text-xl text-gray-800">Detail</label>
                        <div class="flex flex-col mt-3">
                            <p class="font-medium text-gray-700">
                                Judul <span class="text-red-500">*</span>
                            </p>
                            <input type="text"
                                class="mt-1 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                placeholder="Masukan judul buku" value="{{ $buku->judul_buku }}">
                        </div>
                        <div class="flex flex-col mt-3">
                            <label for="message"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis <span
                                    class="text-red-500">*</span></label>
                            <textarea id="message" rows="4"
                                class="block p-2.5 w-full h-[220px] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 placeholder-gray-400"
                                placeholder="Masukan sinopsis buku"></textarea>
                        </div>

                        <div class="flex flex-col mt-3">
                            <label for="isbn" class="mb-1 text-gray-700 font-medium">Kategori <span
                                    class="text-red-500">*</span></label>
                            <select id="isbn"
                                class="appearance-none border rounded w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none focus:shadow-outline text-sm">
                                <option value="">Masukan kategori...</option>
                                <option value="978-602-03-9310-0">978-602-03-9310-0</option>
                                <option value="978-602-03-9321-6">978-602-03-9321-6</option>
                                <option value="978-602-03-9332-2">978-602-03-9332-2</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>


            <div class="card border shadow max-h-max">
                <div class="card-body">
                    <label class="font-bold text-xl text-gray-800">Data Koleksi</label>
                    <div class="relative overflow-x-autorounded-xl border border-gray-200 mt-3">
                        <!-- Scrollable container -->
                        <div class="overflow-y-auto max-h-64">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-100 sticky top-0">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            Kode Eksemplar
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            Tipe Koleksi
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            Lokasi
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                            Lokasi Rak
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
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
                                                <a href="#" class="inline-block px-3 py-1 text-yellow-600 hover:text-yellow-800 hover:bg-yellow-100 rounded-md text-xs font-medium transition">Edit</a>
                                                <a href="#" class="inline-block px-3 py-1 text-red-600 hover:text-red-800 hover:bg-red-100 rounded-md text-xs font-medium transition">Hapus</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data eksemplar.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    

                </div>
            </div>

            <div class="card border shadow max-h-max">
                <div class="card-body">
                    <div class="table-responsive">
                        <label class="font-bold text-xl text-gray-800">Berkas</label>
                        <div class="flex flex-col mt-3">
                            <label for="pdfFile" class="mb-2 font-semibold text-gray-700">
                                File <span class="text-red-500">*</span>
                            </label>

                            <label for="pdfFile"
                                class="w-full h-32 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 bg-gray-50 rounded-md cursor-pointer hover:bg-gray-100 transition">
                                <div class="text-gray-500">
                                    <span class="font-medium">Drag & Drop</span> your files or
                                    <span class="underline">Browse</span>
                                </div>
                                <input id="pdfFile" type="file" accept=".pdf" class="hidden" />
                            </label>

                            <p class="text-sm text-gray-400 mt-2">
                                Untuk saat ini hanya berkas <strong>.pdf</strong> yang didukung.
                            </p>
                        </div>

                        <div class="flex flex-col mt-3">
                            <label for="jumlah" class="mb-1">Jumlah Halaman</label>
                            <input type="number" id="jumlah" name="jumlah"
                                class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg"
                                placeholder="Masukkan angka..." />
                        </div>

                        <div class="flex flex-col mt-3">
                            <label for="jumlah" class="mb-1">Jumlah Copy</label>
                            <input type="number" id="jumlah" name="jumlah"
                                class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg"
                                placeholder="Masukkan angka..." />
                        </div>

                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Reset</button>
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-[150px]">Simpan</button>
            </div>
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
@endsection
