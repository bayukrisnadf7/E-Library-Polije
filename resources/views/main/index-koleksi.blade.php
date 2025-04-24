@extends('layouts.master')

@section('title', 'Data Buku')
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
@endsection
@section('pageContent')
    <div class="d-flex gap-2 mb-4">
        <button type="button" onclick="showContent('berita')" id="btnBerita" class="btn btn-primary active">
            <i class="bi bi-newspaper me-1"></i> Berita
        </button>

        <button type="button" onclick="showContent('artikel')" id="btnArtikel" class="btn btn-outline-danger">
            <i class="bi bi-journal-text me-1"></i> Artikel
        </button>
    </div>


    <div class="card border mt-3">
        <div class="card-body">

            <!-- Konten Berita -->
            <div id="kontenBerita">
                <div class="datatables">
                    {{-- Search dan Filter --}}
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        {{-- KIRI: Search + Filter + Export --}}
                        <div class="d-flex align-items-center gap-2">
                            <div class="position-relative" style="width: 250px;">
                                <i
                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                                <input type="text" id="searchInput" class="form-control ps-4">
                            </div>

                            <button class="btn btn-outline-secondary" onclick="toggleFilter()">
                                <i class="ti ti-filter"></i> Filter
                            </button>

                            <button onclick="window.location.href='/admin/main/export-bibliography'"
                                class="btn btn-outline-success">
                                <i class="ti ti-table-export"></i> Export
                            </button>
                        </div>

                        {{-- KANAN: Aksi Tambah, Export, Hapus --}}
                        <div class="d-flex gap-2">
                            <button onclick="window.location.href='/admin/main/tambah-bibliography'"
                                class="btn btn-primary">
                                <i class="ti ti-plus"></i> Tambah Berita
                            </button>
                            <button class="btn btn-danger" onclick="deleteSelected()">
                                <i class="ti ti-trash"></i> Hapus yang Terpilih
                            </button>
                        </div>
                    </div>


                    <div class="card border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped text-nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll" onclick="toggleAll(this)"></th>
                                            <th>Judul Buku</th>
                                            <th>ISBN</th>
                                            <th>Tahun Terbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($books as $item)
                                            <tr>
                                                <td><input type="checkbox" class="book-checkbox" value="{{ $item->id_buku }}"></td>
                                                <td>{{ $item->judul_buku }}</td>
                                                <td>{{ $item->ISBN }}</td>
                                                <td>{{ $item->tahun_terbit }}</td>
                                                <td>
                                                    <a href="/admin/edit-bibliography/{{ $item->id_buku }}" class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                                    <a class="btn btn-danger" onclick="return confirmDelete('{{ $item->id_buku }}')"><i class="ti ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Konten Artikel -->
            <div id="kontenArtikel" class="d-none">
                <div class="datatables">
                    {{-- Search dan Filter --}}
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        {{-- KIRI: Search + Filter + Export --}}
                        <div class="d-flex align-items-center gap-2">
                            <div class="position-relative" style="width: 250px;">
                                <i
                                    class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                                <input type="text" id="searchInput" class="form-control ps-4">
                            </div>

                            <button class="btn btn-outline-secondary" onclick="toggleFilter()">
                                <i class="ti ti-filter"></i> Filter
                            </button>

                            <button onclick="window.location.href='/admin/main/export-bibliography'"
                                class="btn btn-outline-success">
                                <i class="ti ti-table-export"></i> Export
                            </button>
                        </div>

                        {{-- KANAN: Aksi Tambah, Export, Hapus --}}
                        <div class="d-flex gap-2">
                            <button onclick="window.location.href='/admin/main/tambah-bibliography'"
                                class="btn btn-primary">
                                <i class="ti ti-plus"></i> Tambah Artikel
                            </button>
                            <button class="btn btn-danger" onclick="deleteSelected()">
                                <i class="ti ti-trash"></i> Hapus yang Terpilih
                            </button>
                        </div>
                    </div>


                    <div class="card border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped text-nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll" onclick="toggleAll(this)"></th>
                                            <th>Judul Buku</th>
                                            <th>ISBN</th>
                                            <th>Tahun Terbit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        @foreach ($books as $item)
                                            <tr>
                                                <td><input type="checkbox" class="book-checkbox" value="{{ $item->id_buku }}"></td>
                                                <td>{{ $item->judul_buku }}</td>
                                                <td>{{ $item->ISBN }}</td>
                                                <td>{{ $item->tahun_terbit }}</td>
                                                <td>
                                                    <a href="/admin/edit-bibliography/{{ $item->id_buku }}" class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                                    <a class="btn btn-danger" onclick="return confirmDelete('{{ $item->id_buku }}')"><i class="ti ti-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody> --}}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
<script>
    function showContent(type) {
        const btnBerita = document.getElementById('btnBerita');
        const btnArtikel = document.getElementById('btnArtikel');
        const kontenBerita = document.getElementById('kontenBerita');
        const kontenArtikel = document.getElementById('kontenArtikel');

        if (type === 'berita') {
            btnBerita.classList.add('active');
            btnArtikel.classList.remove('active');
            btnArtikel.classList.replace('btn-danger', 'btn-outline-danger');
            btnBerita.classList.replace('btn-outline-primary', 'btn-primary');

            kontenBerita.classList.remove('d-none');
            kontenArtikel.classList.add('d-none');
        } else {
            btnArtikel.classList.add('active');
            btnBerita.classList.remove('active');
            btnBerita.classList.replace('btn-primary', 'btn-outline-primary');
            btnArtikel.classList.replace('btn-outline-danger', 'btn-danger');

            kontenArtikel.classList.remove('d-none');
            kontenBerita.classList.add('d-none');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        showContent('berita'); // default tampilan awal
    });
</script>

@endsection
