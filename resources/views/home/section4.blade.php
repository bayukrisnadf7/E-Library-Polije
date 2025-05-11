{{-- Section 4 Start --}}
<div class="w-fullmt-10 min-h-screen">
    <p class="text-xl text-center font-bold text-[#2A1D43] mt-10">Jendela Informasi Terknini </p>
    <div class="flex justify-between md:mt-16 mt-10 text-[#2A1D43] md:text-xl text-sm md:mx-20 mx-5">
        <p class=" font-bold">Berita</p>
        <div class="flex items-center gap-2 cursor-pointer">
            <a href="/berita" class="font-semibold">Selengkapnya</a>
            <img src="img/Vector (5).png" alt="" class="bg-black p-1 rounded-full">
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 md:mx-20 mx-5 gap-10 place-items-center py-10 opacity-0 translate-y-5 transition-all duration-1000 animate-on-scroll-2">
        @foreach ($berita as $item)
            <div class="flex flex-col  bg-white shadow-lg">
                <img src="{{ asset('thumbnails/' . $item->thumbnail) }}" alt="" class="max-h-[270px]">
                <div class="flex flex-col gap-2 md:p-5 p-2">
                    <p class="font-bold">{{ $item->judul}}</p>
                    <div class="flex gap-5">
                        <div class="flex gap-2 items-center text-sm">
                            <img src="img/user.png" alt="" class="w-3 h-3">
                            <p>{{ $item->penulis}}</p>
                        </div>
                        <div class="flex gap-2 items-center text-sm">
                            <img src="img/calendar.png" alt="" class="w-3 h-3">
                            <p>{{ \Carbon\Carbon::parse($item->tanggal_upload)->format('d-m-Y') }}</p>
                        </div>
                    </div>
                    <p class="md:line-clamp-6 line-clamp-3 md:text-[13px] text-sm">{{ $item->abstrak}}</p>
                </div>
            </div>
        @endforeach
    </div>



</div>
{{-- Section 4 End --}}
