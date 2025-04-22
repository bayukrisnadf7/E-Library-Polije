<div class="bg-[#1A2130] w-full">
    <div class="flex justify-between items-center p-4 md:mx-10 gap-10">
        <!-- Logo dan tombol hamburger -->
        <div class="flex justify-between items-center lg:w-auto w-full">
            <a href="/">

                <div class="flex gap-3 items-center">
                    <img src="img/logopol 1.png" alt="Logo" class="md:w-14 w-10">
                    <div class="flex flex-col  text-white font-bold md:text-sm text-xs">
                        <p>UPA PERPUSTAKAAN</p>
                        <div class="flex md:gap-[19px] gap-[17px]">
                            <p>P</p>
                            <p>O</p>
                            <p>L</p>
                            <p>I</p>
                            <p>J</p>
                            <p>E</p>
                        </div>
                    </div>
                </div>

            </a>
            <!-- Tombol hamburger -->
            <button id="menu-toggle" class="lg:hidden md:block block text-3xl focus:outline-none text-white">
                ☰
            </button>
        </div>

        <!-- Menu Navbar -->
        <ul id="nav-menu"
            class="hidden lg:flex flex-col md:flex-row gap-4 font-semibold absolute md:static top-20 left-0 w-full bg-[#F8F5FC] md:w-auto md:bg-transparent md:gap-10 p-5 md:p-0 shadow-lg md:shadow-none md:text-white text-black">
            <a href="/"
                class="relative cursor-pointer md:mt-0 mt-1 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[white] hover:after:w-full after:transition-all after:duration-300">
                Beranda
            </a>
            <li class="relative cursor-pointer group">
                <button id="dropdownButton"
                    class="flex items-center justify-between w-full md:mt-0 mt-1 rounded-sm md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:hover:text-blue-500 dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent md:text-white text-black">
                    Layanan
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar"
                    class="absolute left-0 z-10 hidden group-hover:block md:group-hover:block font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm md:w-96 w-72 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Ulasan Bahan Pustaka
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Sirkulasi
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Penelusuran Bahan Pustaka
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                SIPORA (Sistem Informasi POLIJE Repositori Aset)
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Pengumpulan Laporan Tugas Akhir/Skripsi/Thesis
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Pengumpulan Laporan PKL/Magang
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Pengecekan Simmilarity dengan Turnitin
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                SIPUTRI (Baca E-Book)
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                SKBP (Surat Keterangan Bebas Perpustakaan)
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Kartu Super
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <a href="#"
                class="relative cursor-pointer md:mt-0 mt-1 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[white] hover:after:w-full after:transition-all after:duration-300">
                Artikel
            </a>
            <a href="#"
                class="relative cursor-pointer md:mt-0 mt-1 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[white] hover:after:w-full after:transition-all after:duration-300">
                Berita
            </a>
            <a href="/tentang"
                class="relative cursor-pointer md:mt-0 mt-1 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[white] hover:after:w-full after:transition-all after:duration-300">
                Tentang
            </a>
            <a href="/hubungi-kami"
                class="relative cursor-pointer md:mt-0 mt-1 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[white] hover:after:w-full after:transition-all after:duration-300">
                Hubungi Kami
            </a>
            <li>
                <hr class="my-2 border-gray-300 dark:border-gray-600">
            </li>
            <li>
                <button onclick="window.location.href='/login'"
                    class="md:hidden block md:mt-0 mt-3 font-semibold text-blue-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    Masuk / Daftar
                </button>
            </li>
        </ul>
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Riwayat Lelang</a></li>
                    <li><a class="dropdown-item" href="/notifikasi">Notifikasi</a></li>
                    @if (auth()->user()->status == 1)
                        <li><a class="dropdown-item" href="/pengajuan">Pengajuan Menjadi Lelang</a></li>
                    @endif
                    @if (auth()->user()->status == 2)
                        <li><a class="dropdown-item" href="/upload_barang">Upload Barang</a></li>
                        <li><a class="dropdown-item" href="/riwayat_lelang">Riwayat </a></li>
                    @endif
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
        @else
            <button onclick="window.location.href='/login'"
                class="bg-transparent border-2 font-bold border-white px-5 py-3 text-white w-48 rounded-lg lg:block md:hidden hidden hover:bg-[#3694A8] hover:border-none">
                Masuk / Daftar
            </button>
        @endauth
        <!-- Tombol Login -->


    </div>
</div>
