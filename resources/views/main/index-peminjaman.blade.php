@extends('layouts.master')

@section('title', 'Data Peminjaman')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('pageContent')
    <div class="card border shadow-sm p-4 rounded-3">
        <p class="fw-bold fs-4">Pencarian Peminjaman</p>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <form method="GET" action="{{ route('main.index-peminjaman') }}" class="d-flex gap-2">
                    <div class="position-relative" style="width: 250px;">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control ps-4" placeholder="Cari...">
                    </div>
                    <button type="submit" class="btn btn-outline-muted">
                        <i class="ti ti-search"></i> Cari
                    </button>

                    @if(request()->has('search') || request()->has('status_peminjaman') || request()->has('tanggal'))
                        <a href="{{ route('main.index-peminjaman') }}" class="btn btn-outline-secondary">
                            <i class="ti ti-refresh"></i> Reset
                        </a>
                    @endif
                </form>

                <!-- Tombol Filter Modal -->
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
                    <i class="ti ti-filter"></i> Filter
                </button>

                <button onclick="window.location.href='/admin/export-peminjaman'" class="btn btn-outline-danger">
                    <i class="ti ti-table-export"></i> Export
                </button>
            </div>

            <div class="d-flex gap-2">
                <button onclick="window.location.href='/admin/tambah-peminjaman'" class="btn btn-outline-success">
                    <i class="ti ti-plus"></i> Tambah Peminjaman
                </button>
                <button class="btn btn-outline-warning" onclick="deleteSelected()">
                    <i class="ti ti-trash"></i> Hapus yang Terpilih
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Filter -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="GET" action="{{ route('main.index-peminjaman') }}" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filter Data Peminjaman</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status_peminjaman" class="form-label">Status</label>
                        <select class="form-select" name="status_peminjaman">
                            <option value="">-- Semua --</option>
                            <option value="1" {{ request('status_peminjaman') == '1' ? 'selected' : '' }}>Telah Kembali</option>
                            <option value="0" {{ request('status_peminjaman') == '0' ? 'selected' : '' }}>Sedang Dipinjam</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Peminjaman</label>
                        <input type="date" class="form-control" name="tanggal" value="{{ request('tanggal') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Terapkan Filter</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border mt-3 rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-nowrap align-middle">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll" onclick="toggleAll(this)"></th>
                            <th>ID Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Kode Eksemplar</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjaman as $item)
                            <tr>
                                <td><input type="checkbox" class="book-checkbox" value="{{ $item->user_id }}"></td>
                                <td>{{ $item->user_id }}</td>
                                <td>{{ $item->user->nama ?? '-' }}</td>
                                <td>{{ $item->kode_eksemplar }}</td>
                                <td>{{ $item->tgl_peminjaman }}</td>
                                <td>{{ $item->tgl_pengembalian }}</td>
                                <td>
                                    @if ($item->status_peminjaman == 1)
                                        <span class="badge bg-success">Telah Kembali</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Sedang Dipinjam</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 pb-4 d-flex justify-content-end">
                <div class="pagination pagination-sm">
                    {{ $peminjaman->appends(request()->query())->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
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

        function deleteSelected() {
            const selected = Array.from(document.querySelectorAll('.book-checkbox:checked'))
                .map(cb => cb.value);

            if (selected.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Tidak ada peminjaman yang dipilih!'
                });
                return;
            }

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `Anda akan menghapus ${selected.length} data terpilih.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/main/hapus-peminjaman-massal?ids=' + selected.join(',');
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
