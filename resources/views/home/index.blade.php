@extends('main')

@section('content')
    <div class="">
        {{-- Section 1 Start --}}
        <div class="bg-[#F8F5FC] md:min-h-screen min-[650px]">
            <div class="flex md:justify-between flex-col md:flex-row">
                <div class="text-[#2A1D43] flex flex-col md:gap-8 gap-4 w-full md:p-28 p-5">
                    <div class="flex flex-col md:gap-5 gap-1">
                        <p class="md:text-5xl text-2xl font-bold">Perpustakaan</p>
                        <p class="md:text-5xl text-2xl font-bold">Politeknik Negeri Jember</p>
                    </div>
                    <p class="md:text-lg text-sm md:max-w-3xl max-w-xs">Sebagai salah satu sarana penunjang akademik memiliki peran cukup strategis
                        dalam penyediaan
                        informasi perkembangan ilmu pengetahuan bagi pengguna dilingkungan civitas akademika Politeknik
                        Negeri Jember. Perpustakaan sebagai bagian selalu berupaya untuk memberikan yang terbaik sesuai
                        motto kami untuk menjadi One Stop Information Service Provider dalam hal pemenuhan kebutuhan
                        informasi yang dapat menunjang pelaksanaan akademis di Politeknik Negeri Jember.</p>
                    <div class="flex gap-5">
                        <button
                            class="bg-[#3694A8] md:px-5  md:py-3 text-white md:w-48 w-52 md:text-base text-xs rounded-xl flex gap-2 justify-center font-bold items-center">Pinjam
                            Buku <img src="img/Vector (4).png" alt="" class="bg-white md:p-2 p-1.5 rounded-full"></button>
                        <button
                            class="bg-transparent py-3 text-black w-48 md:text-base text-xs rounded-xl flex gap-2 font-bold items-center justify-center relative cursor-pointer hover:text-black after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-black hover:after:w-full after:transition-all after:duration-300">Hubungi
                            Kami<img src="img/Vector (5).png" alt="" class="bg-black p-2 rounded-full"></button>
                    </div>
                </div>
                <img src="img/section-1.png" alt="Gambar" class="w-[650px] h-[600px] md:block hidden" height="40%">
            </div>
        </div>
        {{-- Section 1 End --}}

        {{-- Section 2 Start --}}
        <div class="mt-28 mb-10">
            <div class="flex flex-col items-center justify-center text-center gap-1 font-bold text-2xl text-[#2A1D43]">
                <p>Siap menjelajah pengetahuan? Ketik judul</p>
                <p>atau topik favoritmu!</p>
                <hr class="w-1/6 border-t-4 border-[#5B9BC1] mt-2">
            </div>
            <div class="relative mx-20 mt-10">
                <input type="text"
                    class="w-full p-5 rounded-full border-2   border-[#5B9BC1] mt-1 placeholder:text-gray-400 placeholder:font-bold"
                    placeholder="Cari buku...">
                <img src="img/Vector (6).png" alt="" class="absolute right-8 bottom-5">
            </div>
            <div class="flex justify-center gap-20 mt-20">
                <button class="flex flex-col gap-2">
                    <img src="img/APA AJA PKM (13).png" alt="">
                    <div class="flex flex-col gap-1 text-center font-bold">
                        <p>Usulan Bahan</p>
                        <p class="">Pustaka</p>
                        <hr class="w-[70px] border-t-4 border-[#5B9BC1] mt-2 mx-auto">
                    </div>
                </button>
                <button class="flex flex-col gap-2">
                    <img src="img/APA AJA PKM (14).png" alt="">
                    <div class="flex flex-col gap-1 text-center font-bold">
                        <p>Sirkulasi</p>
                        <hr class="w-[70px] border-t-4 border-[#5B9BC1] mt-2 mx-auto">
                    </div>
                </button>
                <button class="flex flex-col gap-2">
                    <img src="img/APA AJA PKM (15).png" alt="">
                    <div class="flex flex-col gap-1 text-center font-bold">
                        <p>Penelusuran Bahan</p>
                        <p class="">Pustaka</p>
                        <hr class="w-[70px] border-t-4 border-[#5B9BC1] mt-2 mx-auto">
                    </div>
                </button>
                <button class="flex flex-col gap-2">
                    <img src="img/APA AJA PKM (15).png" alt="">
                    <div class="flex flex-col gap-1 text-center font-bold">
                        <p>Penelusuran Bahan</p>
                        <p class="">Pustaka</p>
                        <hr class="w-[70px] border-t-4 border-[#5B9BC1] mt-2 mx-auto">
                    </div>
                </button>
                <button class="flex flex-col gap-2">
                    <img src="img/APA AJA PKM (15).png" alt="">
                    <div class="flex flex-col gap-1 text-center font-bold">
                        <p>Penelusuran Bahan</p>
                        <p class="">Pustaka</p>
                        <hr class="w-[70px] border-t-4 border-[#5B9BC1] mt-2 mx-auto">
                    </div>
                </button>
            </div>
            {{-- Section 2 End --}}

            {{-- Section 3 Start --}}
            <div class="mt-40">
                <div class="bg-[#F8F5FC] min-h-screen">
                    <div class="flex flex-col gap-10 mx-20">
                        <p class="text-2xl text-center font-bold text-[#2A1D43] mt-10">Langkah Kami untuk Masa Depan Literasi</p>
                        <div class="flex justify-between bg-white p-10 rounded-xl relative mt-10">
                            <div class="flex flex-col gap-5">
                                <p class="font-bold text-2xl">Visi</p>
                                <p class="max-w-xl">Menjadikan perpustakaan sebagai wahana Pendidikan, Penelitian, Pelestarian, Informasi, dan Rekreasi (P3IR)
                                </p>
                            </div>
                            <img src="img/section3-1.png" alt="" class="absolute bottom-0 right-0 w-[300px]">
                        </div>
                        <div class="flex flex-row-reverse justify-between bg-white p-10 rounded-xl relative mt-10 mb-20 overflow-visible max-h-[350px]">
                            <div class="flex flex-col gap-5 text-right max-w-lg">
                                <p class="font-bold text-2xl">Misi</p>
                                <p>Meningkatkan pelayanan kepada masyarakat melalui pelayanan prima. Mensosialisasikan gemar membaca dan meningkatkan kesadaran masyarakat terhadap pentingnya perpustakaan.</p>
                                <p>Meningkatkan peran serta, partisipasi, dan kontribusi masyarakat dalam upaya mengembangkan dan memberdayakan perpustakaan. Menjadikan perpustakaan sebagai perpustakaan yang dinamis.</p>
                            </div>
                        <img src="img/section3-2.png" alt="" class="w-[400px] relative -right-0 bottom-16 h-[375px]">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Section 3 End --}}

            {{-- Section 4 Start --}}
            <div class="relative w-full mx-auto mt-20">
                <p class="text-xl text-center font-bold text-[#5A72A0]">Jendela Informasi Terknini </p>
                <!-- Slider container -->
                <div class="swiper mt-10 p-10">
                    <div class="swiper-wrapper h-[550px]">
                        <!-- Slide 1 -->
                        <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                            <img src="img/artikel.png" alt="" class="max-h-52">
                            <div class="p-3 flex flex-col gap-5">
                                <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                    Mahasiswa
                                </p>
                                <p>21/02/2025</p>
                                <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                    Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                    Lebih
                                    dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi
                                    pusat
                                    sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                    mahasiswa
                                    mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                                    mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                                </p>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                            <img src="img/artikel.png" alt="" class="max-h-52">
                            <div class="p-3 flex flex-col gap-5">
                                <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                    Mahasiswa
                                </p>
                                <p>21/02/2025</p>
                                <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                    Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                    Lebih
                                    dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi
                                    pusat
                                    sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                    mahasiswa
                                    mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                                    mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                                </p>
                            </div>
                        </div>

                        <!-- Slide 3 -->
                        <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                            <img src="img/artikel.png" alt="" class="max-h-52">
                            <div class="p-3 flex flex-col gap-5">
                                <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                    Mahasiswa
                                </p>
                                <p>21/02/2025</p>
                                <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                    Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                    Lebih
                                    dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi
                                    pusat
                                    sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                    mahasiswa
                                    mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                                    mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                                </p>
                            </div>
                        </div>

                        <!-- Slide 4 -->
                        <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                            <img src="img/artikel.png" alt="" class="max-h-52">
                            <div class="p-3 flex flex-col gap-5">
                                <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                    Mahasiswa
                                </p>
                                <p>21/02/2025</p>
                                <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                    Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                    Lebih
                                    dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi
                                    pusat
                                    sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                    mahasiswa
                                    mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                                    mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                                </p>
                            </div>
                        </div>

                        <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                            <img src="img/artikel.png" alt="" class="max-h-52">
                            <div class="p-3 flex flex-col gap-5">
                                <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                    Mahasiswa
                                </p>
                                <p>21/02/2025</p>
                                <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                    Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                    Lebih
                                    dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi
                                    pusat
                                    sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                    mahasiswa
                                    mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                                    mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="swiper-button-prev absolute top-1/2 left-0 transform -translate-y-1/2 z-100"></div>
                    <div class="swiper-button-next absolute top-1/2 right-0 transform -translate-y-1/2 z-100"></div>


                    <!-- Pagination -->
                    <div class="swiper-pagination !mt-5 !mb-0"></div>
                </div>
            </div>
        </div>

        {{-- Section 4 End --}}
    @endsection
