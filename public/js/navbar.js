document.addEventListener("DOMContentLoaded", function () {
    // Toggle Menu
    const menuToggle = document.getElementById("menu-toggle");
    const navMenu = document.getElementById("nav-menu");

    if (menuToggle && navMenu) {
        menuToggle.addEventListener("click", function () {
            navMenu.classList.toggle("hidden");
        });
    }

    // Dropdown Menu di Navbar
    const dropdownButton = document.getElementById("dropdownButton");
    const dropdownNavbar = document.getElementById("dropdownNavbar");

    if (dropdownButton && dropdownNavbar) {
        dropdownButton.addEventListener("click", function (event) {
            // Hanya aktif di mode mobile (lebar < 768px)
            if (window.innerWidth < 768) {
                event.stopPropagation(); // Mencegah event bubbling
                dropdownNavbar.classList.toggle("hidden");
            }
        });

        // Klik di luar dropdown untuk menutupnya di mode mobile
        document.addEventListener("click", function (event) {
            if (window.innerWidth < 768 &&
                !dropdownButton.contains(event.target) &&
                !dropdownNavbar.contains(event.target)) {
                dropdownNavbar.classList.add("hidden");
            }
        });
    }
});
