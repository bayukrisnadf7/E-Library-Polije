<div class="flex justify-center p-5 items-center gap-16">
    <img src="img/logo.png" alt="">
    <ul class="flex gap-12">
        <li
            class="relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300">
            Beranda
        </li>
        <li
            class="relative cursor-pointer hover:text-[#334B48] after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-[#334B48] hover:after:w-full after:transition-all after:duration-300">
            Layanan
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

    <button id="open-modal" class="bg-[#334B48] px-5 py-2 text-white w-48 rounded-xl">Login/Daftar</button>
</div>


<div id="modal-backdrop" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full">
    <div class="relative p-4 w-full max-w-md bg-white rounded-lg shadow-md">
        <!-- Modal content -->
        <div class="relative">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Sign in to our platform</h3>
                <button type="button" id="close-modal" class="text-gray-400 hover:bg-gray-200 rounded-lg w-8 h-8">
                    ✖
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form class="space-y-4">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your email</label>
                        <input type="email" id="email" class="w-full p-2 border border-gray-300 rounded-lg" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Your password</label>
                        <input type="password" id="password" class="w-full p-2 border border-gray-300 rounded-lg" required />
                    </div>
                    <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded-lg">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("authentication-modal");
        const backdrop = document.getElementById("modal-backdrop");
        const openModalBtn = document.getElementById("open-modal");
        const closeModalBtn = document.getElementById("close-modal");

        function openModal() {
            modal.classList.remove("hidden");
            backdrop.classList.remove("hidden");
            document.body.classList.add("overflow-hidden"); // Mencegah scroll saat modal terbuka
        }

        function closeModal() {
            modal.classList.add("hidden");
            backdrop.classList.add("hidden");
            document.body.classList.remove("overflow-hidden"); // Mengembalikan scroll saat modal tertutup
        }

        openModalBtn.addEventListener("click", openModal);
        closeModalBtn.addEventListener("click", closeModal);
        backdrop.addEventListener("click", closeModal);
    });
</script>