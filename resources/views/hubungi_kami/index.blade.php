@extends('main')

@section('content')
<div class="min-h-screen bg-white py-16 px-4 md:px-10">
    <div class="max-w-6xl mx-auto">
        <!-- Judul -->
        <div class="text-center mb-12 animate-fade-in">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Hubungi Perpustakaan Polije</h2>
            <p class="text-gray-600 text-lg">Ada pertanyaan, kritik, atau saran? Silakan isi formulir di bawah ini atau hubungi kami langsung.</p>
        </div>

        <!-- Konten Dua Kolom -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 animate-slide-up">
            <!-- Formulir Kontak -->
            <div>
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

            <!-- Kontak & Alamat -->
            <div class="space-y-5">
                <h3 class="text-xl font-semibold text-[#3694A8]">Informasi Kontak</h3>
                <p class="text-gray-700">
                    📍 <strong>Alamat:</strong> Jl. Mastrip, Kotak Pos 164, Jember, Jawa Timur 68101<br>
                    
                </p>
                <p class="text-gray-700">
                    🕐 <strong>Jam Layanan:</strong> Senin – Jumat, 08.00 – 16.00 WIB
                </p>
                <p class="text-gray-700">
                    📞 <strong>Telepon:</strong> (0331) 333-532<br>
                     
                </p>
                <p class="text-gray-700">
                    ✉️ <strong>Email:</strong> <a href="mailto:perpustakaan@polije.ac.id"
                        class="text-[#3694A8] hover:underline">perpustakaan@polije.ac.id</a>
                </p>
                <p class="text-gray-700">
                    🌐 <strong>Website:</strong> <a href="https://library.polije.ac.id" target="_blank"
                        class="text-[#3694A8] hover:underline">library.polije.ac.id</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection