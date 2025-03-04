document.addEventListener("DOMContentLoaded", function() {
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

// Toogle 
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const navMenu = document.getElementById("nav-menu");

    menuToggle.addEventListener("click", function () {
    navMenu.classList.toggle("hidden");
    });
});
