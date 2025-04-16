@extends('layouts.master')

@section('title', 'Data Eksemplar')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" />
@endsection

@section('pageContent')
    <div class="datatables">
        <div class="d-flex gap-3">
            <button class="btn btn-success">Export Data</button>
        </div>
        <div class="card border mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped display text-nowrap">
                        <thead>
                            <tr>
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
                                    <td>{{ $item->id_user }}</td>
                                    <td>{{ $item->kode_eksemplar }}</td>
                                    <td>{{ $item->tgl_peminjaman }}</td>
                                    <td>{{ $item->tgl_pengembalian }}</td>
                                    <td>
                                        @if($item->status_peminjaman == 1)
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
        new DataTable('#example');
    </script>
@endsection
