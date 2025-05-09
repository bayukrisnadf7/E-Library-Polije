@extends('main')

@section('content')
    <div class="relative">
        <!-- Gambar Header -->
        <div class="relative h-96">
            <img src="{{ asset('img/layanan.png') }}" alt="Pelayanan" class="w-full h-[400px] object-cover">
            <div class="absolute inset-0 flex items-center justify-center flex-col gap-5">
                <h1 class="text-white text-4xl font-bold">Pelayanan</h1>
                <p class="text-white">UPA Perpustakaan Polije</p>
            </div>
        </div>

        <!-- Konten -->
        <div class="max-w-7xl mx-auto px-6 py-16 space-y-16">

            <!-- Bagian Atas: Sirkulasi & Ketentuan -->
            <div class="flex gap-10">
                <!-- Sirkulasi -->
                <div class="w-1/2 translate-x-[-50px] transition-all duration-1000 animate-on-scroll">
                    <h2 class="text-2xl font-bold mb-4">Sirkulasi</h2>
                    <p class="text-justify mb-4">
                        Jasa layanan sirkulasi terdiri dari jasa peminjaman, perpanjangan dan pengembalian bahan pustaka
                        (buku),
                        serta pemesanan buku yang sedang dalam peminjaman. Jasa layanan ini telah menggunakan sarana
                        komputer,
                        dan masing-masing lokasi buku telah dilengkapi dengan barcode sehingga memudahkan identifikasi,
                        kecepatan dan ketepatan pada proses transaksi di sirkulasi. Pemanfaatan teknologi komputer juga
                        diterapkan
                        untuk penyebarluasan informasi buku, sehingga data buku paling baru dapat secara langsung diakses
                        terminal komputer yang telah tersedia di perpustakaan melalui OPAC.
                    </p>

                    <h3 class="text-lg font-semibold mt-6 mb-2">Waktu Layanan</h3>
                    <div class="space-y-3 text-sm">
                        <!-- Senin - Kamis -->
                        <div class="flex items-start gap-3">
                            <p class="min-w-[100px] font-medium">Senin – Kamis</p>
                            <div class="flex items-center pt-1">
                                <span class="w-2 h-2 bg-black rounded-full"></span>
                                <span class="w-10 h-px bg-black"></span>
                                <span class="w-2 h-2 bg-black rounded-full"></span>
                            </div>
                            <div class="flex flex-col gap-1 ml-3">
                                <p>Buka 08.00 – 12.00</p>
                                <p>Istirahat 12.00 – 13.00</p>
                                <p>Buka 13.00 – 16.00</p>
                            </div>
                        </div>

                        <!-- Jumat -->
                        <div class="flex items-start gap-3">
                            <p class="min-w-[100px] font-medium">Jumat</p>
                            <div class="flex items-center  pt-1">
                                <span class="w-2 h-2 bg-black rounded-full"></span>
                                <span class="w-10 h-px bg-black"></span>
                                <span class="w-2 h-2 bg-black rounded-full"></span>
                            </div>
                            <div class="flex flex-col gap-1 ml-3">
                                <p>Buka 08.00 – 11.00</p>
                                <p>Istirahat 11.00 – 13.30</p>
                                <p>Buka 13.30 – 16.30</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ketentuan Sirkulasi -->
                <div class="w-1/2 translate-x-[50px] transition-all duration-1000 animate-on-scroll">
                    <h2 class="text-2xl font-bold mb-4">Ketentuan layanan sirkulasi</h2>
                    <ul class="space-y-4 text-justify text-sm list-disc list-inside">
                        <li><strong>Mahasiswa D3:</strong> 2 (dua) eksemplar buku untuk jangka peminjaman 1 minggu, dan
                            dapat diperpanjang 1 kali.</li>
                        <li><strong>Mahasiswa D4:</strong> yang sedang menyusun tugas akhir atau mahasiswa D3 yang sedang
                            menyusun PKL/MKI: 2 eksemplar buku untuk jangka waktu 2 minggu dan diperpanjang 1 kali (buku
                            tidak sedang dipinjam).</li>
                        <li><strong>Mahasiswa S2:</strong> 2 eksemplar buku untuk jangka waktu 1 minggu dan diperpanjang 1
                            kali (buku tidak sedang dipinjam). Buku yang dapat dipinjam hanya yang berlabel hitam. Buku
                            berlabel merah hanya bisa dibaca di tempat dan difotokopi. Pengecualian harus seizin pimpinan
                            perpustakaan.</li>
                    </ul>
                </div>
            </div>

            <!-- Bagian Bawah: Referensi & Layanan Referensi -->
            <div class="">
                <!-- Referensi -->
                <div>
                    <h2 class="text-2xl font-bold mb-4">Referensi</h2>
                    <p class="text-justify text-sm">
                        Layanan referensi memberikan jasa layanan berupa penunjukkan, penemuan kembali serta penelusuran
                        informasi baik yang berada di perpustakaan maupun di luar perpustakaan.
                    </p>
                </div>

                <!-- Layanan Referensi -->
                <div class="mt-10 flex flex-col gap-5">
                    <div>
                        <h2 class="text-2xl font-bold mb-4">Layanan Referensi meliputi</h2>
                        <p class="text-justify text-sm space-y-4">
                            <span class="block">Jasa Informasi dan Bimbingan Pemakai: Memberikan layanan secara terperinci
                                mengenai seluruh informasi yang dimiliki perpustakaan, termasuk teknik penelusuran informasi
                                menggunakan sarana komputer.</span>
                            <span class="block">Jasa Penelusuran Informasi Layanan informasi ini memberikan bantuan kepada
                                pemakai dalam menemukan informasi berasal dari buku ataupun majalah/jurnal. Sumber informasi
                                dapat berasal dari koleksi yang ada di lingkungan perpustakaan dan juga lembaga informasi di
                                luar Perpustakaan polije. Jasa penelusuran ini juga mencakup penelusuran dari perkembangan
                                informasi yang dikemas dalam bentuk CD melalui CD-ROM, dan juga melaksanakan penelusuran
                                jarak
                                jauh dengan menggunakan jasa Internet. Untuk memaksimalkan pemanfaatan penelusuran
                                informasi,
                                Perpustakaan Politenik Negeri Jember memberikan layanan jasa penelusuran informasi. Jasa ini
                                dimaksud untuk membantu pemakai perpustakaan dalam menulusur informasi yang dimiliki
                                perpustakaan, baik berupa sumber informasi non elektronis maupun elektronis. Penelusuran
                                informasi dengan hanya memberikan topik, subyek dan kata kunci dari suatu informasi maupun
                                sumber informasi tertentu. Pencetakan hasil penelusuran informasi baik yang telah dilakukan
                                oleh
                                pemakai sendiri maupun oleh pihak perpustakaan. Semua bahan untuk sumber informasi tersebut
                                sesuai dengan kebutuhan dari pemakai.</span>
                            <span class="block">Jasa Informasi Terbaru Memberikan layanan berkaitan perkembangan ilmu
                                pengetahuan terbaru yang dimuat pada jurnal-jurnal ilmu pengetahuan yang telah dimiliki
                                perpustakaan. Jasa ini juga memungkinkan seorang pemakai memperoleh terbitan daftar isi dari
                                suatu jurnal yang dikehendaki secara rutin.</span>

                        </p>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mb-4">Audio Visual</h2>
                        <p>
                            Seluruh koleksi audio dan visual dapat sepenuhnya dimanfaatkan oleh pemakai perpustakaan. Selain
                            software yang berisi materi informasi, di ruang audio visual juga menyediakan. Jenis layanan
                            yang di
                            berikan bagi pengguna antara lain: Karya Ilmiah Mahasiswa tugas Akhir, Skripsi,Tesis,Pkl,Mki n
                            untuk
                            penelusuran informasi ilmiah serta koleksi http://perpustakaan.polije.ac.id:81 perpustakaan
                            Poiliteknik
                            Negeri Jember. Mahasiswa juga dapat memanfaatkan layanan ini semoga bermanfaat
                        </p>

                    </div>

                    <div>
                        <h2 class="text-2xl font-bold mb-4">Silang Layan</h2>
                        <p>
                            Perpustakaan Politeknik Negeri Jember melakukan kerjasama dengan perpustakaan / lembaga
                            informasi lainnya sebagai upaya untuk memenuhi kebutuhan informasi pemakai. PDII-LIPI terutama
                            untuk koleksi koleksi yang terdapat di PDII-LIPI berupa jurnal dan terbitan ilmiah lainnya.
                            Silang layan antar perguruan tinggi biasanya dilakukan oleh pemakai / mahasiswa yang sedang
                            menyelesaikan tugas akhir atau skripsi. Sarana silang layan ini juga dilakukan atas rujukan
                            petugas bagian informasi apabila informasi yang diinginkan pemakai tidak terdapat di
                            perpustakaan Politeknik Negeri Jember. Pemakai dari Politenik Negeri Jember yang akan
                            memanfaatkan jasa silang layan dapat meminta surat pengantar ke bagian administrasi sesuai
                            dengan tujuan perpustakaan / lembaga yang bersangkutan. Demikian halnya untuk pemakai dari luar
                            Politenik Negeri Jember juga diwajibkan membawa surat pengantar apabila hendak memanfaatkan jasa
                            silang layan tersebut.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
