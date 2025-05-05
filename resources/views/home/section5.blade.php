{{-- Section 5 Start --}}
<div class="md:min-h-[600px] min-h-[1200px] w-full bg-[#F8F5FC]">
    <div class="flex justify-between md:mx-20 mx-8 text-[#2A1D43] md:text-xl text-sm">
        <p class="font-bold mt-10">Artikel</p>
        <div class="flex items-center gap-2 cursor-pointer mt-10">
            <p class="font-semibold">Selengkapnya</p>
            <img src="img/Vector (5).png" alt="" class="bg-black p-1 rounded-full">
        </div>
    </div>

    <div
        class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 lg:mx-20 gap-14 place-items-center py-10 space-y-14 md:space-y-0 opacity-0 translate-y-5 transition-all duration-1000 animate-on-scroll-2">

        @foreach ($artikel as $item)
            <div class="relative md:w-[400px] w-[350px] md:h-[270px] h-[250px] overflow-visible">
                <!-- Gambar -->
                <img src="{{ asset('thumbnails/' . $item->thumbnail) }}" alt="" class="max-h-[270px]">

                <!-- Background Putih di Atas Gambar (Keluar dari Batas Gambar) -->
                <div
                    class="absolute bg-white flex items-center md:bottom-[-80px] bottom-[-70px] right-0 md:w-[370px] w-[320px] shadow-lg">
                    <div class="flex flex-col gap-2 md:p-5 p-2">
                        <div class="flex gap-5 items-center">
                            <p class="text-black font-semibold md:text-base text-sm">Topik: </p>
                            <p class="bg-[#3694A8] text-white px-1 py-1 rounded-lg md:text-sm text-xs">{{ $item->kategori}}</p>
                        </div>
                        <div class="flex gap-5">
                            <div class="flex gap-2 items-center md:text-sm text-xs">
                                <img src="img/user.png" alt="" class="w-3 h-3">
                                <p>{{ $item->penulis}}</p>
                            </div>
                            <div class="flex gap-2 items-center md:text-sm text-xs">
                                <img src="img/calendar.png" alt="" class="w-3 h-3">
                                <p>{{ \Carbon\Carbon::parse($item->tanggal_upload)->format('d-m-Y') }}</p>
                            </div>
                        </div>
                        <p class="font-semibold md:text-base text-sm">{{ $item->abstrak}}</p>
                    </div>
                </div>
            </div>
        @endforeach



    </div>



</div>
{{-- Section 5 End --}}
