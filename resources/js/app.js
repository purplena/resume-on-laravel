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

// const js = document.getElementById("js");
// const parallaxSection = document.getElementById("parallax");

// parallaxSection.addEventListener("mousemove", function (event) {
//     const rect = parallaxSection.getBoundingClientRect();
//     const x = event.clientX - rect.left; // x position within the element.
//     const y = event.clientY - rect.top; // y position within the element.

//     // Calculate the percentage of the screen covered by the mouse.
//     const percentX = (x / rect.width) * 100;
//     const percentY = (y / rect.height) * 100;

//     js.style.transform = `translate(${percentX}%, ${percentY}%)`;
// });

window.addEventListener("load", function () {
    // Select the element you want to animate
    var element = document.querySelector("#wordpress");

    // Add the animation with a delay of 5 seconds
    setTimeout(function () {
        element.style.animationPlayState = "running";
    }, 5000); // 5000 milliseconds = 5 seconds
});

swiper();
