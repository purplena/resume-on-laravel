import "../css/main.scss";
import "./bootstrap.js";
import swiper from "./swiper.js";
import "./smoothScroll.js";
import "./contactFormValidation.js";
import "./loginFormValidation.js";

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
const iconBars = document.querySelector(".fa-bars");
const iconCross = document.querySelector(".fa-x");
const flashMessage = document.getElementById("flash-message");

navToggle.addEventListener("click", function () {
    const containerHeight = linksContainer.getBoundingClientRect().height;
    const linksHeight = links.getBoundingClientRect().height;
    if (containerHeight === 0) {
        linksContainer.style.height = `${linksHeight}px`;
        iconBars.classList.add("hidden");
        iconCross.classList.remove("hidden");
    } else {
        linksContainer.style.height = 0;
        iconCross.classList.add("hidden");
        iconBars.classList.remove("hidden");
    }
});

// ********** close menu on click outside ************
document.addEventListener("click", function (event) {
    if (event.target !== navbarEl && !navbarEl.contains(event.target)) {
        linksContainer.style.height = 0;
        iconCross.classList.add("hidden");
        iconBars.classList.remove("hidden");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    if (flashMessage) {
        setTimeout(function () {
            flashMessage.style.display = "none";
        }, 5000);
    }
});
