@extends('main')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 grid grid-cols-1 lg:grid-cols-3 gap-8">

    {{-- Artikel --}}
    <div class="lg:col-span-2 space-y-6">
        <div class="text-sm text-gray-500">
            <a href="#" class="hover:underline">Artikel</a> /
            <span class="text-gray-800 font-medium">Digitalisasi Perpustakaan: Meningkatkan Akses dan Minat Baca Masyarakat</span>
        </div>

        <div>
            <img src="img/artikel-1.png" alt="Banner Artikel"
                 class="rounded-xl w-full">
        </div>

        <h1 class="text-3xl font-bold leading-snug">
            Digitalisasi Perpustakaan: <br>Meningkatkan Akses dan Minat Baca Masyarakat
        </h1>

        <div class="flex flex-wrap items-center text-sm text-gray-500 space-x-4">
            <span>📌 Sri Hidayati</span>
            <span>📅 20-09-2019</span>
            <span>🏢 Packt Publishing, BIRMINGHAM - MUMBAI. ProQuest Ebook Central.</span>
        </div>

        <div class="space-y-4 text-justify text-gray-700 leading-relaxed">
            <p>Dalam era digital saat ini, perpustakaan tidak lagi hanya menjadi tempat menyimpan buku fisik, tetapi juga berkembang menjadi pusat informasi berbasis teknologi...</p>
            <p>Salah satu contohnya adalah Perpustakaan Nasional RI yang telah menghadirkan aplikasi iPusnas...</p>
            <p>Transformasi ini bertujuan untuk meningkatkan minat baca masyarakat serta memudahkan akses literasi...</p>
            <p>Meskipun demikian, tantangan tetap ada, seperti keterbatasan akses internet di beberapa daerah...</p>
            <p>Dengan inovasi ini, perpustakaan tetap relevan dan menjadi bagian penting dalam mencerdaskan bangsa.</p>
        </div>
    </div>

    {{-- Sidebar --}}
    <aside class="space-y-6">
        {{-- Rekomendasi --}}
        <div class="space-y-4">
            <h2 class="text-lg font-semibold border-b pb-2">Rekomendasi Berita / Artikel</h2>

            {{-- Card 1 --}}
            <div class="bg-white rounded-xl shadow-sm p-3 flex flex-col space-x-4">
                <img src="img/artikel-2.png" class="rounded-md" alt="">
                <div class="text-sm">
                    <div class="flex gap-2 mt-2">
                        <img src="img/user.png" alt="" class="w-3 h-3">
                        <div class="text-gray-600 text-xs mb-1"> Sri Hidayati · 📅 20-09-2019
                        </div>
                    </div>
                    <p class="font-medium mb-1">Perpustakaan Modern: Menggabungkan Teknologi dan Kenyamanan untuk Meningkatkan Minat Baca</p>
                    <a href="#" class="text-blue-500 hover:underline">Selengkapnya..</a>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white rounded-xl shadow-sm p-3 flex flex-col space-x-4">
                <img src="img/artikel-3.png" class="rounded-md" alt="">
                <div class="text-sm">
                    <div class="flex gap-2 mt-2">
                        <img src="img/user.png" alt="" class="w-3 h-3">
                        <div class="text-gray-600 text-xs mb-1"> Sri Hidayati · 📅 20-09-2019
                        </div>
                    </div>
                    <p class="font-medium mb-1">Perpustakaan Modern: Menggabungkan Teknologi dan Kenyamanan untuk Meningkatkan Minat Baca</p>
                    <a href="#" class="text-blue-500 hover:underline">Selengkapnya..</a>
                </div>
            </div>
        </div>
    </aside>
</div>
@endsection
