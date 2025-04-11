@extends('layouts.master')

@section('title', 'Data Buku')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('pageContent')
    <div class="datatables">
        <div class="d-flex gap-3">
            <button onclick="window.location.href='/main/tambah-buku'" class="btn btn-primary">Tambah Buku</button>
            <button class="btn btn-success">Export Buku</button>
        </div>
        <div class="card border mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped display text-nowrap">
                        <thead>
                            <tr>
                                <th>Judul Buku</th>
                                <th>ISBN</th>
                                <th>Tahun Terbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $item)
                                <tr>
                                    <td>{{ $item->judul_buku }}</td>
                                    <td>{{ $item->ISBN }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
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
@endsection
