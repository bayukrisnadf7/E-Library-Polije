@extends('main')

@section('content')
    <div class="w-full md:h-screen max-h-screen relative overflow-hidden">
        <!-- Background Gambar -->
        {{-- <img src="{{ asset('img/logopol 1.png') }}" alt="" class="md:absolute lg:block md:block hidden lg:w-auto md:w-[50%] md:h-[100%]"> --}}
        <div class="absolute top-3 left-5 flex gap-3 items-center">
            <img src="{{ asset('img/logopol 1.png') }}" alt="Logo" class="md:w-14 w-10">
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
            <img src="{{ asset('img/login-1.png') }}" alt=""
                class="lg:block md:block hidden lg:w-[400px] md:w-[270px]">
            <div class=" flex flex-col gap-5 w-[400px]">
                <img src="img/logopol 1.png" alt="" width="100" class="mx-auto">
                <p class="text-center font-bold">Reset Password</p>
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div class="flex flex-col gap-3 w-full">
                        <div class="flex flex-col gap-2">
                            <p>Password</p>
                            <div class="flex gap-2 items-center">
                                <input type="password" name="password"
                                    class="bg-[#E1E1E1] py-3 rounded-lg border-none px-3 w-full placeholder:text-[#A8A8A8]"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <p>Ulangi Password</p>
                            <div class="flex gap-2 items-center">
                                <input type="password" name="password_confirmation"
                                    class="bg-[#E1E1E1] py-3 rounded-lg border-none px-3 w-full placeholder:text-[#A8A8A8]"
                                    placeholder="Ulangi Password">
                            </div>
                        </div>
                        <button type="submit" class="bg-[#3694A8] py-3 rounded-lg text-white font-bold mt-1">Reset
                            Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
