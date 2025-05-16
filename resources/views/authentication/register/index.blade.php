@extends('main')

@section('content')
<div class="w-full h-screen relative overflow-hidden">
    <!-- Background Gambar -->
    <img src="img/login.png" alt=""
        class="md:absolute lg:block md:block hidden lg:w-auto md:w-[50%] md:h-[100%]">

    <!-- Logo -->
    <div class="absolute top-3 left-5 flex gap-3 items-center">
        <img src="img/logopol.png" alt="Logo" class="md:w-14 w-10">
        <div class="flex flex-col text-black font-bold md:text-sm text-xs">
            <p>UPA PERPUSTAKAAN</p>
            <div class="flex md:gap-[19px] gap-[17px]">
                <p>P</p><p>O</p><p>L</p><p>I</p><p>J</p><p>E</p>
            </div>
        </div>
    </div>

    <!-- Form Registrasi -->
    <div class="relative flex h-screen justify-between items-center lg:mx-40 md:mx-28 mx-10">
        <!-- Gambar Samping -->
        <img src="img/login-1.png" alt="" class="lg:block md:block hidden lg:w-[400px] md:w-[270px]">

        <!-- Form -->
        <div class="flex flex-col gap-5 w-[400px]">
            <img src="img/logopol.png" alt="" width="100" class="mx-auto">
            <p class="text-center font-bold">Registrasi Akun</p>

            <div class="flex flex-col gap-3 w-full max-w-md mx-auto mt-2">
                <form action="{{ route('register') }}" method="POST" class="flex flex-col gap-3" novalidate>
                    @csrf

                    <!-- ID User -->
                    <div class="flex flex-col gap-1">
                        <label for="user_id" class="font-medium">ID User (NIM / NIDN)</label>
                        @error('user_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input type="text" name="user_id" id="user_id" value="{{ old('user_id') }}"
                            class="bg-[#E1E1E1] py-2 rounded-lg px-3 placeholder:text-[#A8A8A8] border-none focus:outline-none focus:ring-0"
                            placeholder="ID User">
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col gap-1">
                        <label for="email" class="font-medium">Email</label>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="bg-[#E1E1E1] py-2 rounded-lg px-3 placeholder:text-[#A8A8A8] border-none focus:outline-none focus:ring-0"
                            placeholder="Email">
                    </div>

                    <!-- Nama -->
                    <div class="flex flex-col gap-1">
                        <label for="nama" class="font-medium">Nama</label>
                        @error('nama')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input type="text" name="nama" id="nama" value="{{ old('nama') }}"
                            class="bg-[#E1E1E1] py-2 rounded-lg px-3 placeholder:text-[#A8A8A8] border-none focus:outline-none focus:ring-0"
                            placeholder="Nama Lengkap">
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col gap-1">
                        <label for="password" class="font-medium">Password</label>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input type="password" name="password"
                            class="bg-[#E1E1E1] py-2 rounded-lg px-3 placeholder:text-[#A8A8A8] border-none focus:outline-none focus:ring-0"
                            placeholder="Password">
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="flex flex-col gap-1">
                        <label for="password_confirmation" class="font-medium">Ulangi Password</label>
                        <input type="password" name="password_confirmation"
                            class="bg-[#E1E1E1] py-2 rounded-lg px-3 placeholder:text-[#A8A8A8] border-none focus:outline-none focus:ring-0"
                            placeholder="Ulangi Password">
                    </div>

                    <!-- Tombol Daftar -->
                    <button type="submit"
                        class="bg-[#3694A8] py-3 rounded-lg text-white font-bold mt-2">Daftar</button>
                </form>

                <!-- Link Login -->
                <div class="flex flex-col gap-2">
                    <p class="text-center">Sudah Punya Akun?
                        <a href="/login" class="text-[#334B48] hover:text-[#3694A8]">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
