@extends('main')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar Cover + Barcode -->
            <div class="col-span-1 space-y-4">
                <div class="bg-white p-4 rounded shadow">
                    <img src="{{ asset('covers/' . ($buku->cover ?? 'default.jpg')) }}"
                        onerror="this.onerror=null;this.src='{{ asset('img/default-book.jpeg') }}';"
                        class="w-full h-auto object-contain rounded" alt="Cover">
                </div>
                <div class="text-center">
                    <form action="{{ route('pinjam.buku', $buku->id_buku) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="mt-4 bg-blue-600 text-white text-sm px-4 py-2 rounded hover:bg-blue-700">
                            Pinjam Buku
                        </button>
                    </form>
                </div>
            </div>

            <!-- Detail Buku -->
            <div class="col-span-3 bg-white p-6 rounded shadow space-y-6">
                <div>
                    <h1 class="text-2xl font-bold">{{ $buku->judul_buku }}</h1>
                    <div class="text-sm text-gray-500 space-x-2">
                        <span>{{ $buku->tahun_terbit }}</span>
                        <span>&bull;</span>
                        <span>{{ $buku->penerbit }}</span>
                        <span>&bull;</span>
                        <span>{{ $buku->tempat_penerbit }}</span>
                    </div>
                </div>
                <p class="text-sm text-gray-700 leading-relaxed">
                    {{ $buku->abstrak ?? 'Tidak ada deskripsi tersedia.' }}
                </p>



                <!-- Info Buku -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p><strong>Pernyataan Tanggung Jawab:</strong> {{ $buku->penanggung_jawab }}</p>
                        <p><strong>Pengarang:</strong> {{ $buku->pengarang }}</p>
                        <p><strong>No. Panggil:</strong> {{ $buku->no_panggil }}</p>
                        <p><strong>Klasifikasi:</strong> {{ $buku->klasifikasi }}</p>
                        <p><strong>Judul Seri:</strong> {{ $buku->judul_seri }}</p>
                        <p><strong>GMD:</strong> {{ $buku->gmd }}</p>
                        <p><strong>Bahasa:</strong> {{ $buku->bahasa }}</p>
                    </div>
                    <div>
                        <p><strong>Penerbit:</strong> {{ $buku->penerbit }}</p>
                        <p><strong>Tempat Terbit:</strong> {{ $buku->tempat_penerbit }}</p>
                        <p><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</p>
                        <p><strong>Subyek:</strong> {{ $buku->subyek }}</p>
                        <p><strong>Deskripsi Fisik:</strong> {{ $buku->deskripsi_fisik }}</p>
                        <p><strong>ISBN:</strong> {{ $buku->ISBN }}</p>
                        <p><strong>Info Detail Spesifik:</strong> {!! nl2br(e($buku->info_detail)) !!}</p>
                    </div>
                </div>

                <!-- Ketersediaan -->
                <div>
                    <h2 class="text-lg font-semibold mb-2">Ketersediaan</h2>
                    <table class="w-full border text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-2 py-1">Kode</th>
                                <th class="border px-2 py-1">Lokasi</th>
                                <th class="border px-2 py-1">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku->eksemplar as $item)
                                <tr>
                                    <td class="border px-2 py-1">{{ $item->kode_eksemplar }}</td>
                                    <td class="border px-2 py-1">{{ $item->lokasi }}</td>
                                    <td class="border px-2 py-1">{{ $item->status }}</td>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                confirmButtonColor: '#d33',
            });
        </script>
    @endif
@endsection
