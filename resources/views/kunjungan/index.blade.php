@extends('main')

@section('content')
    <div class="w-full min-h-screen">
        {{-- Header --}}
        <div class="flex justify-between items-center p-5 mx-10">
            <div class="flex gap-3 items-center">
                <img src="{{ asset('img/logopol 1.png') }}" alt="Logo" class="md:w-14">
                <div class="flex flex-col text-black font-bold">
                    <p>UPA PERPUSTAKAAN</p>
                    <div class="flex gap-[22px]">
                        @foreach (['P', 'O', 'L', 'I', 'J', 'E'] as $char)
                            <p>{{ $char }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="current-time" class="font-semibold text-black">
                Memuat waktu...
            </div>
        </div>

        {{-- Form --}}
        <form action="{{ route('kunjungan.store') }}" method="POST"
            class="flex flex-col md:mx-40 mx-5 mt-[140px] text-[#2A1D43] md:text-xl text-sm text-center gap-14">
            @csrf
            <div class="flex flex-col gap-5 text-4xl font-bold">
                <p>Jelajahi perpustakaan untuk</p>
                <p>menemukan keindahan ilmu dan wawasan</p>
            </div>
            <div class="flex flex-col place-items-center gap-5 font-semibold">
                <p>Siap untuk membaca buku hari ini? Silahkan masukan NIM/NIP</p>
                <div class="flex gap-3 w-[870px] max-w-full">
                    <input type="text" name="id_user" placeholder="Masukkan NIM atau NIP" required
                        class="w-full p-3 rounded-lg border-2 border-[#5B9BC1] mt-1">
                    <button type="submit"
                        class="bg-[#3694A8] w-56 text-white rounded-xl flex gap-2 justify-center items-center">Konfirmasi</button>
                </div>
            </div>
        </form>

        {{-- Background Shapes --}}
        <div class="flex justify-between mt-32">
            <img src="{{ asset('img/SHAPE.png') }}" alt="">
            <img src="{{ asset('img/SHAPE1.png') }}" alt="" class="relative mt-16">
            <img src="{{ asset('img/SHAPE2.png') }}" alt="">
        </div>
    </div>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Jika sukses --}}
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Selamat Datang!',
                html: `
                <img src="{{ session('user_photo') ? asset('user/' . session('user_photo')) : asset('img/default.png') }}"
                     alt="Foto Profil"
                     style="width: 100px; height: 100px; border-radius: 9999px; object-fit: cover; margin: 10px auto; display: block;">
                <p><strong>ID:</strong> {{ session('user_id') }}</p>
                <p><strong>Nama:</strong> {{ session('user_name') }}</p>
            `,
                icon: 'success',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
        </script>
    @endif



    {{-- Jika error --}}
    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Data Tidak Ditemukan!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Coba Lagi'
            });
        </script>
    @endif
@endsection
