@extends('main')

@section('content')
    <div class="max-w-screen">
        {{-- Section 1 Start --}}
        <div class="bg-[#F8F5FC] md:min-h-screen max-h-[710px]">
            <div class="flex md:justify-between flex-col md:flex-row items-center">
                <div
                    class="text-[#2A1D43] flex flex-col md:gap-8 gap-4 w-full md:p-10 mx-20 p-5 opacity-0 translate-x-[-50px] transition-all duration-1000 animate-on-scroll">
                    <div class="flex flex-col md:gap-5 gap-1">
                        <p class="md:text-5xl text-2xl font-bold">Perpustakaan</p>
                        <p class="md:text-5xl text-2xl font-bold">Politeknik Negeri Jember</p>
                    </div>
                    <p class="md:text-lg text-sm md:max-w-3xl max-w-xs">
                        Sebagai salah satu sarana penunjang akademik memiliki
                        peran cukup strategis
                        dalam penyediaan
                        informasi perkembangan ilmu pengetahuan bagi pengguna dilingkungan civitas akademika Politeknik
                        Negeri Jember. Perpustakaan sebagai bagian selalu berupaya untuk memberikan yang terbaik sesuai
                        motto kami untuk menjadi One Stop Information Service Provider dalam hal pemenuhan kebutuhan
                        informasi yang dapat menunjang pelaksanaan akademis di Politeknik Negeri Jember.
                    </p>
                    <div class="flex gap-5">
                        <button
                            class="bg-[#3694A8] md:px-5 md:py-3 text-white md:w-48 w-52 md:h-[56px] h-[40px] md:text-base text-xs rounded-xl flex gap-2 justify-center font-bold items-center">
                            Pinjam Buku <img src="img/Vector (4).png" alt=""
                                class="bg-white md:p-2 p-1.5 rounded-full">
                        </button>
                        <button
                            class="bg-transparent py-3 text-black w-48 md:h-[56px] h-[40px] md:text-base text-xs rounded-xl flex gap-2 font-bold items-center justify-center relative cursor-pointer hover:text-black after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-black hover:after:w-full after:transition-all after:duration-300">
                            Hubungi Kami<img src="img/Vector (5).png" alt="" class="bg-black p-2 rounded-full">
                        </button>
                    </div>
                </div>
                <img src="img/section1.png" alt="Gambar"
                    class="w-[520px] h-[520px] md:block hidden opacity-0 translate-x-[50px] transition-all duration-1000 animate-on-scroll">
            </div>
            <div class="relative -bottom-[35px] w-full flex justify-center">
                <div class="w-full md:h-[120px] h-full rounded-xl md:mx-[100px] mx-5 flex md:flex-row flex-col overflow-hidden">
                    <!-- Bagian pertama -->
                    <div class="md:w-1/2 w-full md:h-full h-[100px] bg-[#2A1D43]"></div>
                    <!-- Bagian kedua -->
                    <div class="md:w-1/2 w-full md:h-full h-[100px] bg-[#483b60]"></div>
                </div>
            </div>



            <div class="relative md:bottom-[65px] bottom-[150px] flex md:flex-row flex-col justify-between items-center md:w-[1100px] md:mx-40 md:gap-0 gap-[20px] text-white">
                <div class="flex flex-col gap-1">
                    <p class="md:text-xl text-sm font-bold">Siap menjelajah pengetahuan? </p>
                    <p class="md:max-w-[500px] max-w-[280px] md:text-base text-xs">Cari judul buku sesuai dengan topik yang kamu minati,
                        silahkan masukkan
                        judul
                        atau topik di menu pencarian</p>
                </div>
                <div class="relative flex items-center mt-5 md:mt-0">
                    <input type="text" class="md:w-[500px] w-[300px] py-3 px-4 rounded-xl text-black"
                        placeholder="Cari judul buku">
                    <img src="img/search.png" alt="" class="absolute right-4 w-6">
                </div>
            </div>
        </div>
        {{-- Section 1 End --}}

        {{-- Section 2 Start --}}
        <div class="md:mt-10 mt-10 mb-10 md:mx-20 mx-5 min-h-[200px]">
            <div class="flex flex-col items-center justify-center text-center gap-1 font-bold text-2xl text-[#2A1D43] mt-5">
                <p>Layanan</p>
                <hr class="w-[110px] border-t-4 border-[#5B9BC1] mt-2">
            </div>
            <div class="mt-10">
                <div class="swiper mySwiper w-full">
                    <div class="swiper-wrapper w-full">
                        <div class="swiper-slide flex justify-center">
                            <button>
                                <div class="flex flex-col items-center gap-2 group text-center w-[200px]">
                                    <img src="img/penelusuran.png" alt="">
                                    <div class="flex flex-col justify-center items-center gap-1 text-center font-bold">
                                        <p>Penelusuran Buku</p>
                                        <p>Pustaka</p>
                                        <hr
                                            class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button>
                                <div class="flex flex-col items-center gap-2 group text-center w-[200px]">
                                    <img src="img/sirkulasi.png" alt="">
                                    <div class="flex flex-col justify-center items-center gap-1 text-center font-bold">
                                        <p>Sirkulasi</p>
                                        <hr
                                            class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button>
                                <div class="flex flex-col items-center gap-2 group text-center w-[200px]">
                                    <img src="img/usulan.png" alt="">
                                    <div class="flex flex-col justify-center items-center gap-1 text-center font-bold">
                                        <p>Usulan Bahan</p>
                                        <p>Pustaka</p>
                                        <hr
                                            class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                    </div>
                                </div>
                            </button>
                        </div>
                        <!-- Slide 1 -->
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col justify-center gap-2 group">
                                <img src="img/sipora.png" alt="">
                                <div class="flex flex-col justify-center gap-1 text-center font-bold">
                                    <p>SIPORA</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <!-- Slide 2 -->
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col justify-center gap-2 group">
                                <img src="img/tugas akhir.png" alt="">
                                <div class="flex flex-col justify-center gap-1 text-center font-bold">
                                    <p>Pengumpulan Laporan</p>
                                    <p>Tugas Akhir/Skripsi/Tesis</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <!-- Slide 3 -->
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col justify-center gap-2 group">
                                <img src="img/laporan.png" alt="">
                                <div class="flex flex-col justify-center gap-1 text-center font-bold">
                                    <p>Penelusuran Laporan</p>
                                    <p>PKL/Magang</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col justify-center gap-2 group">
                                <img src="img/turnitin.png" alt="">
                                <div class="flex flex-col justify-center gap-1 text-center font-bold">
                                    <p>Pengecekan Simmiliarity</p>
                                    <p>Menggunakan Turnitin</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col justify-center gap-2 group">
                                <img src="img/siputri.png" alt="">
                                <div class="flex flex-col justify-center gap-1 text-center font-bold">
                                    <p>SIPUTRI</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col justify-center gap-2 group">
                                <img src="img/skbp.png" alt="">
                                <div class="flex flex-col justify-center gap-1 text-center font-bold">
                                    <p>SKBP</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                        <div class="swiper-slide flex justify-center">
                            <button class="flex flex-col justify-center gap-2 group">
                                <img src="img/kartu super.png" alt="">
                                <div class="flex flex-col justify-center gap-1 text-center font-bold">
                                    <p>Kartu Super</p>
                                    <hr
                                        class="w-0 group-hover:w-full transition-all duration-300 border-b-4 border-[#5B9BC1] mx-auto">
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Section 2 End --}}

        {{-- Section 3 Start --}}
        <div class="md:mt-20 mt-10">
            <div class="bg-[#F8F5FC] max-h-max">
                <div class="flex flex-col md:gap-10 gap-5 md:mx-20 mx-5">
                    <p class="text-2xl text-center font-bold text-[#2A1D43] mt-10">Langkah Kami untuk Masa Depan
                        Literasi</p>
                    <div
                        class="flex justify-between bg-white md:p-10 p-5 rounded-xl relative mt-10 opacity-0 translate-x-[-50px] transition-all duration-1000 animate-on-scroll">
                        <div class="flex flex-col gap-5">
                            <p class="font-bold text-2xl">Visi</p>
                            <p class="md:max-w-xl max-w-[300px] md:text-base text-sm">Menjadikan perpustakaan sebagai
                                wahana Pendidikan, Penelitian,
                                Pelestarian, Informasi, dan Rekreasi (P3IR)
                            </p>
                        </div>
                        <img src="img/section3-1.png" alt=""
                            class="md:absolute md:bottom-0 md:right-0 md:w-[300px] md:block hidden">
                    </div>
                    <div
                        class="flex flex-row-reverse justify-between bg-white md:p-10 p-5 rounded-xl relative md:mt-10 mb-10 overflow-visible max-h-[350px] opacity-0 translate-x-[50px] transition-all duration-1000 animate-on-scroll">
                        <div class="flex flex-col gap-5 text-right md:max-w-lg max-w-lg md:text-base text-sm">
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
        <div class="w-full md:mt-16 mt-10 min-h-screen">
            <p class="text-xl text-center font-bold text-[#2A1D43]">Jendela Informasi Terknini </p>
            <div class="flex justify-between md:mx-40 mx-5 md:mt-10 mt-10 text-[#2A1D43] md:text-xl text-sm">
                <p class=" font-bold ">Artikel</p>
                <div class="flex items-center gap-2 cursor-pointer">
                    <p class="font-semibold">Selengkapnya</p>
                    <img src="img/Vector (5).png" alt="" class="bg-black p-1 rounded-full">
                </div>
            </div>

            <div
                class="grid grid-cols-1 md:grid-cols-3 md:gap-36 gap-10 mx-5 md:mx-40 mt-10 opacity-0 translate-y-5 transition-all duration-1000 animate-on-scroll-2">
                <div class="flex flex-col gap-5 md:max-w-[350px] rounded-2xl bg-[#F8F5FC]">
                    <img src="img/berita.png" alt="" class="rounded-xl">
                    <div class="flex flex-col gap-2 md:p-5 p-2">
                        <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                            Mahasiswa</p>
                        <p>21/02/2025</p>
                        <p class="md:line-clamp-6 line-clamp-5 md:text-base text-sm">Perpustakaan kampus memiliki peran
                            penting dalam mendukung
                            prestasi akademik mahasiswa. Lebih
                            dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                            sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                            mahasiswa mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara
                            optimal, mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,</p>
                    </div>
                </div>

                <div class="flex flex-col gap-5 md:max-w-[350px] rounded-2xl bg-[#F8F5FC]">
                    <img src="img/berita.png" alt="" class="rounded-xl">
                    <div class="flex flex-col gap-2 md:p-5 p-2">
                        <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                            Mahasiswa</p>
                        <p>21/02/2025</p>
                        <p class="md:line-clamp-6 line-clamp-5 md:text-base text-sm">Perpustakaan kampus memiliki peran
                            penting dalam mendukung
                            prestasi akademik mahasiswa. Lebih
                            dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                            sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                            mahasiswa mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara
                            optimal, mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,</p>
                    </div>
                </div>

                <div class="flex flex-col gap-5 md:max-w-[350px] rounded-2xl bg-[#F8F5FC]">
                    <img src="img/berita.png" alt="" class="rounded-xl">
                    <div class="flex flex-col gap-2 md:p-5 p-2">
                        <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                            Mahasiswa</p>
                        <p>21/02/2025</p>
                        <p class="md:line-clamp-6 line-clamp-5 md:text-base text-sm">Perpustakaan kampus memiliki peran
                            penting dalam mendukung
                            prestasi akademik mahasiswa. Lebih
                            dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                            sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                            mahasiswa mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara
                            optimal, mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,</p>
                    </div>
                </div>

            </div>



        </div>
        {{-- Section 4 End --}}

        {{-- Section 5 Start --}}
        <div class="min-h-screen w-full bg-[#F8F5FC] mt-5 ">
            <div class="flex justify-between md:mx-40 mx-5 text-[#2A1D43] md:text-xl text-sm">
                <p class="font-bold mt-10">Berita</p>
                <div class="flex items-center gap-2 cursor-pointer mt-10">
                    <p class="font-semibold">Selengkapnya</p>
                    <img src="img/Vector (5).png" alt="" class="bg-black p-1 rounded-full">
                </div>
            </div>

            <div
                class="grid grid-cols-1 md:grid-cols-2 gap-5 py-10 md:mx-40 mx-5 opacity-0 translate-y-5 transition-all duration-1000 animate-on-scroll-2">

                <div class="flex md:flex-row flex-col gap-2 rounded-2xl bg-white">
                    <img src="img/berita.png" alt="Gambar Berita"
                        class="md:w-[300px] w-full md:h-[300px] h-[300px]  object-cover rounded-xl">
                    <div class="flex flex-col gap-3 md:p-2 p-2">
                        <p class="font-bold md:text-[16px]">
                            Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi Mahasiswa
                        </p>
                        <p class="md:text-sm text-xs">21/02/2025</p>
                        <p class="md:line-clamp-6 line-clamp-5 text-sm">
                            Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                            Lebih dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi
                            pusat
                            sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu mahasiswa
                            mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                            mahasiswa
                            dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                        </p>
                    </div>
                </div>

                <div class="flex md:flex-row flex-col gap-2 rounded-2xl bg-white">
                    <img src="img/berita.png" alt="Gambar Berita"
                        class="md:w-[300px] w-full md:h-[300px] h-[300px]  object-cover rounded-xl">
                    <div class="flex flex-col gap-3 md:p-2 p-2">
                        <p class="font-bold md:text-[16px]">
                            Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi Mahasiswa
                        </p>
                        <p class="md:text-sm text-xs">21/02/2025</p>
                        <p class="md:line-clamp-6 line-clamp-5 text-sm">
                            Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                            Lebih dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi
                            pusat
                            sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu mahasiswa
                            mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                            mahasiswa
                            dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                        </p>
                    </div>
                </div>

                <div class="flex md:flex-row flex-col gap-2 rounded-2xl bg-white">
                    <img src="img/berita.png" alt="Gambar Berita"
                        class="md:w-[300px] w-full md:h-[300px] h-[300px]  object-cover rounded-xl">
                    <div class="flex flex-col gap-3 md:p-2 p-2">
                        <p class="font-bold md:text-[16px]">
                            Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi Mahasiswa
                        </p>
                        <p class="md:text-sm text-xs">21/02/2025</p>
                        <p class="md:line-clamp-6 line-clamp-5 text-sm">
                            Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                            Lebih dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi
                            pusat
                            sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu mahasiswa
                            mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                            mahasiswa
                            dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                        </p>
                    </div>
                </div>

                <div class="flex md:flex-row flex-col gap-2 rounded-2xl bg-white">
                    <img src="img/berita.png" alt="Gambar Berita"
                        class="md:w-[300px] w-full md:h-[300px] h-[300px]  object-cover rounded-xl">
                    <div class="flex flex-col gap-3 md:p-2 p-2">
                        <p class="font-bold md:text-[16px]">
                            Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi Mahasiswa
                        </p>
                        <p class="md:text-sm text-xs">21/02/2025</p>
                        <p class="md:line-clamp-6 line-clamp-5 text-sm">
                            Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                            Lebih dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi
                            pusat
                            sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu mahasiswa
                            mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                            mahasiswa
                            dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                        </p>
                    </div>
                </div>


            </div>
        </div>
        {{-- Section 5 End --}}
    </div>
@endsection
