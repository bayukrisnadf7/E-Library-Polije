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
                    <p class="md:text-lg text-sm md:max-w-3xl max-w-xs">Sebagai salah satu sarana penunjang akademik memiliki
                        peran cukup strategis
                        dalam penyediaan
                        informasi perkembangan ilmu pengetahuan bagi pengguna dilingkungan civitas akademika Politeknik
                        Negeri Jember. Perpustakaan sebagai bagian selalu berupaya untuk memberikan yang terbaik sesuai
                        motto kami untuk menjadi One Stop Information Service Provider dalam hal pemenuhan kebutuhan
                        informasi yang dapat menunjang pelaksanaan akademis di Politeknik Negeri Jember.</p>
                    <div class="flex gap-5">
                        <button
                            class="bg-[#3694A8] md:px-5  md:py-3 text-white md:w-48 w-52 md:text-base text-xs rounded-xl flex gap-2 justify-center font-bold items-center">Pinjam
                            Buku <img src="img/Vector (4).png" alt=""
                                class="bg-white md:p-2 p-1.5 rounded-full"></button>
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
        <div class="mt-20 mb-10 md:mx-20 mx-10">
            <div class="flex flex-col items-center justify-center text-center gap-1 font-bold text-2xl text-[#2A1D43]">
                <p>Siap menjelajah pengetahuan? Ketik judul</p>
                <p>atau topik favoritmu!</p>
                <hr class="md:w-1/6 w-[250px] border-t-4 border-[#5B9BC1] mt-2">
            </div>
            <div class="relative mt-10">
                <input type="text"
                    class="w-full p-5 rounded-full border-2   border-[#5B9BC1] mt-1 placeholder:text-gray-400 placeholder:font-bold"
                    placeholder="Cari buku...">
                <img src="img/Vector (6).png" alt="" class="absolute right-8 bottom-5">
            </div>

            <div
                class="flex flex-col items-center justify-center text-center gap-1 font-bold text-2xl text-[#2A1D43] mt-10">
                <p>Layanan</p>
                <hr class="w-[110px] border-t-4 border-[#5B9BC1] mt-2">
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 justify-items-center gap-10 mt-10 mx-auto">
                <button class="flex flex-col gap-2 group max-w-[250px] text-center">

                    <img src="img/APA AJA PKM (13).png" alt="">
                    <div class="flex flex-col gap-1 text-center font-bold">
                        <p>Usulan Bahan</p>
                        <p class="">Pustaka</p>
                        <hr class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                    </div>
                </button>
                <button class="flex flex-col gap-2 group max-w-[200px]">
                    <img src="img/APA AJA PKM (14).png" alt="">
                    <div class="flex flex-col gap-1 text-center font-bold">
                        <p>Sirkulasi</p>
                        <hr class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                    </div>
                </button>
                <button class="flex flex-col gap-2 group max-w-[200px]">
                    <img src="img/APA AJA PKM (15).png" alt="">
                    <div class="flex flex-col gap-1 text-center font-bold">
                        <p>Penelusuran Bahan</p>
                        <p class="">Pustaka</p>
                        <hr class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                    </div>
                </button>
            </div>
            <div class="mt-10">
                <div class="swiper mySwiper w-full">
                    <div class="swiper-wrapper w-full">
                        <!-- Slide 1 -->
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col gap-2 group">
                                <img src="img/sipora.png" alt="">
                                <div class="flex flex-col gap-1 text-center font-bold">
                                    <p>SIPORA</p>
                                </div>
                                <hr
                                    class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                            </button>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col gap-2 group">
                                <img src="img/tugas akhir.png" alt="">
                                <div class="flex flex-col gap-1 text-center font-bold">
                                    <p>Pengumpulan Laporan</p>
                                    <p>Tugas Akhir/Skripsi/Tesis</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col gap-2 group">
                                <img src="img/laporan.png" alt="">
                                <div class="flex flex-col gap-1 text-center font-bold">
                                    <p>Penelusuran Laporan</p>
                                    <p>PKL/Magang</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col gap-2 group">
                                <img src="img/turnitin.png" alt="">
                                <div class="flex flex-col gap-1 text-center font-bold">
                                    <p>Pengecekan Simmiliarity</p>
                                    <p>Menggunakan Turnitin</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col gap-2 group">
                                <img src="img/siputri.png" alt="">
                                <div class="flex flex-col gap-1 text-center font-bold">
                                    <p>SIPUTRI</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col gap-2 group">
                                <img src="img/skbp.png" alt="">
                                <div class="flex flex-col gap-1 text-center font-bold">
                                    <p>SKBP</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col gap-2 group">
                                <img src="img/kartu super.png" alt="">
                                <div class="flex flex-col gap-1 text-center font-bold">
                                    <p>Kartu Super</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <!-- Tambahkan slide lain sesuai kebutuhan -->
                    </div>

                    <!-- Navigasi -->
                    {{-- <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> --}}
                </div>

            </div>
        </div>

            {{-- Section 2 End --}}

            {{-- Section 3 Start --}}
            <div class="mt-20">
                <div class="bg-[#F8F5FC] min-h-screen">
                    <div class="flex flex-col mg:gap-10 gap-5 md:mx-20 mx-5">
                        <p class="text-2xl text-center font-bold text-[#2A1D43] mt-10">Langkah Kami untuk Masa Depan
                            Literasi</p>
                        <div class="flex justify-between bg-white md:p-10 p-5 rounded-xl relative mt-10">
                            <div class="flex flex-col gap-5">
                                <p class="font-bold text-2xl">Visi</p>
                                <p class="md:max-w-xl max-w-[200px] md:text-base text-xs">Menjadikan perpustakaan sebagai wahana Pendidikan, Penelitian,
                                    Pelestarian, Informasi, dan Rekreasi (P3IR)
                                </p>
                            </div>
                            <img src="img/section3-1.png" alt="" class="md:absolute md:bottom-0 md:right-0 md:w-[300px] md:block hidden">
                        </div>
                        <div
                            class="flex flex-row-reverse justify-between bg-white md:p-10 p-5 rounded-xl relative mt-10 mb-20 overflow-visible max-h-[350px]">
                            <div class="flex flex-col gap-5 text-right md:max-w-lg max-w-lg md:text-base text-xs">
                                <p class="font-bold text-2xl">Misi</p>
                                <p>Meningkatkan pelayanan kepada masyarakat melalui pelayanan prima. Mensosialisasikan gemar
                                    membaca dan meningkatkan kesadaran masyarakat terhadap pentingnya perpustakaan.</p>
                                <p>Meningkatkan peran serta, partisipasi, dan kontribusi masyarakat dalam upaya
                                    mengembangkan dan memberdayakan perpustakaan. Menjadikan perpustakaan sebagai
                                    perpustakaan yang dinamis.</p>
                            </div>
                            <img src="img/section3-2.png" alt=""
                                class="md:w-[400px] w-[200px] relative md:-right-0 right-10 bottom-16 md:h-[375px] h-[150px] md:block hidden">
                        </div>
                    </div>
                </div>
            </div>
            {{-- Section 3 End --}}

            {{-- Section 4 Start --}}
            <div class="w-full mt-20">
                <p class="text-xl text-center font-bold text-[#2A1D43]">Jendela Informasi Terknini </p>
                <div class="flex justify-between md:mx-40 mx-5 mt-20 text-[#2A1D43] md:text-lg text-xs">
                    <p class=" font-bold ">Artikel</p>
                    <div class="flex items-center gap-2 cursor-pointer">
                        <p class="font-semibold">Selengkapnya</p>
                        <img src="img/Vector (5).png" alt="" class="bg-black p-1 rounded-full">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 md:gap-36 gap-10 mx-5 md:mx-40 mt-10">
                    <div class="flex flex-col gap-5 md:max-w-[350px] rounded-2xl bg-[#F8F5FC]">
                        <img src="img/artikel.png" alt="" class="rounded-xl">
                        <div class="flex flex-col gap-2 p-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa</p>
                            <p>21/02/2025</p>
                            <p class="md:line-clamp-6 line-clamp-5">Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa. Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara
                                optimal, mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5 max-w-[350px] rounded-2xl bg-[#F8F5FC]">
                        <img src="img/artikel.png" alt="" class="rounded-xl">
                        <div class="flex flex-col gap-2 p-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa</p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6">Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa. Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara
                                optimal, mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5 max-w-[350px] rounded-2xl bg-[#F8F5FC]">
                        <img src="img/artikel.png" alt="" class="rounded-xl">
                        <div class="flex flex-col gap-2 p-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa</p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6">Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa. Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara
                                optimal, mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,</p>
                        </div>
                    </div>

                </div>


                <div class="flex justify-between md:mx-40 mx-5 mt-20 text-[#2A1D43] md:text-lg text-xs">
                    <p class=" font-bold ">Artikel</p>
                    <div class="flex items-center gap-2 cursor-pointer">
                        <p class="font-semibold">Selengkapnya</p>
                        <img src="img/Vector (5).png" alt="" class="bg-black p-1 rounded-full">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 md:gap-36 gap-10 mx-5 md:mx-40 mt-10">
                    <div class="flex flex-col gap-5 max-w-[350px] rounded-2xl bg-[#F8F5FC]">
                        <img src="img/artikel.png" alt="" class="rounded-xl">
                        <div class="flex flex-col gap-2 p-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa</p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6">Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa. Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara
                                optimal, mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5 max-w-[350px] rounded-2xl bg-[#F8F5FC]">
                        <img src="img/artikel.png" alt="" class="rounded-xl">
                        <div class="flex flex-col gap-2 p-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa</p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6">Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa. Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara
                                optimal, mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,</p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-5 max-w-[350px] rounded-2xl bg-[#F8F5FC]">
                        <img src="img/artikel.png" alt="" class="rounded-xl">
                        <div class="flex flex-col gap-2 p-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa</p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6">Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa. Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara
                                optimal, mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{-- Section 4 End --}}
    @endsection
