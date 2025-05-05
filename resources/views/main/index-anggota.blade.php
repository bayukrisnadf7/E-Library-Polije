@extends('layouts.master')

@section('title', 'Data Buku')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('pageContent')
    <div class="card border shadow-sm p-4 rounded-3">
        <p class="fw-bold fs-4">Pencarian Anggota</p>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-2">
                <form method="POST" action="{{ route('anggota.index') }}" class="d-flex gap-2">
                    @csrf
                    <div class="position-relative" style="width: 250px;">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                        <input type="text" name="search" value="{{ old('search') }}" class="form-control ps-4" placeholder="Cari...">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">
                        <i class="ti ti-search"></i> Cari
                    </button>
                </form>

                <button class="btn btn-outline-primary" onclick="toggleFilter()">
                    <i class="ti ti-filter"></i> Filter
                </button>

                <button onclick="window.location.href='/admin/export-bibliography'" class="btn btn-outline-danger">
                    <i class="ti ti-table-export"></i> Export
                </button>
            </div>

            <div class="d-flex gap-2">
                <button onclick="window.location.href='/admin/tambah-anggota'" class="btn btn-outline-success">
                    <i class="ti ti-plus"></i> Tambah Anggota
                </button>
                <button class="btn btn-outline-warning" onclick="deleteSelected()">
                    <i class="ti ti-trash"></i> Hapus yang Terpilih
                </button>
            </div>
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
                            <th>Tipe Anggota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($anggota as $item)
                            <tr>
                                <td><input type="checkbox" class="book-checkbox" value="{{ $item->id_user }}"></td>
                                <td>{{ $item->id_user }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    @switch($item->jenis_anggota)
                                        @case(1)
                                            <span class="badge bg-success">Mahasiswa</span>
                                        @break

                                        @case(2)
                                            <span class="badge bg-warning text-dark">Dosen</span>
                                        @break

                                        @case(3)
                                            <span class="badge bg-danger">Teknisi</span>
                                        @break

                                        @case(4)
                                            <span class="badge bg-info">Karyawan</span>
                                        @break

                                        @case(5)
                                            <span class="badge bg-info">Pekerja</span>
                                        @break

                                        @case(6)
                                            <span class="badge bg-info">Admin</span>
                                        @break

                                        @default
                                            <span class="badge bg-secondary">Tidak diketahui</span>
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('anggota.edit', $item->id_user) }}" class="btn btn-warning btn-sm">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    <form action="{{ route('anggota.delete', $item->id_user) }}" method="POST"
                                        class="d-inline" onsubmit="return confirmDelete(this)">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
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
                    {{ $anggota->onEachSide(1)->links('vendor.pagination.bootstrap-5') }}
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
                    text: 'Tidak ada anggota yang dipilih!'
                });
                return;
            }

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `Anda akan menghapus ${selected.length} anggota terpilih.`,
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

        function toggleFilter() {
            alert("Tampilkan panel filter di sini.");
        }
    </script>

    {{-- SweetAlert notifikasi sukses/error --}}
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
