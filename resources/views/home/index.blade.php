@extends('main')

@section('content')
    <div class="mx-24">
        {{-- Section 1 Start --}}
        <div class="relative ">
            <img src="img/carousel.png" alt="Gambar" class="w-full">
            <p class="absolute left-24 text-white top-32 text-5xl font-bold">Perpustakaan</p>
            <p class="absolute left-24 text-white top-48 text-5xl font-bold" style="word-spacing: 5px;">
                Politeknik Negeri Jember
            </p>
            <p class="absolute left-24 text-white top-64 max-w-3xl">Sebagai salah satu sarana penunjang akademik memiliki
                peran
                cukup strategis dalam penyediaan informasi
                perkembangan ilmu pengetahuan bagi pengguna dilingkungan civitas akademika Politeknik Negeri Jember.
                Perpustakaan sebagai bagian selalu berupaya untuk memberikan yang terbaik sesuai motto kami untuk menjadi
                One
                Stop Information Service Provider dalam hal pemenuhan kebutuhan informasi yang dapat menunjang pelaksanaan
                akademis di Politeknik Negeri Jember.</p>
            <button
                class="absolute left-24 text-white top-96 bg-gradient-to-r from-[#40E0D0] to-[#5A92DE] px-8 py-3 rounded-xl mt-10 font-bold">
                Peminjaman Buku
            </button>
            <button
                class="absolute right-2.5 bottom-3.5 bg-white rounded-tl-xl rounded-br-xl flex gap-10 justify-center w-1/5 p-5 shadow-lg">
                Hubungi Kami
                <img src="img/navigation-03.png" alt="">
            </button>
        </div>
        {{-- Section 1 End --}}

        {{-- Section 2 Start --}}
        <div class="mt-10 mb-10">
            <div class="flex">
                <input type="text" class="w-full focus:outline-none shadow-xl rounded-s-xl px-5 py-5" placeholder="Cari Buku...">
                <button class="bg-[#334B48] px-5 py-2 rounded-e-xl w-24">
                    <img src="img/search.png" alt="" class="mx-auto">
                </button>
            </div>

            <div class="flex justify-center gap-20 mt-16">
                <div class="relative">
                    <div class=" flex flex-col border-2 rounded-xl p-16 justify-center items-center h-72">
                        <img src="img/e-jurnal.png" alt="" width="80">
                        <p class="font-bold mt-5 text-center">E-Journal Portal</p>
                    </div>
                    <button class="absolute -bottom-6 bg-[#334B48] px-5 py-3 text-white w-full rounded-xl">Pergi ke
                        Halaman</button>
                </div>
                <div class="relative">
                    <div class=" flex flex-col border-2 rounded-xl p-16 justify-center items-center h-72">
                        <img src="img/buku.png" alt="" width="80">
                        <p class="font-bold mt-5 text-center">Katalog Buku</p>
                    </div>
                    <button class="absolute -bottom-6 bg-[#334B48] px-5 py-3 text-white w-full rounded-xl">Pergi ke
                        Halaman</button>
                </div>
                <div class="relative">
                    <div class=" flex flex-col border-2 rounded-xl p-16 justify-center items-center h-72">
                        <img src="img/library.png" alt="" width="80">
                        <p class="font-bold mt-5 text-center">E-Library Portal</p>
                    </div>
                    <button class="absolute -bottom-6 bg-[#334B48] px-5 py-3 text-white w-full rounded-xl">Pergi ke
                        Halaman</button>
                </div>
            </div>

            <div class="flex justify-center mt-20 gap-16">
                <button
                    class="flex justify-center gap-2 border border-slate-950 items-center p-2 rounded-lg w-48 hover:bg-slate-200 transition">
                    <p>Tata Tertib</p>
                    <img src="img/tatib.png" alt="" width="30">
                </button>
                <button
                    class="flex justify-center gap-2 border border-slate-950 items-center p-2 rounded-lg w-48 hover:bg-slate-200 transition">
                    <p>Keanggotaan</p>
                    <img src="img/anggota.png" alt="" width="20" height="10">
                </button>
            </div>
        </div>
        {{-- Section 2 End --}}

        {{-- Section 3 Start --}}
        <div class="mt-20">
            <div class="flex flex-col items-center justify-center text-center gap-3">
                <p class="text-xl font-bold text-[#5A72A0]">Visi & Misi</p>
                <p class="text-3xl font-bold">“Membangun Masa Depan Cerah Melalui Literasi”</p>
            </div>
            <div class="flex items-center justify-center gap-40 mt-10">
                <div class="flex flex-col gap-5 max-w-lg">
                    <p class="text-2xl font-bold">Visi</p>
                    <p>Menjadikan perpustakaan sebagai wahana Pendidikan, Penelitian, Pelestarian, Informasi, dan Rekreasi
                        (P3IR)</p>
                    <p class="text-2xl font-bold">Misi</p>
                    <p>Meningkatkan pelayanan kepada masyarakat melalui pelayanan prima. Mensosialisasikan gemar membaca dan
                        meningkatkan kesadaran masyarakat terhadap pentingnya perpustakaan.
                    </p>
                    <p>Meningkatkan peran serta, partisipasi, dan kontribusi masyarakat dalam upaya mengembangkan dan
                        memberdayakan perpustakaan. Menjadikan perpustakaan sebagai perpustakaan yang dinamis </p>
                </div>
                <img src="img/visimisi.png" alt="">
            </div>
        </div>
        {{-- Section 3 End --}}

        {{-- Section 4 Start --}}
        <div class="relative w-full mx-auto mt-20">
            <p class="text-xl text-center font-bold text-[#5A72A0]">Artikel</p>
            <!-- Slider container -->
            <div class="swiper mt-16 p-10">
                <div class="swiper-wrapper h-[550px]">
                    <!-- Slide 1 -->
                    <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                        <img src="img/artikel.png" alt="" class="max-h-48">
                        <div class="p-3 flex flex-col gap-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa
                            </p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa
                                mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                                mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                            </p>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                        <img src="img/artikel.png" alt="" class="max-h-48">
                        <div class="p-3 flex flex-col gap-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa
                            </p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa
                                mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                                mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                            </p>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                        <img src="img/artikel.png" alt="" class="max-h-48">
                        <div class="p-3 flex flex-col gap-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa
                            </p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa
                                mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                                mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                            </p>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                        <img src="img/artikel.png" alt="" class="max-h-48">
                        <div class="p-3 flex flex-col gap-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa
                            </p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
                                sumber daya pembelajaran yang menawarkan berbagai fasilitas dan layanan untuk membantu
                                mahasiswa
                                mencapai potensi maksimalnya. Dengan memanfaatkan fasilitas perpustakaan secara optimal,
                                mahasiswa dapat meningkatkan produktivitas belajar, memperdalam penelitian,
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide flex flex-col gap-5 max-w-96 border-2 rounded-xl max-h-28">
                        <img src="img/artikel.png" alt="" class="max-h-48">
                        <div class="p-3 flex flex-col gap-5">
                            <p class="font-bold">Mengoptimalkan Fasilitas Perpustakaan Kampus untuk Mendukung Prestasi
                                Mahasiswa
                            </p>
                            <p>21/02/2025</p>
                            <p class="line-clamp-6 overflow-hidden text-ellipsis">
                                Perpustakaan kampus memiliki peran penting dalam mendukung prestasi akademik mahasiswa.
                                Lebih
                                dari sekadar tempat penyimpanan buku, perpustakaan kampus kini bertransformasi menjadi pusat
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".swiper", {
            slidesPerView: 1, // Bisa diubah ke 2 atau lebih
            spaceBetween: 20,
            loop: true, // Agar slider berulang terus
            autoplay: {
                delay: 3000, // Waktu pergantian slide dalam milidetik (3 detik)
                disableOnInteraction: false, // Autoplay tetap berjalan meskipun user berinteraksi
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2
                },
                1024: {
                    slidesPerView: 4
                },
            }
        });
    });
</script>
