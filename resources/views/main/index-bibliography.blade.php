@extends('layouts.master')

@section('title', 'Data Buku')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('pageContent')
    <div class="datatables">
        {{-- Search dan Filter --}}
        <div class="card border shadow-sm p-4 rounded-3">
            <p class="fw-bold fs-4">Pencarian Buku</p>
            <div class="d-flex align-items-center justify-content-between">
                {{-- KIRI: Search + Filter + Export --}}
                <div class="d-flex align-items-center gap-2">
                    <form method="GET" action="{{ route('main.index-bibliography') }}" class="d-flex gap-2">
                        <div class="position-relative" style="width: 250px;">
                            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control ps-4"
                                placeholder="Cari...">
                        </div>
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="ti ti-search"></i> Cari
                        </button>
                        @if (request('search') || request('tahun_terbit') || request('kategori'))
                            <a href="{{ route('main.index-bibliography') }}" class="btn btn-outline-secondary">
                                <i class="ti ti-refresh"></i> Reset
                            </a>
                        @endif
                    </form>

                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
                        <i class="ti ti-filter"></i> Filter
                    </button>

                    <button onclick="window.location.href='/admin/export-bibliography'" class="btn btn-outline-danger">
                        <i class="ti ti-table-export"></i> Export
                    </button>
                </div>

                {{-- KANAN: Tambah Buku + Hapus Terpilih --}}
                <div class="d-flex gap-2">
                    <button onclick="window.location.href='/admin/tambah-bibliography'" class="btn btn-outline-success">
                        <i class="ti ti-plus"></i> Tambah Buku
                    </button>
                    <button class="btn btn-outline-warning" onclick="deleteSelected()">
                        <i class="ti ti-trash"></i> Hapus yang Terpilih
                    </button>
                </div>
            </div>
        </div>

        <div class="card border shadow-sm rounded-3">
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
                        <tbody id="tableBody">
                            @foreach ($buku as $item)
                                <tr>
                                    <td><input type="checkbox" class="book-checkbox" value="{{ $item->id_buku }}"></td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->judul_buku, limit: 60) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->ISBN, 20) }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>
                                        <a href="/admin/edit-bibliography/{{ $item->id_buku }}" class="btn btn-warning">
                                            <i class="ti ti-pencil"></i>
                                        </a>
                                        <form action="{{ route('buku.destroy', $item->id_buku) }}" method="POST"
                                            style="display:inline;" onsubmit="return confirmDelete(this)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-4 pb-4 d-flex justify-content-end">
                    <div class="pagination pagination-sm">
                        {{ $buku->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Filter --}}
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="GET" action="{{ route('main.index-bibliography') }}" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" class="form-control" name="tahun_terbit"
                            value="{{ request('tahun_terbit') }}">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" name="kategori">
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Teknologi" {{ request('kategori') == 'Teknologi' ? 'selected' : '' }}>Teknologi
                            </option>
                            <option value="Sains" {{ request('kategori') == 'Sains' ? 'selected' : '' }}>Sains</option>
                            <option value="Sosial" {{ request('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Terapkan Filter</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function toggleAll(source) {
            document.querySelectorAll('.book-checkbox').forEach(cb => cb.checked = source.checked);
        }

        function confirmDelete(form) {
            event.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data ini tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        function deleteSelected() {
            const selected = Array.from(document.querySelectorAll('.book-checkbox:checked'))
                .map(cb => cb.value);

            if (selected.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Tidak ada buku yang dipilih!'
                });
                return;
            }

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `Anda akan menghapus ${selected.length} buku terpilih.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/main/hapus-anggota-massal?ids=' + selected.join(',');
                }
            });
        }
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 1500,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
@endsection
