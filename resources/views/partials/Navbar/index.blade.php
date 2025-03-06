<div class="bg-[#F8F5FC]">
    <div class="flex justify-between items-center p-5 md:mx-20">
        <!-- Logo dan tombol hamburger -->
        <div class="flex justify-between items-center md:w-auto w-full">
            <img src="img/logo.png" alt="Logo" class="md:w-auto w-40">
            <!-- Tombol hamburger -->
            <button id="menu-toggle" class="md:hidden text-3xl focus:outline-none">
                ☰
            </button>
        </div>

        <!-- Menu Navbar -->
        <ul id="nav-menu"
            class="hidden md:flex flex-col md:flex-row gap-6 font-bold absolute md:static top-16 left-0 w-full bg-[#F8F5FC] md:w-auto md:bg-transparent md:gap-12 p-5 md:p-0 shadow-lg md:shadow-none">
            <li
                class="relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300">
                Beranda
            </li>
            <li class="relative cursor-pointer group">
                <button
                    class="flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded-sm hover:text-[#334B48] hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0 md:w-auto dark:text-white dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                    Layanan
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar"
                    class="absolute left-0 z-10 hidden group-hover:block font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-96 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Ulasan Bahan Pustaka
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Sirkulasi
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Penelusuran Bahan Pustaka
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                SIPORA (Sistem Informasi POLIJE Repositori Aset)
                            </a>
                        </li>
                        
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Pengumpulan Laporan Tugas Akhir/Skripsi/Thesis
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Pengumpulan Laporan PKL/Magang
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Pengecekan Simmilarity dengan Turnitin
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                SIPUTRI (Baca E-Book)
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                SKBP (Surat Keterangan Bebas Perpustakaan)
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Kartu Super
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li
                class="relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300">
                Artikel
            </li>
            <li
                class="relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300">
                Berita
            </li>
            <li
                class="relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300">
                Tentang
            </li>
            <li
                class="relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300">
                Hubungi Kami
            </li>
        </ul>

        <!-- Tombol Login -->
        <button id="open-modal" class="bg-[#3694A8] px-5 py-2 text-white w-48 rounded-xl hidden md:block">
            Masuk/Daftar
        </button>
    </div>
</div>


{{-- <nav class="bg-[#F8F5FC] border-gray-200 dark:bg-gray-900 h-20">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between gap-10">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="img/logo.png" alt="Logo" alt="Flowbite Logo"/>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300 font-bold"
                            aria-current="page">Beranda</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300 font-bold">Layanan</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300 font-bold">Artikel</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300 font-bold">Berita</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300 font-bold">Tentang</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300 font-bold">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    
</nav> --}}


<div id="modal-backdrop" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full">
    <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-md">
        <!-- Modal content -->
        <div class="relative">
            <!-- Modal header -->
            <img src="img/logopol 1.png" alt="" class="absolute -top-16 left-1/2 -translate-x-1/2 w-[100px]">
            <button type="button" id="close-modal" class="relative -top-1 left-96 text-gray-400 hover:bg-gray-200 rounded-lg w-10 h-10">
                ✖
            </button>
            <div class="flex items-center justify-center p-4 md:p-5 border-b border-gray-200">
                <h3 class="text-xl text-center font-bold text-gray-900">Login ke akun anda</h3>
                
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" id="email" class="w-full p-2 border border-gray-300 rounded-lg"
                            required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" id="password" class="w-full p-2 border border-gray-300 rounded-lg"
                            required />
                    </div>
                    <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded-lg">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
