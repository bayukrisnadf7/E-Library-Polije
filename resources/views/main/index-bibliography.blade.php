@extends('layouts.master')

@section('title', 'Data Buku')

@section('scripts')
    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false
            });
        </script>
    @endif

    {{-- Vendor & DataTable --}}
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatable/datatable-basic.init.js') }}"></script>

    <script>
        // Inisialisasi DataTable
        const table = new DataTable('#example', {
            dom: 't<"d-flex justify-content-between align-items-center mt-3"ip>',
            language: {
                search: "",
                searchPlaceholder: "Cari..."
            }
        });

        // Custom search
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                table.search(this.value).draw();
            });
        });

        // Konfirmasi hapus
        function confirmDelete(form) {
            event.preventDefault();

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
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

        function toggleAll(source) {
            let checkboxes = document.querySelectorAll('.book-checkbox');
            checkboxes.forEach(cb => cb.checked = source.checked);
        }

        function deleteSelected() {
            let selected = [];
            document.querySelectorAll('.book-checkbox:checked').forEach(cb => {
                selected.push(cb.value);
            });

            if (selected.length === 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Tidak ada buku yang dipilih!',
                    timer: 2000,
                    showConfirmButton: false
                });
                return;
            }

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: selected.length + ' buku terpilih akan dihapus!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/main/hapus-buku-massal?ids=' + selected.join(',');
                }
            });
        }

        function toggleFilter() {
            alert("Tampilkan modal atau panel filter di sini.");
        }
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('pageContent')
    <div class="datatables">
        {{-- Search dan Filter --}}
        <div class="d-flex align-items-center justify-content-between mb-4">
            {{-- KIRI: Search + Filter + Export --}}
            <div class="d-flex align-items-center gap-2">
                <div class="position-relative" style="width: 250px;">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                    <input type="text" id="searchInput" class="form-control ps-4">
                </div>

                <button class="btn btn-outline-secondary" onclick="toggleFilter()">
                    <i class="ti ti-filter"></i> Filter
                </button>

                <button onclick="window.location.href='/admin/main/export-bibliography'" class="btn btn-outline-success">
                    <i class="ti ti-table-export"></i> Export
                </button>
            </div>

            {{-- KANAN: Aksi Tambah, Export, Hapus --}}
            <div class="d-flex gap-2">
                <button onclick="window.location.href='/admin/tambah-bibliography'" class="btn btn-primary">
                    <i class="ti ti-plus"></i> Tambah Buku
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
                        <tbody>
                            @foreach ($books as $item)
                                <tr>
                                    <td><input type="checkbox" class="book-checkbox" value="{{ $item->id_buku }}"></td>
                                    <td>{{ $item->judul_buku }}</td>
                                    <td>{{ $item->ISBN }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>
                                        <a href="/admin/edit-bibliography/{{ $item->id_buku }}" class="btn btn-warning"><i
                                                class="ti ti-pencil"></i></a>
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
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/datatable/datatable-basic.init.js') }}"></script>

    <script>
        // Inisialisasi DataTable dan simpan ke variabel
        const table = new DataTable('#example', {
            dom: 't<"d-flex justify-content-between align-items-center mt-3"ip>',
            language: {
                search: "",
                searchPlaceholder: "Cari..."
            }
        });

        // Custom search dengan input manual
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                table.search(this.value).draw();
            });
        });

        function confirmDelete(form) {
            event.preventDefault(); // cegah submit langsung

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
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

            return false; // cegah form submit default
        }

        function toggleAll(source) {
            let checkboxes = document.querySelectorAll('.book-checkbox');
            checkboxes.forEach(cb => cb.checked = source.checked);
        }

        function deleteSelected() {
            let selected = [];
            document.querySelectorAll('.book-checkbox:checked').forEach(cb => {
                selected.push(cb.value);
            });

            if (selected.length === 0) {
                alert('Tidak ada buku yang dipilih!');
                return;
            }

            if (confirm('Yakin ingin menghapus ' + selected.length + ' buku terpilih?')) {
                window.location.href = '/admin/main/hapus-buku-massal?ids=' + selected.join(',');
            }
        }

        function toggleFilter() {
            alert("Tampilkan modal atau panel filter di sini.");
        }
    </script>
@endsection
