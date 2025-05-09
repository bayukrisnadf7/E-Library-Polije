@extends('main')

@section('content')
    <div class="relative">
        <!-- Gambar Header -->
        <div class="relative h-96">
            <img src="{{ asset('img/layanan.png') }}" alt="Pelayanan" class="w-full h-[400px] object-cover">
            <div class="absolute inset-0 flex items-center justify-center flex-col gap-5">
                <h1 class="text-white text-4xl font-bold">Tata Tertib</h1>
                <p class="text-white">UPA Perpustakaan Polije</p>
            </div>
        </div>

        <!-- Konten -->
        <div class="max-w-5xl mx-auto px-6 py-16 space-y-10">

            <!-- Heading -->
            <div class="flex items-center">
                <div class="bg-indigo-900 text-white text-sm font-semibold px-4 py-2 rounded-md shadow">
                    Tata Tertib
                </div>
            </div>
        
            <!-- Ketentuan Umum -->
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Ketentuan Umum</h2>
                <ol class="list-decimal list-inside space-y-1 text-sm text-gray-700">
                    <li>Anggota/pengunjung harus berpakaian dan sopan</li>
                    <li>Anggota/pengunjung Perpustakaan harus menitipkan tas, map, buku pribadi di tempat penitipan.</li>
                    <li>Anggota/pengunjung perpustakaan harus mengisi absensi pengunjung perpustakaan</li>
                    <li>Anggota/pengunjung perpustakaan harus menjaga ketenangan, ketertiban selama berada dalam ruangan perpustakaan</li>
                    <li>Bahan pustaka yang telah diambil dari rak agar tetap di letakkan di meja baca</li>
                    <li>Koleksi buku khusus dan referensi hanya di baca di tempat</li>
                    <li>Bagi pengunjung yang ingin memfoto copy bahan pustaka di luar area perpustakaan diwajibkan mengisi buku pinjaman, meninggalkan kartu anggota/KTP dan bahan pustaka dikembalikan pada hari yang sama</li>
                    <li>Pengunjung perpustakaan tidak di kenai biaya apapun memasuki area perpustakaan</li>
                </ol>
            </div>
        
            <!-- Pelanggaran dan Sanksi -->
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Pelanggaran & Sanksi</h2>
                <p class="text-sm text-gray-700 mb-4 text-justify">
                    Anggota/pengunjung perpustakaan yang terbukti melanggar peraturan dan tata tertib yang berlaku akan dikenakan sanksi berupa teguran lisan, teguran tertulis, skorsing peminjaman, dikeluarkan dari keanggotaan perpustakaan. Berikut ini jenis pelanggaran:
                </p>
                <ol class="list-decimal list-inside space-y-1 text-sm text-gray-700">
                    <li>Anggota/pengunjung yang merusak, menghilangkan, atau mencoret-coret bahan pustaka, harus mengganti dengan buku baru yang sama</li>
                    <li>Anggota/pengunjung perpustakaan yang terlambat mengembalikan buku-buku (sirkulasi) peminjaman akan dikenakan denda sebesar 500 per hari per buku</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
