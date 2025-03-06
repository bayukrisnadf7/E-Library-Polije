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


// Toogle 
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const navMenu = document.getElementById("nav-menu");

    menuToggle.addEventListener("click", function () {
    navMenu.classList.toggle("hidden");
    });
});
