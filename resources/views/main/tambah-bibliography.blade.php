@extends('layouts.master')

@section('title', 'Data Buku')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
    @vite('resources/css/app.css')
@endsection

@section('pageContent')
    <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row w-100 g-4 h-100">
            <p class="font-bold text-2xl text-gray-800">Tambah Buku</p>
            <div class="col-md-4">
                <div class="card border shadow">
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="font-bold text-xl text-gray-800">Cover <span class="text-red-500">*</span></label>
                            <div
                                class="relative mt-2 w-72 h-80 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center bg-gray-50 hover:bg-gray-100 group">
                                <img id="previewImage" src="https://cdn-icons-png.flaticon.com/512/149/149852.png"
                                    alt="Preview"
                                    class="max-h-full max-w-full object-contain opacity-50 group-hover:opacity-75 transition" />
                                <button id="removeBtn" type="button"
                                    class="absolute top-2 right-2 bg-white border border-gray-300 rounded-full p-1 hover:bg-red-100 text-red-500 hidden z-20">
                                    &times;
                                </button>
                                <input id="coverInput" name="cover" type="file" accept=".png, .jpg, .jpeg"
                                    class="absolute inset-0 opacity-0 cursor-pointer z-10"
                                    onchange="previewTailwindCover(event)" />
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Hanya menerima format <strong>.png</strong>,
                                <strong>.jpg</strong>, <strong>.jpeg</strong>.</p>
                        </div>
                    </div>
                </div>
                <div class="card border shadow h-[514px]">
                    <div class="card-body">
                        <label class="font-bold text-xl text-gray-800">Registrasi</label>
                        @foreach (['ISBN', 'pengarang', 'penerbit', 'tempat_penerbit', 'tahun_terbit'] as $field)
                            <div class="flex flex-col mt-3">
                                <p class="font-medium text-gray-700 capitalize">
                                    {{ str_replace('_', ' ', $field) }} <span class="text-red-500">*</span>
                                </p>
                                <input
                                    name="{{ $field }}"
                                    type="{{ $field === 'tahun_terbit' ? 'number' : 'text' }}"
                                    class="mt-1 border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                    placeholder="Masukan {{ str_replace('_', ' ', $field) }}">
                            </div>
                        @endforeach
                    </div>
                </div>                
            </div>
            <div class="col-md-8">
                <div class="card border shadow max-h-max">
                    <div class="card-body">
                        <label class="font-bold text-xl text-gray-800">Detail</label>
                        <div class="flex flex-col mt-3">
                            <p class="font-medium text-gray-700">Judul <span class="text-red-500">*</span></p>
                            <input name="judul_buku" type="text"
                                class="mt-1 border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                placeholder="Masukan judul buku">
                        </div>
                        <div class="flex flex-col mt-3">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Abstrak <span
                                    class="text-red-500">*</span></label>
                            <textarea name="abstrak" rows="4"
                                class="block p-2.5 w-full h-[220px] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 placeholder-gray-400"
                                placeholder="Masukan sinopsis buku"></textarea>
                        </div>
                        @foreach (['deskripsi_fisik', 'edisi', 'bahasa', 'subyek', 'gmd', 'no_panggil', 'klasifikasi'] as $field)
                            <div class="flex flex-col mt-3">
                                <p class="font-medium text-gray-700 capitalize">{{ str_replace('_', ' ', $field) }} <span
                                        class="text-red-500">*</span></p>
                                <input name="{{ $field }}" type="text"
                                    class="mt-1 border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline placeholder-gray-400 placeholder:text-sm"
                                    placeholder="Masukan {{ str_replace('_', ' ', $field) }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-end gap-2 mt-4">
                    <a href="{{ route ('main.index-bibliography')}}"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Batal</a>
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-[150px]">Simpan</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function previewTailwindCover(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const preview = document.getElementById('previewImage');
                preview.src = reader.result;
                preview.classList.remove('opacity-50');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
        </script>
@endsection
