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
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });

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

    // const mainGalleryImg = document.getElementById("mainGalleryImg");
    // const prevBtn = document.querySelector(".prevBtn");
    // const nextBtn = document.querySelector(".nextBtn");
    // const galleryImgs = document.querySelectorAll(".galleryImgs");

    // // ********** change image on click prev/next ************
    // let currentIndex = 0;

    // function updateMainImage(index) {
    //     const newSrc = galleryImgs[index].src;
    //     mainGalleryImg.src = newSrc;
    //     updateOpacity();
    //     scrollToCurrentImage();
    // }

    // prevBtn.addEventListener("click", () => {
    //     currentIndex--;
    //     if (currentIndex < 0) {
    //         currentIndex = galleryImgs.length - 1;
    //     }
    //     updateMainImage(currentIndex);
    // });

    // nextBtn.addEventListener("click", () => {
    //     currentIndex++;
    //     if (currentIndex >= galleryImgs.length) {
    //         currentIndex = 0;
    //     }
    //     updateMainImage(currentIndex);
    // });

    // updateMainImage(currentIndex);

    // galleryImgs?.forEach(function (img, index) {
    //     img.addEventListener("click", function () {
    //         currentIndex = index;
    //         updateMainImage(currentIndex);
    //     });
    // });

    // // ********** opacity change for an active image ************
    // function updateOpacity() {
    //     galleryImgs.forEach((img) => {
    //         img.style.opacity = "0.6";
    //     });

    //     if (galleryImgs[currentIndex]) {
    //         galleryImgs[currentIndex].style.opacity = "1";
    //     }
    // }

    // updateOpacity();

    // // ********** smooth scroll in slider ************
    // function scrollToCurrentImage() {
    //     const smallImgContainer = document.querySelector(
    //         ".product-small-img .flex"
    //     );
    //     const imgWidth =
    //         galleryImgs[0].offsetWidth +
    //         parseInt(window.getComputedStyle(galleryImgs[0]).marginRight);
    //     const scrollPosition = currentIndex * imgWidth;

    //     // smallImgContainer.scrollLeft = scrollPosition;
    //     smallImgContainer.scrollTo({
    //         left: scrollPosition,
    //         behavior: "smooth",
    //     });
    // }

    // scrollToCurrentImage();

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
