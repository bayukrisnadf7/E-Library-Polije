@extends('main')

@section('content')
<div class="bg-[#2A1D43] h-[270px]">
    <div class="text-center text-white mb-10 py-10">
        <h2 class="text-4xl font-bold">Hubungi Kami</h2>
        <p class="text-lg mt-5">UPT. Perpustakaan</p>
    </div>

    <div class="flex flex-col md:flex-row justify-center gap-10 px-4 md:px-0">
        <!-- Email 1 -->
        <div class="bg-[#4A3D63] text-white rounded-xl p-6 w-full md:w-64 text-center shadow-md">
            <div class="flex items-center justify-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0H6m2 0h2m6 0h2M3 6h18M3 6v12a2 2 0 002 2h14a2 2 0 002-2V6M3 6l9 6 9-6" />
                </svg>
                <span class="text-lg font-bold">Email</span>
            </div>
            <p>Politeknik@polije.ac.id</p>
        </div>

        <!-- WhatsApp -->
        <div class="bg-[#4A3D63] text-white rounded-xl p-6 w-full md:w-64 text-center shadow-md">
            <div class="flex items-center justify-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0H6m2 0h2m6 0h2M3 6h18M3 6v12a2 2 0 002 2h14a2 2 0 002-2V6M3 6l9 6 9-6" />
                </svg>
                <span class="text-lg font-bold">Whatsapp</span>
            </div>
            <p>+62 8913 9238 32</p>
        </div>

        <!-- Email 2 -->
        <div class="bg-[#4A3D63] text-white rounded-xl p-6 w-full md:w-64 text-center shadow-md">
            <div class="flex items-center justify-center gap-2 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0H6m2 0h2m6 0h2M3 6h18M3 6v12a2 2 0 002 2h14a2 2 0 002-2V6M3 6l9 6 9-6" />
                </svg>
                <span class="text-lg font-bold">Email</span>
            </div>
            <p>Politeknik@polije.ac.id</p>
        </div>
    </div>
</div>

<div class=" bg-white py-28 px-4 md:px-10">
    <div class="mx-40">
        <div class="flex flex-col md:flex-row justify-between items-start gap-10 animate-slide-up">
            <div class="w-full md:w-1/2 space-y-5">
                <p class="text-4xl font-bold">FORMULIR</p>
                <p class="text-4xl font-bold">KONTAK</p>
                <!-- Tambahkan detail kontak/alamat lainnya di sini -->
            </div>
             <!-- Garis atau pemisah -->
             <div class="hidden md:block">
                <img src="{{ asset('img/garis.png') }}" alt="Garis Vertikal" class="h-full">
            </div>
            <!-- Formulir Kontak -->
            <div class="w-full md:w-1/2">
                <form action="#" method="POST" class="space-y-5">
                    <div>
                        <label class="block text-gray-700 mb-1 font-medium">Nama Lengkap</label>
                        <input type="text" name="nama" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1 font-medium">Email</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1 font-medium">Pesan</label>
                        <textarea name="pesan" rows="5" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"></textarea>
                    </div>
                    <button type="submit"
                        class="bg-[#3694A8] text-white px-6 py-2 rounded-lg hover:bg-[#2B7A8F] transition">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
    
</div>

<div class="w-[800px] h-[500px] overflow-hidden shadow-lg mx-auto mb-20">
    <iframe
        width="100%"
        height="100%"
        style="border:0;"
        loading="lazy"
        allowfullscreen
        referrerpolicy="no-referrer-when-downgrade"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.298947204232!2d113.7209946!3d-8.1602156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b624959a65%3A0x5105d01c6db05f6c!2sPerpustakaan%20POLIJE!5e0!3m2!1sid!2sid!4v1713981426454!5m2!1sid!2sid">
    </iframe>
</div>


@endsection