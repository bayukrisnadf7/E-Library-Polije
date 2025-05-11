@extends('main')

@section('content')
    <div class="bg-gray-50 py-8 px-4">
        <div class="max-w-6xl mx-auto space-y-8">
            <h2 class="text-white font-bold bg-indigo-900 rounded px-4 py-2 mb-2 inline-block">Profil Saya</h2>
            <div class="grid md:grid-cols-3 gap-6">
                {{-- Kiri: Form Profil --}}
                <div class="bg-white shadow-md rounded-lg p-5 col-span-2">
                    <form id="form-profil" action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-4">
                        @csrf

                        <div class="relative group w-28 h-28 rounded-full overflow-hidden cursor-pointer mx-auto">
                            <img id="preview"
                                src="{{ $user->foto ? asset('user/' . $user->foto) : asset('img/default.png') }}"
                                class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-60"
                                alt="Foto">

                            <!-- Label di atas gambar -->
                            <label for="foto"
                                class="absolute inset-0 flex items-center justify-center bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span
                                    class="text-sm text-white font-medium bg-indigo-600 px-2 py-1 rounded hover:bg-indigo-700">Ganti
                                    Foto</span>
                            </label>

                            <!-- Input terpisah tapi tetap bisa diklik lewat label -->
                            <input type="file" name="foto" id="foto" class="hidden" accept="image/*">
                        </div>

                        <div class="mt-2 text-center">
                            <p class="text-sm text-gray-600">{{ $user->id_user }}</p>
                            <p class="font-bold text-gray-800">{{ $user->nama }}</p>
                        </div>

                        @if ($errors->any())
                            <div class="text-red-500 text-sm">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div>
                            <label class="text-sm">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="w-full bg-gray-100 px-3 py-2 rounded mt-1 border-none">
                        </div>
                        <div>
                            <label class="text-sm">Nama</label>
                            <input type="text" name="nama" value="{{ old('nama', $user->nama) }}"
                                class="w-full bg-gray-100 px-3 py-2 rounded mt-1 border-none">
                        </div>
                        <div>
                            <label class="text-sm">NIM</label>
                            <input type="text" name="nim" value="{{ old('nim', $user->nim) }}"
                                class="w-full bg-gray-100 px-3 py-2 rounded mt-1 border-none">
                        </div>
                        <div>
                            <label class="text-sm">No. Telepon</label>
                            <input type="text" name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}"
                                class="w-full bg-gray-100 px-3 py-2 rounded mt-1 border-none">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded float-right">Simpan
                            Perubahan</button>
                    </form>
                </div>

                {{-- Kanan: Reservasi dan Riwayat --}}
                <div class="space-y-6">
                    <!-- Reservasi -->
                    <div>
                        <h2 class="text-white font-bold bg-indigo-900 rounded px-4 py-2 mb-2 inline-block">Reservasi
                            Peminjaman Buku</h2>
                        <div class="bg-white shadow rounded p-4 flex items-center gap-4">
                            <img src="{{ asset('img/cover.jpg') }}" class="w-14 h-auto" />
                            <div>
                                <p class="font-semibold text-sm">Matematika Siswa Kelas 9</p>
                                <p class="text-xs text-gray-500">Peminjaman: 4 Des - 11 Des</p>
                                <p class="text-lg font-bold mt-1">23.58 <span class="font-normal">Tersisa</span></p>
                            </div>
                            <img src="{{ asset('img/barcode.png') }}" class="w-20 ml-auto" />
                        </div>
                    </div>

                    <!-- Riwayat -->
                    <div>
                        <h2 class="text-white font-bold bg-indigo-900 rounded px-4 py-2 mb-2 inline-block">Histori
                            Peminjaman</h2>
                        <div class="bg-white shadow rounded p-3">
                            <div class="flex justify-between items-center mb-2">
                                <div class="space-x-2">
                                    <button class="bg-indigo-900 text-white text-sm px-3 py-1 rounded">Dipinjam</button>
                                    <button class="text-sm">Dikembalikan</button>
                                </div>
                                <input type="text" placeholder="Cari..." class="text-sm px-2 py-1 border rounded">
                            </div>
                            <table class="w-full text-sm border text-left">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="border px-2 py-1">Judul</th>
                                        <th class="border px-2 py-1">Koleksi</th>
                                        <th class="border px-2 py-1">Lokasi</th>
                                        <th class="border px-2 py-1">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($riwayat as $row)
                                        <tr>
                                            <td class="border px-2 py-1">{{ $row->judul_buku }}</td>
                                            <td class="border px-2 py-1">{{ $row->kode_koleksi }}</td>
                                            <td class="border px-2 py-1">{{ $row->lokasi }}</td>
                                            <td
                                                class="border px-2 py-1 font-semibold {{ $row->status == 'Dikembalikan' ? 'text-green-600' : 'text-yellow-600' }}">
                                                {{ $row->status }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
            });
        </script>
    @endif

    <script>
        // Konfirmasi sebelum simpan
        document.getElementById('form-profil').addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Simpan Perubahan?',
                text: "Perubahan profil Anda akan disimpan.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#2563eb',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });

        // Preview gambar saat pilih file
        document.getElementById('foto').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
