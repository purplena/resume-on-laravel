import "../css/main.scss";
import "./bootstrap";

// ********** set date ************
// select span
var date = document.getElementById("date");
if (date) {
    date.innerHTML = new Date().getFullYear();
}

// ********** nav toggle ************
// select button and links
const navBtn = document.getElementById("nav-toggle");
const links = document.getElementById("nav-links");
const navbarEl = document.getElementById("navbar");

navBtn.addEventListener("click", () => {
    links.classList.toggle("show-links");
    navBtn.classList.toggle("open");
});

//close menu on click outside
document.addEventListener("click", function (event) {
    if (event.target !== navbarEl && !navbarEl.contains(event.target)) {
        links.classList.remove("show-links");
        navBtn.classList.remove("open");
    }
});

// Swiper
import Swiper from "swiper/bundle";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

let swiper = new Swiper(".mySwiper", {
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
