@extends('main')

@section('content')
<div class="max-w-6xl mx-auto p-6 mt-10 bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Profil Saya</h1>

    @if (session('success'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        {{-- KIRI: Form Edit Profil --}}
        <div>
            <div class="flex flex-col items-center mb-6">
                <div class="w-32 h-32 rounded-full overflow-hidden shadow cursor-pointer group relative">
                    <img id="profilePreview"
                         src="{{ $user->foto ? asset('user/' . $user->foto) : asset('img/default.png') }}"
                         alt="Foto Profil"
                         class="object-cover w-full h-full group-hover:opacity-80 transition" />
                
                    <input type="file" id="fotoInput" name="foto" accept="image/*"
                        class="absolute inset-0 opacity-0 cursor-pointer" />
                </div>
                
            </div>

            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama', $user->nama) }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">NIM</label>
                    <input type="text" name="nim" value="{{ old('nim', $user->nim) }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">No. Telepon</label>
                    <input type="text" name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}"
                        class="w-full border p-2 rounded">
                </div>

                {{-- <div class="mb-4">
                    <label class="block text-sm font-medium">Ganti Foto</label>
                    <input type="file" name="foto" class="w-full border p-2 rounded">
                </div> --}}

                <div class="mb-4">
                    <label class="block text-sm font-medium">Password Baru (opsional)</label>
                    <input type="password" name="password" class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
            </form>
        </div>

        {{-- KANAN: Tabel Riwayat Peminjaman --}}
        <div>
            <h2 class="text-xl font-semibold mb-4">Riwayat Peminjaman</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full border text-sm">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border px-4 py-2">Judul Buku</th>
                            <th class="border px-4 py-2">Tanggal Pinjam</th>
                            <th class="border px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Dummy data, nanti bisa diganti dengan data dari DB --}}
                        <tr>
                            <td class="border px-4 py-2">Pemrograman Web</td>
                            <td class="border px-4 py-2">2025-05-01</td>
                            <td class="border px-4 py-2 text-green-600">Dikembalikan</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Sistem Informasi</td>
                            <td class="border px-4 py-2">2025-04-20</td>
                            <td class="border px-4 py-2 text-yellow-600">Dipinjam</td>
                        </tr>
                        {{-- Loop data dinamis nanti di sini --}}
                        {{-- @foreach($riwayat as $pinjam)
                            <tr>...</tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    const fotoInput = document.getElementById('fotoInput');
    const profilePreview = document.getElementById('profilePreview');

    fotoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profilePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection
