// Slider berita start
document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".swiper", {
        slidesPerView: 1, // Bisa diubah ke 2 atau lebih
        spaceBetween: 20,
        loop: true, // Agar slider berulang terus
        autoplay: {
            delay: 3000, // Waktu pergantian slide dalam milidetik (3 detik)
            disableOnInteraction: false, // Autoplay tetap berjalan meskipun user berinteraksi
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
            640: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 4
            },
        }
     });
});

