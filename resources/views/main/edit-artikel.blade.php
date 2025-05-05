@extends('layouts.master')

@section('title', 'Edit Berita')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    @vite('resources/css/app.css')
@endsection

@section('pageContent')
    <form action="{{ route('artikel.update', $artikel->id_artikel) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row w-100 g-4 h-100">
            <p class="font-bold text-2xl text-gray-800">Edit Berita</p>

            {{-- Kolom Kiri - Upload Thumbnail --}}
            <div class="col-md-4">
                <div class="card border shadow">
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="font-bold text-xl text-gray-800">Thumbnail</label>
                            <div
                                class="relative mt-2 w-full aspect-[16/9] rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center bg-gray-50 hover:bg-gray-100 group overflow-hidden">
                                <img id="previewImage"
                                    src="{{ $artikel->thumbnail ? asset('thumbnails/' . $artikel->thumbnail) : 'https://cdn-icons-png.flaticon.com/512/149/149852.png' }}"
                                    alt="Preview"
                                    class="max-h-full max-w-full object-cover opacity-50 group-hover:opacity-75 transition" />
                                <button id="removeBtn" type="button"
                                    class="absolute top-2 right-2 bg-white border border-gray-300 rounded-full p-1 hover:bg-red-100 text-red-500 hidden z-20">
                                    &times;
                                </button>
                                <input id="coverInput" name="thumbnail" type="file" accept=".png, .jpg, .jpeg"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                    onchange="previewTailwindCover(event)" />
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Format diperbolehkan: <strong>.png</strong>,
                                <strong>.jpg</strong>, <strong>.jpeg</strong>.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan - Form --}}
            <div class="col-md-8">
                <div class="card border shadow max-h-max">
                    <div class="card-body">
                        <label class="font-bold text-xl text-gray-800">Form Berita</label>

                        {{-- Judul --}}
                        <div class="flex flex-col mt-3">
                            <label class="font-medium text-gray-700">Judul Berita <span
                                    class="text-red-500">*</span></label>
                            <input name="judul" type="text" value="{{ old('judul', $artikel->judul) }}"
                                class="mt-1 border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                placeholder="Masukkan judul artikel" required>
                        </div>

                        {{-- Abstrak --}}
                        <div class="flex flex-col mt-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Abstrak <span
                                    class="text-red-500">*</span></label>
                            <textarea name="abstrak" rows="4"
                                class="block p-2.5 w-full h-[220px] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 placeholder-gray-400"
                                placeholder="Masukkan abstrak">{{ old('abstrak', $artikel->abstrak) }}</textarea>
                        </div>

                        {{-- Penulis --}}
                        <div class="flex flex-col mt-3">
                            <label class="font-medium text-gray-700">Penulis <span class="text-red-500">*</span></label>
                            <input name="penulis" type="text" value="{{ old('penulis', $artikel->penulis) }}"
                                class="mt-1 border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                placeholder="Masukkan nama penulis" required>
                        </div>

                        {{-- Tanggal Upload --}}
                        <div class="flex flex-col mt-3">
                            <label class="font-medium text-gray-700">Tanggal Upload <span
                                    class="text-red-500">*</span></label>
                            <input name="tanggal_upload" type="date"
                                value="{{ old('tanggal_upload', \Carbon\Carbon::parse($artikel->tanggal_upload)->format('Y-m-d')) }}"
                                class="mt-1 border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline placeholder-gray-400"
                                required>
                        </div>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-2 mt-4 mb-4">
                    <a href="{{ route('main.index-koleksi') }}"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Batal</a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-[150px]">Simpan</button>
                </div>
            </div>
        </div>
    </form>

    {{-- Script Preview --}}
    <script>
        function previewTailwindCover(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('previewImage');
                preview.src = reader.result;
                preview.classList.remove('opacity-50');
                document.getElementById('removeBtn').classList.remove('hidden');
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        document.getElementById('removeBtn').addEventListener('click', function(e) {
            e.stopPropagation();
            document.getElementById('coverInput').value = '';
            document.getElementById('previewImage').src = 'https://cdn-icons-png.flaticon.com/512/149/149852.png';
            this.classList.add('hidden');
        });
    </script>
@endsection
