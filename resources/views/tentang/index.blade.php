@extends('main')
@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-50 to-white py-16 px-4 md:px-10">
        <div class="max-w-6xl mx-auto">
            <!-- Judul Section -->
            <div class="text-center mb-12 animate-fade-in">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Perpustakaan Politeknik Negeri Jember</h2>
                <p class="text-gray-600 text-lg">Sumber referensi terpercaya untuk mendukung proses belajar dan penelitian.
                </p>
            </div>

            <!-- Konten Utama -->
            <div class="flex flex-col md:flex-row items-center gap-10 animate-slide-up mt-20">
                <!-- Gambar Perpustakaan -->
                <div class="md:w-1/2">
                    <img src="img/perpus.png"
                        alt="Perpustakaan Polije"
                        class="rounded-2xl shadow-xl w-full object-cover transition-transform hover:scale-105 duration-500">
                </div>

                <!-- Deskripsi Perpustakaan -->
                <div class="md:w-1/2 space-y-4">
                    <h3 class="text-2xl font-semibold text-[#3694A8]">Tentang Perpustakaan</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Perpustakaan Politeknik Negeri Jember menyediakan koleksi buku, jurnal, skripsi, e-book, dan
                        berbagai sumber digital untuk menunjang proses pembelajaran dan penelitian mahasiswa serta dosen.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Dilengkapi dengan layanan peminjaman otomatis, ruang baca yang nyaman, akses Wi-Fi, dan katalog
                        online, perpustakaan menjadi pusat informasi dan literasi kampus yang modern dan ramah teknologi.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
