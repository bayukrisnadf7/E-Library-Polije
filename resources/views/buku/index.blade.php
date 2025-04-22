@extends('main')

@section('content')
    <div class="w-full min-h-screen bg-[#F8F5FC] flex gap-5 p-5">
        <div class="w-full flex flex-col gap-5">
            <div class="flex gap-3 items-center">
                <!-- Input Cari -->
                <input type="text"
                    class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500"
                    placeholder="Cari buku...">

                <!-- Tombol Filter -->
                <button onclick="toggleModal()"
                    class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition">
                    Filter
                </button>
            </div>

            <div class="grid lg:grid-cols-5 md:grid-cols-3 grid-cols-2 gap-5">
                @foreach ($books as $book)
                    <div class="bg-white shadow-xl rounded-lg flex flex-col">
                        <img src="{{ asset('covers/' . $book->cover) }}" alt="{{ $book->title }}"
                            class="rounded-2xl max-h-[350px] p-3">
                        <div class="flex flex-col gap-1 p-3">
                            <h1 class="font-bold text-lg">{{ $book->judul_buku }}</p>
                            </h1>
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
    <!-- Overlay Modal -->
    <div id="filterModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
        <!-- Isi Modal -->
        <div class="bg-white rounded-lg w-11/12 max-w-md p-6 shadow-lg relative">
            <h2 class="text-xl font-bold mb-4">Filter Buku</h2>

            <!-- Konten Filter -->
            <div class="mb-4">
                <label for="kategori" class="block mb-2 font-medium">Kategori</label>
                <select id="kategori" class="w-full p-2 border border-gray-300 rounded-lg">
                    <option>Pilih Kategori</option>
                    <option value="novel">Novel</option>
                    <option value="sains">Sains</option>
                    <option value="sejarah">Sejarah</option>
                </select>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end gap-2 mt-6">
                <button onclick="toggleModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                    Batal
                </button>
                <button class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
                    Terapkan
                </button>
            </div>

            <!-- Tombol Close X -->
            <button onclick="toggleModal()"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-xl font-bold">
                &times;
            </button>
        </div>
    </div>
    <script>
        function toggleModal() {
            const modal = document.getElementById('filterModal');
            modal.classList.toggle('hidden');
        }
    </script>
@endsection
