// Login Modal
document.addEventListener("DOMContentLoaded", function () {
    const openModalButtons = document.querySelectorAll("#open-modal");
    const closeModalButton = document.getElementById("close-modal");
    const modal = document.getElementById("authentication-modal");
    const backdrop = document.getElementById("modal-backdrop");

    // Tambahkan event listener ke semua tombol "Masuk/Daftar"
    openModalButtons.forEach(button => {
        button.addEventListener("click", function () {
            modal.classList.remove("hidden");
            backdrop.classList.remove("hidden");
        });
    });

    // Tutup modal saat tombol close ditekan
    closeModalButton.addEventListener("click", function () {
        modal.classList.add("hidden");
        backdrop.classList.add("hidden");
    });

    // Tutup modal jika klik di luar modal
    backdrop.addEventListener("click", function () {
        modal.classList.add("hidden");
        backdrop.classList.add("hidden");
    });
});

// Register Modal
    document.addEventListener("DOMContentLoaded", function () {
        const loginModal = document.getElementById("authentication-modal");
        const registerModal = document.getElementById("register-modal");

        const openRegisterBtn = document.getElementById("open-modal-register");
        const closeRegisterBtn = document.getElementById("close-register-modal");
        const backToLoginBtn = document.getElementById("back-to-login");
        const closeLoginBtn = document.getElementById("close-modal");
        const backdrop = document.getElementById("modal-backdrop");

        // Buka modal register ketika tombol "Daftar sekarang!" diklik
        openRegisterBtn.addEventListener("click", function () {
            loginModal.classList.add("hidden"); // Sembunyikan modal login
            registerModal.classList.remove("hidden"); // Tampilkan modal register
        });

        // Tutup modal register ketika tombol close diklik
        closeRegisterBtn.addEventListener("click", function () {
            registerModal.classList.add("hidden");
            backdrop.classList.add("hidden");
        });

        // Kembali ke modal login
        backToLoginBtn.addEventListener("click", function () {
            registerModal.classList.add("hidden");
            loginModal.classList.remove("hidden");
        });

        // Tutup modal login jika diperlukan
        closeLoginBtn.addEventListener("click", function () {
            loginModal.classList.add("hidden");
        });
    });


// Toogle 
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const navMenu = document.getElementById("nav-menu");

    menuToggle.addEventListener("click", function () {
    navMenu.classList.toggle("hidden");
    });
});
