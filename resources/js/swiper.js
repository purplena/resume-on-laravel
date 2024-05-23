// Swiper
import Swiper from "swiper/bundle";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

let swiper;

export default function initSwiper() {
    swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        loop: true,
        spaceBetween: 30,

        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
}

// update Swiper config based on window size
function updateSwiperConfig() {
    const newSize = window.innerWidth <= 768 ? 1 : 2;
    // Destroy the current swiper instance
    swiper.destroy(true, true);
    // Re-initialize swiper with the new configuration
    initSwiper();
    // Adjust slidesPerView based on the new window size
    swiper.params.slidesPerView = newSize;
    swiper.update();
}

initSwiper();
window.addEventListener("resize", updateSwiperConfig);
