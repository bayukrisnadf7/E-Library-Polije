@extends('layouts.master')

@section('title', 'Data Buku')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('pageContent')
    <div class="datatables">
        <div class="d-flex gap-3">
            <button onclick="window.location.href='/admin/main/tambah-buku'" class="btn btn-primary">Tambah Buku</button>
            <button onclick="window.location.href='/admin/main/export-buku'" class="btn btn-success">Export Buku</button>
            <button class="btn btn-secondary" onclick="selectAll()">Tandai Semua</button>
            <button class="btn btn-warning" onclick="deselectAll()">Hilangkan Semua</button>
            <button class="btn btn-danger" onclick="deleteSelected()">Hapus yang Terpilih</button>
        </div>
        <div class="card border mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped display text-nowrap">
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
                                    <td>
                                        <input type="checkbox" class="book-checkbox" value="{{ $item->id_buku }}">
                                    </td>
                                    <td>{{ $item->judul_buku }}</td>
                                    <td>{{ $item->ISBN }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>
                                        <a href="/admin/main/edit-buku/{{ $item->id_buku }}"
                                            class="btn btn-warning">Edit</a>
                                        <a class="btn btn-danger"
                                            onclick="return confirmDelete('{{ $item->id_buku }}')">Hapus</a>
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
        new DataTable('#example');
    </script>
    <script>
        function confirmDelete(id) {
            // Tampilkan alert konfirmasi
            var result = confirm("Apakah Anda yakin ingin menghapus data?");

            // Jika pengguna mengklik OK, maka arahkan ke URL hapus_data/{id}
            if (result) {
                window.location.href = "/admin/main/hapus_buku/" + id;
            } else {
                // Jika pengguna mengklik Cancel, maka batalkan operasi penghapusan
                return false;
            }
        }
    </script>
    <script>
        // Toggle semua checkbox
        function toggleAll(source) {
            let checkboxes = document.querySelectorAll('.book-checkbox');
            checkboxes.forEach(cb => cb.checked = source.checked);
        }
    
        // Tandai semua manual
        function selectAll() {
            document.querySelectorAll('.book-checkbox').forEach(cb => cb.checked = true);
            document.getElementById('checkAll').checked = true;
        }
    
        // Hilangkan semua centang
        function deselectAll() {
            document.querySelectorAll('.book-checkbox').forEach(cb => cb.checked = false);
            document.getElementById('checkAll').checked = false;
        }
    
        // Hapus yang dicentang
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
                // Kirim request ke route Laravel, misalnya pakai fetch atau arahkan ke URL
                // Contoh redirect dengan query string:
                window.location.href = '/admin/main/hapus-buku-massal?ids=' + selected.join(',');
            }
        }
    </script>    
@endsection
