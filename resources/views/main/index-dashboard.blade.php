@extends('layouts.master')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
@endsection

@section('pageContent')
    <div class="row">
        <!-- Card Ringkasan -->
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold">{{ $totalBuku }}</h3>
                        <div style="background-color: #F1F864;" class="rounded-5 p-2">
                            <i class="ti ti-book"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="mb-0 text-muted">Jumlah total buku</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold">{{ $peminjamanHariIni }}</h3>
                        <div style="background-color: #A2B8FF;" class="rounded-5 p-2">
                            <i class="ti ti-vocabulary"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="mb-0 text-muted">Jumlah peminjaman hari ini</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold">{{ $jumlahPeminjaman }}</h3>
                        <div style="background-color: #FF8E8E;" class="rounded-5 p-2">
                            <i class="ti ti-book-2"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="mb-0 text-muted">Jumlah peminjaman</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6 mb-4">
            <div class="card text-center shadow">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold">{{ $jumlahAnggota }}</h3>
                        <div style="background-color: #49FF38;" class="rounded-5 p-2">
                            <i class="ti ti-user"></i>
                        </div>
                    </div>
                    <hr>
                    <p class="mb-0 text-muted">Jumlah anggota</p>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <!-- Grafik Peminjaman -->
        <form method="GET" class="mb-3">
            <label for="filterTahun" class="form-label">Pilih Tahun:</label>
            <select name="tahun" id="filterTahun" class="form-select w-auto d-inline-block"
                onchange="this.form.submit()">
                @php
                    $currentYear = now()->year;
                @endphp
                @for ($year = $currentYear; $year >= $currentYear - 5; $year--)
                    <option value="{{ $year }}" {{ request('tahun', $currentYear) == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endfor
            </select>
        </form>
        <div class="col-xl-8 mb-4">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Peminjaman Buku</h5>
                    <p class="card-subtitle text-muted mb-3">Statistik peminjaman buku</p>
                    <div id="peminjamanChart"></div>
                </div>
            </div>
        </div>

        <!-- Kategori Populer & Kunjungan Hari Ini -->
        <div class="col-xl-4 mb-4">
            <div class="card mb-4 shadow">
                <div class="card-body">
                    <h6 class="card-title mb-2">Kategori yang sering dipinjam</h6>
                    <div id="kategoriChart"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body shadow">
                    <h6 class="card-title mb-2">Pengunjung Hari ini</h6>
                    <p class="text-muted">Selengkapnya</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var peminjamanChart = new ApexCharts(document.querySelector("#peminjamanChart"), {
            chart: {
                type: 'line',
                height: 300
            },
            series: [{
                name: 'Peminjaman',
                data: {!! json_encode($peminjamanChartData->pluck('total')) !!}
            }],
            xaxis: {
                categories: {!! json_encode($peminjamanChartData->map(fn($d) => \Carbon\Carbon::create()->month($d->bulan)->format('M'))) !!}
            }
        });
        peminjamanChart.render();

        var kategoriChart = new ApexCharts(document.querySelector("#kategoriChart"), {
            chart: {
                type: 'bar',
                height: 200
            },
            series: [{
                name: 'Jumlah',
                data: {!! json_encode($kategoriPopuler->pluck('jumlah')) !!}
            }],
            xaxis: {
                categories: {!! json_encode($kategoriPopuler->pluck('kategori')) !!}
            }
        });
        kategoriChart.render();
    </script>
@endsection
