@extends('main')

@section('content')
    <div class="bg-[#F8F5FC]">

        <!-- Banner / Slider -->
        <div id="default-carousel" class="relative w-full h-[350px]" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="relative h-[350px] overflow-hidden">
                <!-- Slide 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/carousel-1.png') }}" class="absolute w-full h-full object-cover" alt="Slide 1">
                    <div
                        class="absolute inset-0 bg-black/50 flex items-center justify-center flex-col text-white text-center">
                        <h1 class="text-3xl font-bold mb-2">Penerapan Deep Learning</h1>
                        <p class="max-w-lg">Pelajari teknologi terkini dengan koleksi terbaik dari perpustakaan kami.</p>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="{{ asset('img/carousel-1.png') }}" class="absolute w-full h-full object-cover" alt="Slide 2">
                    <div
                        class="absolute inset-0 bg-black/50 flex items-center justify-center flex-col text-white text-center">
                        <h1 class="text-3xl font-bold mb-2">Matematika Modern</h1>
                        <p class="max-w-lg">Solusi belajar interaktif dan koleksi digital terbaru.</p>
                    </div>
                </div>
            </div>

            <!-- Slider controls -->
            <button type="button"
                class="absolute top-1/2 left-5 z-30 flex items-center justify-center h-10 w-10 bg-white/30 rounded-full hover:bg-white/60"
                data-carousel-prev>
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button type="button"
                class="absolute top-1/2 right-5 z-30 flex items-center justify-center h-10 w-10 bg-white/30 rounded-full hover:bg-white/60"
                data-carousel-next>
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>

        <!-- Filter dan Search -->
        <div class="max-w-7xl mx-auto px-6 py-8 flex flex-col md:flex-row gap-4 justify-between items-center">
            <div class="flex flex-col md:flex-row gap-3 w-full md:w-auto">
                <select class="rounded-md border border-gray-300 p-2 text-sm">
                    <option>Subject</option>
                    <option>Teknologi</option>
                    <option>Matematika</option>
                </select>
                <select class="rounded-md border border-gray-300 p-2 text-sm">
                    <option>Turun Keurutan</option>
                    <option>Terbaru</option>
                    <option>Terpopuler</option>
                </select>
            </div>
            <div class="w-full md:w-[300px]">
                <input type="text" placeholder="Cari Buku..."
                    class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
        </div>

        <!-- Section Buku -->
        @php
            $dummyBooks = [
                [
                    'judul' => 'Matematika SMA Kelas 12',
                    'pengarang' => 'Budi Santoso',
                    'rating' => 4.5,
                    'cover' => 'dummy-cover.jpg',
                ],
                [
                    'judul' => 'Fisika Dasar',
                    'pengarang' => 'Siti Aminah',
                    'rating' => 4.0,
                    'cover' => 'dummy-cover.jpg',
                ],
                [
                    'judul' => 'Pemrograman Python',
                    'pengarang' => 'Joko Widodo',
                    'rating' => 4.8,
                    'cover' => 'dummy-cover.jpg',
                ],
                [
                    'judul' => 'Bahasa Inggris Akademik',
                    'pengarang' => 'Ani Setiani',
                    'rating' => 4.2,
                    'cover' => 'dummy-cover.jpg',
                ],
            ];
        @endphp

        @foreach (['Untuk Anda', 'Sering Dipinjam', 'Buku Terbaru'] as $label)
            <div class="max-w-7xl mx-auto px-6 py-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">{{ $label }}</h2>
                    <a href="#" class="text-sm text-indigo-600 hover:underline">Lihat semua</a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($dummyBooks as $book)
                        <div class="bg-white rounded-lg shadow hover:shadow-md transition">
                            <img src="{{ asset('img/' . $book['cover']) }}" alt="{{ $book['judul'] }}"
                                class="w-full h-[220px] object-contain rounded-t-lg">
                            <div class="p-3 space-y-1">
                                <p class="text-sm font-bold truncate">{{ $book['judul'] }}</p>
                                <p class="text-xs text-gray-600">Pengarang: {{ $book['pengarang'] }}</p>
                                <p class="text-xs text-yellow-500 font-medium">⭐ {{ $book['rating'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

    </div>
@endsection
