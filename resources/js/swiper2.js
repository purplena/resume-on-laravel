import Swiper from "swiper/bundle";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

const swiper2 = new Swiper("#swiper2", {
    loop: true,

    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    navigation: {
        nextEl: "swiper-button-next",
        prevEl: "swiper-button-prev",
    },
});

export default swiper2;
