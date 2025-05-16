@extends('main')

@section('content')
    <div class="w-full md:h-screen max-h-screen relative overflow-hidden">
        <!-- Background Gambar -->
        <img src="img/login.png" alt="" class="md:absolute lg:block md:block hidden lg:w-auto md:w-[50%] md:h-[100%]">
        <div class="absolute top-3 left-5 flex gap-3 items-center">
            <img src="img/logopol.png" alt="Logo" class="md:w-14 w-10">
            <div class="flex flex-col  text-black font-bold md:text-sm text-xs">
                <p>UPA PERPUSTAKAAN</p>
                <div class="flex md:gap-[19px] gap-[17px]">
                    <p>P</p>
                    <p>O</p>
                    <p>L</p>
                    <p>I</p>
                    <p>J</p>
                    <p>E</p>
                </div>
            </div>
        </div>
        <!-- Konten di Atas Gambar -->
        <div class="relative flex h-screen justify-between items-center lg:mx-40 md:mx-28 mx-10">
            <img src="img/login-1.png" alt="" class="lg:block md:block hidden lg:w-[400px] md:w-[270px]">
            <div class=" flex flex-col gap-5 w-[400px]">
                <img src="img/logopol.png" alt="" width="100" class="mx-auto">
                <p class="text-center font-bold">Login Ke Akun Anda</p>
                @if (session('errorLogin'))
                    <div class="text-red-500 text-sm text-center mb-2">
                        {{ session('errorLogin') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex flex-col gap-3 w-full">
                        {{-- ID USER --}}
                        <div class="flex flex-col gap-1">
                            <label for="user_id">ID User</label>

                            @error('user_id')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror

                            <input type="text" name="user_id" id="user_id"
                                class="bg-[#E1E1E1] py-2 rounded-lg px-3 placeholder:text-[#A8A8A8] border-none focus:outline-none focus:ring-0"
                                placeholder="ID User" required>
                        </div>

                        {{-- PASSWORD --}}
                        <div class="flex flex-col gap-1">
                            <label for="password">Password</label>

                            @error('password')
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror

                            <input type="password" name="password" id="password"
                                class="bg-[#E1E1E1] py-2 rounded-lg px-3 placeholder:text-[#A8A8A8] border-none focus:outline-none focus:ring-0"
                                placeholder="Password" required>
                        </div>

                        <button type="submit" class="bg-[#3694A8] py-3 rounded-lg text-white font-bold mt-1">Login</button>
                    </div>
                </form>



                <div class="flex flex-col gap-2">
                    <p class="text-center">Belum Punya Akun? <a href="/register"
                            class="text-[#334B48] hover:text-[#3694A8]">Daftar</a></p>
                    <p class="text-center">Lupa Password? <a href="/lupa-password"
                            class="text-[#334B48] hover:text-[#3694A8]">Reset
                            Password</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    @if (session('loginStatus') === 'success')
        console.log("Login berhasil.");
    @elseif (session('loginStatus') === 'failed')
        console.log("Login gagal: Email atau password salah.");
    @endif
</script>
<script>
    @if (session('success'))
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Registrasi Berhasil!',
                text: 'Silakan login ke akun Anda.',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
            });
        });
    @endif
</script>

