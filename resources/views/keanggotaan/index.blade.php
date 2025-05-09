@extends('main')

@section('content')
    <div class="relative">
        <!-- Header -->
        <div class="relative h-96">
            <img src="{{ asset('img/layanan.png') }}" alt="Keanggotaan" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center gap-2">
                <h1 class="text-white text-4xl font-bold">Keanggotaan</h1>
                <p class="text-white">UPA Perpustakaan Polije</p>
            </div>
        </div>

        <!-- Konten -->
        <div class="max-w-5xl mx-auto px-6 py-16 space-y-10">

            <!-- Label -->
            <div class="flex items-center">
                <div class="bg-indigo-900 text-white text-sm font-semibold px-4 py-2 rounded-md shadow">
                    Peraturan Keanggotaan
                </div>
            </div>

            <!-- Ketentuan Umum -->
            <div class="flex flex-col gap-2">
                <h2 class="text-2xl font-bold mb-4">I. Ketentuan Umum</h2>
                <p>1. Permohonan keanggotaan diajukan kepada Kepala Perpustakaan Politeknik Negeri Jember dengan syarat :
                </p>
                <div class="mx-3 text-[#9289a3]">
                    <p>a. Menyerahkan formulir yang telah diisi.</p>
                    <p>b. Menyerahkan 2 lembar past photo ukuran 3x2 Cm.</p>
                    <p>c. Membayar biaya administrasi.</p>
                </div>

                <p>2. Kartu Anggota Perpustakaan dapat digunakan sebagai syarat untuk :
                </p>
                <div class="mx-3 text-[#9289a3]">
                    <p>a.  Menggunakan fasilitas Perpustakaan.</p>
                    <p>b. Pembuatan Surat KeteranganKarya Deposit.</p>
                </div>

                <p>3. Masa berlaku Kartu Anggota Perpustakaan( KAP )
                </p>
                <div class="mx-3 text-[#9289a3]">
                    <p>a. Dosen, Teknisi, Administrasi selama Menjadi Pegawai (Registrasi tiap tahun).</p>
                    <p>b. Mahasiswa selama Menjadi Mahasiswa  (Registrasi tiap tahun).</p>
                </div>

                <p>4. Permintaan pembuatan Kartu Anggota Perpustakaan karena hilang, wajib dilengkapi bukti laporan Kepolisian dan akan diganti Kartu Anggota baru setelah membayar biaya administrasi.
                </p>
            </div>

            <!-- Masyarakat Umum -->
            <div>
                <h2 class="text-2xl font-bold mb-4">II. Masyarakat Umum</h2>
                <ol class="list-decimal list-inside space-y-1 text-sm text-gray-800">
                    <li>Menyerahkan fotokopi KTP</li>
                    <li>Mengisi formulir anggota masyarakat umum</li>
                    <li>Membayar biaya administrasi</li>
                    <li>Keanggotaan berlaku selama 1 tahun</li>
                    <li>Anggota hanya bisa meminjam koleksi umum</li>
                    <li>Maksimal pinjaman 3 eksemplar</li>
                </ol>
            </div>

            <!-- Mahasiswa -->
            <div>
                <h2 class="text-2xl font-bold mb-4">III. Mahasiswa</h2>
                <ol class="list-decimal list-inside space-y-1 text-sm text-gray-800">
                    <li>Mengisi formulir keanggotaan</li>
                    <li>Menunjukkan KTM dan bukti pembayaran SPP</li>
                    <li>Keanggotaan aktif selama masa studi</li>
                    <li>Dapat meminjam koleksi sesuai ketentuan</li>
                </ol>
            </div>

            <!-- Teknisi -->
            <div>
                <h2 class="text-2xl font-bold mb-4">IV. Teknisi</h2>
                <ol class="list-decimal list-inside space-y-1 text-sm text-gray-800">
                    <li>Mengisi formulir pendaftaran</li>
                    <li>Menunjukkan surat pengantar resmi dari instansi</li>
                    <li>Masa berlaku kartu keanggotaan 1 tahun</li>
                    <li>Dapat memperpanjang keanggotaan</li>
                </ol>
            </div>

            <!-- Dosen -->
            <div>
                <h2 class="text-2xl font-bold mb-4">V. Dosen</h2>
                <ol class="list-decimal list-inside space-y-1 text-sm text-gray-800">
                    <li>Mengisi formulir keanggotaan</li>
                    <li>Menunjukkan identitas pegawai atau surat tugas</li>
                    <li>Keanggotaan aktif selama masih berstatus dosen aktif</li>
                    <li>Dapat meminjam dan mengakses seluruh koleksi kecuali koleksi langka dan referensi khusus</li>
                </ol>
            </div>
        </div>
    </div>
@endsection
