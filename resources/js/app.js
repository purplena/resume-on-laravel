import "../css/main.scss";
import "./bootstrap";
// Swiper
import Swiper from "swiper/bundle";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

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

//Swiper
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

const contactForm = document.getElementById("contactUSForm");
const inputs = [
    document.getElementById("name"),
    document.getElementById("email"),
    document.getElementById("message"),
];

contactForm.addEventListener("submit", function (event) {
    event.preventDefault();
    Array.from(document.querySelectorAll("[data-inputName]")).forEach(
        (errorDiv) => {
            errorDiv.innerHTML = "";
            errorDiv.classList.remove("text-red-500");
        }
    );
    inputs.forEach((input) => {
        input.classList.remove("ring-rose-500");
    });

    const formData = new FormData(this);

    axios
        .post("/contact-us", formData)
        .then((response) => {
            if (response.status === 200 && response.data.success) {
                console.log(response.data);
                const successDiv = document.getElementById("success-message");
                successDiv.innerHTML = `<span class="alert alert-success">${response.data.message}</span>`;
                inputs.forEach((input) => {
                    input.value = "";
                });
            }
        })
        .catch((error) => {
            if (error.response && error.response.data) {
                Object.entries(error.response.data.error).forEach(
                    ([key, message]) => {
                        const errorDiv = document.querySelector(
                            `[data-inputName="${key}"]`
                        );
                        const targetInput = document.getElementById(`${key}`);
                        errorDiv.innerHTML = `<span class="text-red-500">${message}</span>`;
                        errorDiv.classList.add("text-red-500");
                        targetInput.classList.add("ring-rose-500");
                    }
                );
            } else {
                console.error("Error response is missing:", error);
            }
        });
});
