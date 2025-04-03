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
                    @foreach ($books as $book)
                        <div class="bg-white shadow-xl rounded-lg flex flex-col">
                            <img src="{{ asset('covers/' . $book->cover) }}" 
                                alt="{{ $book->title }}" class="rounded-2xl max-h-[350px] p-3">
                            <div class="flex flex-col gap-1 p-3">
                                <h1 class="font-bold text-lg">{{ $book->judul_buku }}</p></h1>
                                <p class="text-sm text-gray-600">Pengarang: {{ $book->pengarang }}</p>
                                <p class="text-sm text-yellow-500 font-semibold">Rating: {{ $book->rating }} ⭐</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            
                <!-- Pagination -->
                <div class="mt-5 flex justify-center">
                    {{ $books->onEachSide(1)->links('vendor.pagination.tailwind') }}
                </div>                
        </div>
    </div>
@endsection
