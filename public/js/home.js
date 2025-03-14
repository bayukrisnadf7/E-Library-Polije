document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".mySwiper", {
        slidesPerView: 1, // Bisa diubah ke 2 atau lebih
        spaceBetween: 10,
        loop: true, // Aktifkan looping
        loopedSlides: 10, // Set lebih besar dari jumlah slide yang ada
        loopAdditionalSlides: 2, // Tambahkan slide tambahan agar looping mulus
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
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
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 4 },
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".animate-on-scroll");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.remove("opacity-0", "translate-x-[-50px]", "translate-x-[50px]");
                entry.target.classList.add("opacity-100", "translate-x-0");
            } else {
                // Animasi kembali jika elemen keluar viewport
                entry.target.classList.remove("opacity-100", "translate-x-0");
                entry.target.classList.add("opacity-0", "translate-x-[50px]");
            }
        });
    }, { threshold: 0.2 });

    elements.forEach(el => observer.observe(el));
});

document.addEventListener("DOMContentLoaded", function () {
    const elements = document.querySelectorAll(".animate-on-scroll-2");

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.remove("opacity-0", "translate-y-5");
                entry.target.classList.add("opacity-100", "translate-y-0");
            } else {
                entry.target.classList.remove("opacity-100", "translate-y-0");
                entry.target.classList.add("opacity-0", "translate-y-5");    
            }
        });
    }, { threshold: 0.2 });

    elements.forEach((el) => observer.observe(el));
});




