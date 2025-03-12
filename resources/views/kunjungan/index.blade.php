@extends('main')
@section('content')

<div class="w-full min-h-screen">
    <div class="flex justify-between items-center p-5 mx-10">
        <div class="flex gap-3 items-center">
            <img src="img/logopol 1.png" alt="Logo" class="md:w-14">
            <div class="flex flex-col text-black font-bold">
                <p>UPA PERPUSTAKAAN</p>
                <div class="flex gap-[22px]">
                    <p>P</p>
                    <p>O</p>
                    <p>L</p>
                    <p>I</p>
                    <p>J</p>
                    <p>E</p>
                </div>
            </div>
        </div>
        <div id="current-time" class="font-semibold text-black">
            Memuat waktu...
        </div>
    </div>
    <div class="flex flex-col md:mx-40 mx-5 mt-[140px] text-[#2A1D43] md:text-xl text-sm text-center gap-14">
        <div class="flex flex-col gap-5 text-4xl font-bold">
            <p>Jelajahi perpustakaan untuk</p>
            <p>menemukan keindahan ilmu dan wawasan</p>
        </div>
        <div class="flex flex-col place-items-center gap-5 font-semibold">
            <p class="">Siap untuk membaca buku hari ini? Silahkan masukan NIM, NIP / Nomor Paspor anda</p>
            <div class="flex gap-3 w-[870px]">
                <input type="text" name="" id=""
                    class="w-full p-3 rounded-lg border-2 border-[#5B9BC1] mt-1">
                <button
                    class="bg-[#3694A8] w-56 text-white rounded-xl flex gap-2 justify-center items-center">Konfirmasi</button>
            </div>
        </div>
    </div>
    <div class="flex justify-between mt-32">
        <img src="img/SHAPE.png" alt="" class="">
        <img src="img/SHAPE1.png" alt="" class="relative mt-16">
        <img src="img/SHAPE2.png" alt="" class="">
    </div>
</div>

@endsection

