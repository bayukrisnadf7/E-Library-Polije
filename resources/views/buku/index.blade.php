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
                <form method="GET" action="{{ route('buku.index') }}" class="w-full md:w-[300px]">
                    <input type="text" name="search" placeholder="Cari Buku..." value="{{ request('search') }}"
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500">
                </form>
            </div>
        </div>

        <!-- Section Rekomendasi (Jika Ada) -->
        @if (request()->has('search'))
            <div class="max-w-7xl mx-auto px-6 py-6">
                <h2 class="text-lg font-bold mb-4">Hasil Pencarian</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @forelse ($books as $book)
                        <div class="bg-white rounded-lg shadow hover:shadow-md transition">
                            <img src="{{ asset('covers/' . ($book->cover ?? 'default.jpg')) }}"
                                onerror="this.onerror=null;this.src='{{ asset('img/default-book.jpeg') }}';"
                                class="min-w-[200px] h-[220px]  object-contain rounded-t-lg">
                            <div class="p-3 space-y-1">
                                <p class="text-sm font-bold truncate">{{ $book->judul_buku }}</p>
                                <p class="text-xs text-gray-600">Pengarang: {{ $book->pengarang }}</p>
                                <p class="text-xs text-gray-600">Tahun: {{ $book->tahun_terbit }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500">Tidak ada buku ditemukan.</p>
                    @endforelse
                </div>
            </div>
        @else
            @if (isset($rekomendasi) && count($rekomendasi))
                <div class="max-w-7xl mx-auto px-6 py-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-bold">Rekomendasi Untuk Anda</h2>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('buku.index') }}" class="text-sm text-indigo-600 hover:underline">Lihat
                                semua</a>
                            <button onclick="scrollSlider('rekomendasi-slider', -300)" class="text-lg px-2">◀</button>
                            <button onclick="scrollSlider('rekomendasi-slider', 300)" class="text-lg px-2">▶</button>
                        </div>
                    </div>
                    <div id="rekomendasi-slider" class="overflow-x-auto scroll-smooth [&::-webkit-scrollbar]:hidden">
                        <div class="flex gap-4">
                            @foreach ($rekomendasi as $book)
                                <a href="{{ route('buku.detail', $book->id_buku) }}" class="max-w-[200px] bg-white rounded-lg shadow hover:shadow-md transition">
                                    <img src="{{ asset('covers/' . ($book->cover ?? 'default.jpg')) }}"
                                        onerror="this.onerror=null;this.src='{{ asset('img/default-book.jpeg') }}';"
                                        class="min-w-[200px] h-[220px] object-contain rounded-t-lg">
                                    <div class="p-3 space-y-1">
                                        <p class="text-sm font-bold truncate">{{ $book->judul_buku }}</p>
                                        <p class="text-xs text-gray-600">Pengarang: {{ $book->pengarang }}</p>
                                        <p class="text-xs text-gray-600">Tahun: {{ $book->tahun_terbit }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="max-w-7xl mx-auto px-6 py-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Peminjaman Terbanyak</h2>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('buku.index') }}" class="text-sm text-indigo-600 hover:underline">Lihat semua</a>
                        <button onclick="scrollSlider('peminjaman-slider', -300)" class="text-lg px-2">◀</button>
                        <button onclick="scrollSlider('peminjaman-slider', 300)" class="text-lg px-2">▶</button>
                    </div>
                </div>
                <div id="peminjaman-slider" class="overflow-x-auto scroll-smooth [&::-webkit-scrollbar]:hidden">
                    <div class="flex gap-4">
                        @foreach ($peminjamTerbanyak as $item)
                            @php
                                $buku = \App\Models\Buku::find($item->id_buku);
                            @endphp
                            @if ($buku)
                                <a href="{{ route('buku.detail', $buku->id_buku) }}" class="max-w-[200px] bg-white rounded-lg shadow hover:shadow-md transition">
                                    <img src="{{ asset('covers/' . ($buku->cover ?? 'default.jpg')) }}"
                                        onerror="this.onerror=null;this.src='{{ asset('img/default-book.jpeg') }}';"
                                        class="min-w-[200px] h-[220px] object-contain rounded-t-lg">
                                    <div class="p-3 space-y-1">
                                        <p class="text-sm font-bold truncate">{{ $buku->judul_buku }}</p>
                                        <p class="text-xs text-gray-600">Pengarang: {{ $buku->pengarang }}</p>
                                        <p class="text-xs text-gray-600">Tahun: {{ $buku->tahun_terbit }}</p>
                                        <p class="text-xs text-indigo-500">Dipinjam {{ $item->jumlah_peminjaman }}x</p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="max-w-7xl mx-auto px-6 py-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Buku Terbaru</h2>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('buku.index') }}" class="text-sm text-indigo-600 hover:underline">Lihat
                            semua</a>
                        <button onclick="scrollSlider('terbaru-slider', -300)" class="text-lg px-2">◀</button>
                        <button onclick="scrollSlider('terbaru-slider', 300)" class="text-lg px-2">▶</button>
                    </div>
                </div>
                <div id="terbaru-slider" class="overflow-x-auto scroll-smooth [&::-webkit-scrollbar]:hidden">
                    <div class="flex gap-4">
                        @foreach ($bukuTerbaru as $book)
                            <a href="{{ route('buku.detail', $book->id_buku) }}" class="max-w-[200px] bg-white rounded-lg shadow hover:shadow-md transition">
                                <img src="{{ asset('covers/' . ($book->cover ?? 'default.jpg')) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('img/default-book.jpeg') }}';"
                                    class="min-w-[200px] h-[220px] object-contain rounded-t-lg">
                                <div class="p-3 space-y-1">
                                    <p class="text-sm font-bold truncate">{{ $book->judul_buku }}</p>
                                    <p class="text-xs text-gray-600">Pengarang: {{ $book->pengarang }}</p>
                                    <p class="text-xs text-gray-600">Tahun: {{ $book->tahun_terbit }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        function scrollSlider(id, value) {
            const slider = document.getElementById(id);
            slider.scrollBy({
                left: value,
                behavior: 'smooth'
            });
        }
    </script>
@endsection
