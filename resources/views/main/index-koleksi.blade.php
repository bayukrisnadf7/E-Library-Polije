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

        <button type="button" onclick="showContent('kategori')" id="btnKategori" class="btn btn-outline-danger">
            <i class="bi bi-list-task me-1"></i>Kategori
        </button>
    </div>


    <div class="card border mt-3">
        <div class="card-body">
            <!-- Konten Berita -->
            <div id="kontenBerita">
                <div class="datatables">
                    {{-- Search dan Filter --}}
                    <div class="card border shadow-sm p-4 rounded-3">
                        <div class="d-flex align-items-center justify-content-between">
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
                                <button onclick="window.location.href='/admin/tambah-berita'" class="btn btn-primary">
                                    <i class="ti ti-plus"></i> Tambah Berita
                                </button>
                                <button class="btn btn-danger" onclick="deleteSelected()">
                                    <i class="ti ti-trash"></i> Hapus yang Terpilih
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="card border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped text-nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAllBerita"
                                                    onclick="toggleAll(this, 'berita')"></th>
                                            <th>Judul Berita</th>
                                            <th>Thumbnail</th>
                                            <th>Nama Penulis</th>
                                            <th>Tanggal Upload</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($berita as $item)
                                            <tr>
                                                <td><input type="checkbox" class="book-checkbox-berita"
                                                        value="{{ $item->id_berita }}"></td>
                                                <td>{{ $item->judul }}</td>
                                                <td><img src="{{ asset('thumbnails/' . $item->thumbnail) }}" width="100"
                                                        alt="Thumbnail"></td>
                                                <td>{{ $item->penulis }}</td>
                                                <td>{{ $item->tanggal_upload }}</td>
                                                <td>
                                                    <a href="/admin/edit-berita/{{ $item->id_berita }}"
                                                        class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                                    <form action="{{ route('berita.destroy', $item->id_berita) }}"
                                                        method="POST" style="display:inline;"
                                                        onsubmit="return confirmDelete(this)">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="ti ti-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
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
                    <div class="card border shadow-sm p-4 rounded-3">
                        <div class="d-flex align-items-center justify-content-between">
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
                                <button onclick="window.location.href='/admin/tambah-artikel'" class="btn btn-primary">
                                    <i class="ti ti-plus"></i> Tambah Artikel
                                </button>
                                <button class="btn btn-danger" onclick="deleteSelected()">
                                    <i class="ti ti-trash"></i> Hapus yang Terpilih
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card shadow-sm border rounded-3">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableArtikel" class="table table-striped text-nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll" onclick="toggleAll(this)"></th>
                                            <th>Judul Artikel</th>
                                            <th>Tumbnail</th>
                                            <th>Nama Penulis</th>
                                            <th>Tanggal Upload</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($artikel as $item)
                                            <tr>
                                                <td><input type="checkbox" class="book-checkbox"
                                                        value="{{ $item->id_artikel }}"></td>
                                                        <td>{{ $item->judul }}</td>
                                                <td><img src="{{ asset('thumbnails/' . $item->thumbnail) }}"
                                                        width="100" alt="Thumbnail"></td>
                                                <td>{{ $item->penulis }}</td>
                                                <td>{{ $item->tanggal_upload }}</td>
                                                <td>{{ $item->kategori }}</td>
                                                <td>
                                                    <a href="/admin/edit-artikel/{{ $item->id_artikel }}"
                                                        class="btn btn-warning"><i class="ti ti-pencil"></i></a>
                                                        <form action="{{ route('artikel.destroy', $item->id_artikel) }}"
                                                            method="POST" style="display:inline;"
                                                            onsubmit="return confirmDelete(this)">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i
                                                                    class="ti ti-trash"></i></button>
                                                        </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konten Kategori -->
            <div id="kontenKategori" class="d-none">
                <div class="datatables">
                    {{-- Search dan Filter --}}
                    <div class="card border shadow-sm p-4 rounded-3">
                        <div class="d-flex align-items-center justify-content-between">
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
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
                                    <i class="ti ti-plus"></i> Tambah Kategori
                                </button>
                                <button class="btn btn-danger" onclick="deleteSelected()">
                                    <i class="ti ti-trash"></i> Hapus yang Terpilih
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="card border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tableKategori" class="table table-striped text-nowrap" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="checkAll" onclick="toggleAll(this)"></th>
                                            <th>Nama Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategori as $item)
                                            <tr>
                                                <td><input type="checkbox" class="book-checkbox"
                                                        value="{{ $item->id_kategori }}"></td>
                                                <td>{{ $item->nama_kategori }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-start gap-2">
                                                        <!-- Tombol Edit -->
                                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#modalEditKategori{{ $item->id_kategori }}">
                                                            <i class="ti ti-pencil"></i>
                                                        </button>

                                                        <!-- Tombol Hapus -->
                                                        <form action="{{ route('kategori.destroy', $item->id_kategori) }}"
                                                            method="POST" onsubmit="return confirm('Hapus kategori?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"><i
                                                                    class="ti ti-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-labelledby="modalTambahKategoriLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahKategoriLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="namaKategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="namaKategori" name="nama_kategori" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Kategori -->
    @foreach ($kategori as $item)
        <div class="modal fade" id="modalEditKategori{{ $item->id_kategori }}" tabindex="-1"
            aria-labelledby="modalEditLabel{{ $item->id_kategori }}" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{ route('kategori.update', $item->id_kategori) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditLabel{{ $item->id_kategori }}">Edit Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="editNamaKategori{{ $item->id_kategori }}" class="form-label">Nama
                                    Kategori</label>
                                <input type="text" class="form-control" id="editNamaKategori{{ $item->id_kategori }}"
                                    name="nama_kategori" value="{{ $item->nama_kategori }}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach


@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatable/datatable-basic.init.js') }}"></script>

    <script>
        function showContent(type) {
            const btnBerita = document.getElementById('btnBerita');
            const btnArtikel = document.getElementById('btnArtikel');
            const btnKategori = document.getElementById('btnKategori');
            const kontenBerita = document.getElementById('kontenBerita');
            const kontenArtikel = document.getElementById('kontenArtikel');
            const kontenKategori = document.getElementById('kontenKategori');

            if (type === 'berita') {
                btnBerita.classList.add('active');
                btnArtikel.classList.remove('active');
                btnKategori.classList.remove('active');

                btnArtikel.classList.replace('btn-danger', 'btn-outline-danger');
                btnBerita.classList.replace('btn-outline-primary', 'btn-primary');
                btnKategori.classList.replace('btn-danger', 'btn-outline-danger');

                kontenBerita.classList.remove('d-none');
                kontenArtikel.classList.add('d-none');
                kontenKategori.classList.add('d-none');

            } else if (type === 'kategori') {
                btnKategori.classList.add('active');
                btnArtikel.classList.remove('active');
                btnBerita.classList.remove('active');

                btnArtikel.classList.replace('btn-danger', 'btn-outline-danger');
                btnBerita.classList.replace('btn-primary', 'btn-outline-primary');
                btnKategori.classList.replace('btn-outline-danger', 'btn-danger');

                kontenKategori.classList.remove('d-none');
                kontenArtikel.classList.add('d-none');
                kontenBerita.classList.add('d-none');

            } else { // artikel
                btnArtikel.classList.add('active');
                btnBerita.classList.remove('active');
                btnKategori.classList.remove('active');

                btnBerita.classList.replace('btn-primary', 'btn-outline-primary');
                btnArtikel.classList.replace('btn-outline-danger', 'btn-danger');
                btnKategori.classList.replace('btn-danger', 'btn-outline-danger');

                kontenArtikel.classList.remove('d-none');
                kontenBerita.classList.add('d-none');
                kontenKategori.classList.add('d-none'); // <- ini yang ditambahkan
            }
        }


        document.addEventListener('DOMContentLoaded', () => {
            showContent('berita'); // default tampilan awal

            // Tampilkan notifikasi flash message dari session
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif
        });

        function confirmDelete(form) {
            event.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data ini tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        // DataTables
        const tableBerita = new DataTable('#example', {
            dom: 't<"d-flex justify-content-between align-items-center mt-3"ip>',
            language: {
                search: "",
                searchPlaceholder: "Cari..."
            }
        });

        // Inisialisasi DataTables untuk Artikel
        const tableArtikel = new DataTable('#tableArtikel', {
            dom: 't<"d-flex justify-content-between align-items-center mt-3"ip>',
            language: {
                search: "",
                searchPlaceholder: "Cari..."
            }
        });

        const tableKategori = new DataTable('#tableKategori', {
            dom: 't<"d-flex justify-content-between align-items-center mt-3"ip>',
            language: {
                search: "",
                searchPlaceholder: "Cari..."
            }
        })
    </script>
@endsection
