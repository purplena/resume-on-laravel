import "../css/main.scss";
import "./bootstrap";
import swiper from "./swiper";
import "./smoothScroll";
import "./contactFormValidation";

// ********** set date ************
var date = document.getElementById("date");
if (date) {
    date.innerHTML = new Date().getFullYear();
}

// ********** nav toggle ************
const navbarEl = document.getElementById("navbar");
const navToggle = document.querySelector(".nav-toggle");
const linksContainer = document.querySelector(".links-container");
const links = document.querySelector(".links");

navToggle.addEventListener("click", function () {
    const containerHeight = linksContainer.getBoundingClientRect().height;
    const linksHeight = links.getBoundingClientRect().height;
    if (containerHeight === 0) {
        linksContainer.style.height = `${linksHeight}px`;
        navToggle.classList.add("open");
    } else {
        linksContainer.style.height = 0;
        navToggle.classList.remove("open");
    }
});

// ********** close menu on click outside ************
document.addEventListener("click", function (event) {
    if (event.target !== navbarEl && !navbarEl.contains(event.target)) {
        linksContainer.style.height = 0;
        navToggle.classList.remove("open");
    }
});

swiper();
