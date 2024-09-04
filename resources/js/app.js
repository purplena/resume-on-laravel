import "../css/main.scss";
import "./bootstrap.js";
import "./smoothScroll.js";
import "./contactFormValidation.js";
import "./loginFormValidation.js";
import { imagePreview } from "./imagePreview.js";
import "./deleteIllustration.js";
import "./deleteProjectMedia.js";
import "./selectIllustrationCheckbox.js";
import { toggleVisibility } from "./functions/toggleVisibilityIcons.js";
import Swiper from "swiper/bundle";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

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
const axiosFlashMessage = document.getElementById("axios-flash-message");

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

// ********** DOMContentLoaded ************

document.addEventListener("DOMContentLoaded", function () {
    window.addEventListener("scroll", function () {
        document.querySelector(".svg-dark").style.top = -(
            window.scrollY * 0.05
        );
        document.querySelector("#shadow1").style.transform = `translate(-${
            scrollY * 0.02
        }px, -${scrollY * 0.02}px)`;
        document.querySelector("#shadow3").style.transform = `translate(${
            scrollY * 0.02
        }px, -${scrollY * 0.02}px)`;
    });

    const projectTitles = document.querySelectorAll(".project-title");
    const projectBtns = document.querySelectorAll(".project-btn");

    projectBtns.forEach(function (element) {
        element.addEventListener("mouseover", function (event) {
            const projectId = element.getAttribute("data-projectId");
            const targetTitle = document.querySelector(
                "#project-id-" + projectId
            );
            targetTitle.classList.add("title-transform");
        });
    });

    projectBtns.forEach(function (element) {
        element.addEventListener("mouseout", () => {
            projectTitles.forEach(function (title) {
                title.classList.remove("title-transform");
            });
        });
    });

    const swiper1 = new Swiper(".mySwiperInit", {
        loop: true,

        pagination: {
            el: ".swiper-pagination",
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    const swiper3 = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 3,
        freeMode: true,
        watchSlidesProgress: true,
    });

    const swiperSlides = document
        .querySelector(".mySwiper2")
        ?.querySelectorAll(".swiper-slide");

    if (swiperSlides?.length > 1) {
        const swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper3,
            },
        });
    }

    // ********** Flash Session Message  ************
    if (flashMessage) {
        setTimeout(function () {
            flashMessage.style.display = "none";
        }, 5000);
    }

    if (axiosFlashMessage) {
        setTimeout(function () {
            axiosFlashMessage.classList.add("hidden");
        }, 5000);
    }

    function toggleContent() {
        if (window.innerWidth >= 768) {
            toggleVisibility("editIllustrationBtn", true);
            toggleVisibility("editIconElement", false);
            toggleVisibility("deleteIllustrationBtn", true);
            toggleVisibility("deleteIconElement", false);
        } else {
            toggleVisibility("editIllustrationBtn", false);
            toggleVisibility("editIconElement", true);
            toggleVisibility("deleteIllustrationBtn", false);
            toggleVisibility("deleteIconElement", true);
        }
    }

    toggleContent();

    window.addEventListener("resize", toggleContent);
});

// ********** Upload Image with Drag and Drop ************
const dragAndDropArea = document.getElementById("dragAndDropArea");

dragAndDropArea?.addEventListener("dragover", function (event) {
    event.preventDefault();
});

dragAndDropArea?.addEventListener("drop", function (event) {
    event.preventDefault();
    document.getElementById("dragAndDropSvg").classList.add("hidden");
    document.getElementById("previewExistingMedia")?.classList.add("hidden");

    if (window.location.href.includes("illustrations")) {
        document.getElementById("existingIllustrationsContainer")?.remove();
    }

    const files = event.dataTransfer.files;
    imagePreview(files);

    const input = document.getElementById("path");
    const dataTransfer = new DataTransfer();

    for (let i = 0; i < files.length; i++) {
        dataTransfer.items.add(files[i]);
    }

    input.files = dataTransfer.files;
});

// ********** Upload Image with Classic Form Submission ************
document.getElementById("path")?.addEventListener("change", function (e) {
    document.getElementById("dragAndDropSvg").classList.add("hidden");
    document.getElementById("previewExistingMedia")?.classList.add("hidden");

    if (window.location.href.includes("illustrations")) {
        document.getElementById("existingIllustrationsContainer")?.remove();
    }

    const file = e.target.files;
    imagePreview(file);
});
