// Swiper
import Swiper from "swiper/bundle";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

export let swiper = new Swiper(".mySwiper", {
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

// Update Swiper config based on window size
function updateSwiperConfig() {
    if (window.innerWidth <= 768) {
        swiper.params.slidesPerView = 1;
        swiper.update();
    } else {
        swiper.params.slidesPerView = 2;
        swiper.update();
    }
}

updateSwiperConfig();
// Event listener for window resize
window.addEventListener("resize", updateSwiperConfig);
