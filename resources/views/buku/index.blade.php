@extends('main')

@section('content')
    <div class="w-full min-h-screen bg-[#F8F5FC] flex gap-5 p-5">
        <div class="bg-white w-[330px] p-5 rounded-lg">
            <p class="font-bold text-center">Filter & Kategori</p>

            <div>
                <p></p>
            </div>
        </div>
        <div class="w-full flex flex-col gap-5">
            <input type="text"
                class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500"
                placeholder="Cari buku...">
            <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-5">
                @for ($i = 0; $i < 8; $i++)
                    <div class="bg-white shadow-xl rounded-lg flex flex-col">
                        <img src="img/bukuu.png" alt="Buku" class="rounded-xl max-h-[300px] object-cover p-3">
                        <div class="flex flex-col gap-1 p-3">
                            <h1 class="font-bold text-lg">Machine Learning Generative AI</h1>
                            <p class="text-sm text-gray-600">Pengarang : Bayu Krisna</p>
                            <p class="text-sm text-yellow-500 font-semibold">Rating: 4.5 ⭐</p>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </div>
@endsection
