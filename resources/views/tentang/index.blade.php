@extends('main')

@section('content')
    <div class="bg-[#2A1D43] h-[300px]">
        <div class="text-center text-white mb-10 py-10">
            <h2 class="text-4xl font-bold">Tentang Kami</h2>
            <p class="text-lg mt-5">UPA. Perpustakaan</p>
        </div>

        <div class="flex flex-col md:flex-row justify-center gap-10 px-4 md:px-0">
            <!-- Email 1 -->
            <img src="img/perpus-1.jpg" alt="" class=" w-full md:w-72 rounded-xl">

            <img src="img/perpus-2.png" alt="" class=" w-full md:w-72 rounded-xl">
            
            <img src="img/perpus-3.png" alt="" class=" w-full md:w-72 rounded-xl">
            {{-- <img src="img/perpus-3.png" alt="" class=" w-full md:w-72 rounded-xl"> --}}

        </div>
    </div>

    <div class=" bg-white py-48 px-4">
        <div class="mx-20">
            <div class="flex flex-col md:flex-row justify-between items-start gap-10 animate-slide-up">
                <div class="w-full md:w-1/2 space-y-5">
                    <p class="text-4xl font-bold">Mengenal Lebih Dekat</p>
                    <p class="text-4xl font-bold">Perpustakaan Politeknik</p>
                    <p class="text-4xl font-bold">Negeri Jember</p>
                    <!-- Tambahkan detail kontak/alamat lainnya di sini -->
                </div>
                <!-- Garis atau pemisah -->
                <div class="hidden md:block">
                    <img src="{{ asset('img/garis2.png') }}" alt="Garis Vertikal" class="h-full">
                </div>
                <!-- Formulir Kontak -->
                <div class="w-full md:w-1/2">
                    <p>UPT. Perpustakaan Politeknik Negeri Jember adalah Perpustakaan Sentral yang dimiliki oleh Politeknik
                        Negeri Jember, Letaknya yang strategis berada tepat disamping gedung utama, dekat dengan ruang
                        kelas, laboratorium, parkir dan kantin sangat mudah dijangkau dari berbagai penjuru bagi pengguna
                        internal maupun eksternal Politenik Negeri Jember.</p>
                </div>
            </div>
            <div class="mt-20">
                Kemajuan Perpustakaan Politeknik Negeri Jember tidak terlepas dari perhatian pimpinan dan dukungan seluruh
                civitas
                akademika Saat ini Perpustakaan Politeknik Negeri Jember melayani kebutuhan informasi dan bahan pustaka bagi
                15
                Program Studi baik Diploma III maupun Diploma IV dan 3000 orang anggota aktif.
            </div>
        </div>
    </div>
    <div class="min-h-screen bg-[#F8F5FC]">
        <div class="py-20 text-center">
            <p class="font-bold text-2xl">Tim Pengelola Perpustakaan</p>
        </div>
        <div class="flex gap-20 mx-20 justify-center">
            <div class="flex flex-col gap-2 text-center">
                <img src="img/person.png" alt="">
                <p class="font-bold">Marco Polo</p>
                <p>Kepala Perpustakaan</p>
            </div>
            <div class="flex flex-col gap-2 text-center">
                <img src="img/person.png" alt="">
                <p class="font-bold">Marco Polo</p>
                <p>Kepala Perpustakaan</p>
            </div>
            <div class="flex flex-col gap-2 text-center">
                <img src="img/person.png" alt="">
                <p class="font-bold">Marco Polo</p>
                <p>Kepala Perpustakaan</p>
            </div>
            <div class="flex flex-col gap-2 text-center">
                <img src="img/person.png" alt="">
                <p class="font-bold">Marco Polo</p>
                <p>Kepala Perpustakaan</p>
            </div>

        </div>
    </div>
@endsection
