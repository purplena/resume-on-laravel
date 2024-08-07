import "../css/main.scss";
import "./bootstrap.js";
import swiper from "./swiper.js";
import "./smoothScroll.js";
import "./contactFormValidation.js";
import "./loginFormValidation.js";
import { imagePreview } from "./imagePreview.js";
import "./deleteIllustration.js";
import "./selectIllustrationCheckbox.js";
import { toggleVisibility } from "./functions/toggleVisibilityIcons.js";

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
// ********** Flash Session Message  ************
document.addEventListener("DOMContentLoaded", function () {
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
    const file = event.dataTransfer.files[0];
    imagePreview(file);

    const input = document.getElementById("path");
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    input.files = dataTransfer.files;
});

// ********** Upload Image with Classic Form Submission ************
document.getElementById("path")?.addEventListener("change", function (e) {
    const file = e.target.files[0];
    imagePreview(file);
});
