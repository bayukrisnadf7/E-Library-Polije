@extends('main')

@section('content')

    <div class="flex justify-center items-center h-screen w-full gap-64">
        <img src="img/login.png" alt="" width="500">
        <div class="flex flex-col gap-5 w-[400px]">
            <img src="img/logopol 1.png" alt="" width="100" class="mx-auto">
            <p class="text-center font-bold">Login Ke Akun Anda</p>

            <div class="flex flex-col gap-3 w-full">
                <div class="flex flex-col gap-1">
                    <p>Email</p>
                    <input type="" class="bg-[#E1E1E1] py-2 rounded-lg px-3">
                </div>
                <div class="flex flex-col gap-1">
                    <p>Password</p>
                    <input type="" class="bg-[#E1E1E1] py-2 rounded-lg px-3">
                </div>
                <button class="bg-[#3694A8] py-3 rounded-lg text-white font-bold mt-1">Login</button>
            </div>
            <div class="flex flex-col gap-2">
                <p class="text-center">Belum Punya Akun? <a href=""
                        class="text-[#334B48] hover:text-[#3694A8]">Daftar</a></p>
                <p class="text-center">Lupa Password? <a href="" class="text-[#334B48] hover:text-[#3694A8]">Reset
                        Password</a></p>
            </div>
        </div>
    </div>
@endsection
