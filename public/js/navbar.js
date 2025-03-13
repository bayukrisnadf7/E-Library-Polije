// Toogle 
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const navMenu = document.getElementById("nav-menu");

    menuToggle.addEventListener("click", function () {
    navMenu.classList.toggle("hidden");
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownButton");
    const dropdownNavbar = document.getElementById("dropdownNavbar");

    dropdownButton.addEventListener("click", function (event) {
        // Cek apakah mode mobile (lebar layar kurang dari 768px)
        if (window.innerWidth < 768) {
            event.stopPropagation(); // Mencegah event bubbling
            dropdownNavbar.classList.toggle("hidden");
        }
    });

    // Klik di luar dropdown untuk menutupnya di mode mobile
    document.addEventListener("click", function (event) {
        if (window.innerWidth < 768 && !dropdownButton.contains(event.target) && !dropdownNavbar.contains(event.target)) {
            dropdownNavbar.classList.add("hidden");
        }
    });
});