import Swiper from "swiper/bundle";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

const swiper1 = new Swiper("#mySwiper", {
    loop: true,

    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    navigation: {
        nextEl: "#page-swiper-button-next",
        prevEl: "#page-swiper-button-prev",
    },
});

export default swiper1;
