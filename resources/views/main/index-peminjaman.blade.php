@extends('layouts.master')

@section('title', 'Data Buku')

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
                <button onclick="window.location.href='/admin/main/tambah-bibliography'" class="btn btn-primary">
                    <i class="ti ti-plus"></i> Tambah Peminjaman
                </button>
                <button class="btn btn-danger" onclick="deleteSelected()">
                    <i class="ti ti-trash"></i> Hapus yang Terpilih
                </button>
            </div>
        </div>


        <div class="card border mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped display text-nowrap">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="checkAll" onclick="toggleAll(this)"></th>
                                <th>ID Anggota</th>
                                <th>Kode Eksemplar</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $item)
                                <tr>
                                    <td><input type="checkbox" class="book-checkbox" value="{{ $item->id_user }}"></td>
                                    <td>{{ $item->id_user }}</td>
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

        function confirmDelete(id) {
            if (confirm("Apakah Anda yakin ingin menghapus data?")) {
                window.location.href = "/admin/edit-bibliography/" + id;
            } else {
                return false;
            }
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
