import "../css/main.scss";
import "./bootstrap.js";
import "./contactFormValidation.js";
import "./loginFormValidation.js";
import { imagePreview } from "./imagePreview.js";
import "./deleteIllustration.js";
import "./deleteProjectMedia.js";
import "./selectIllustrationCheckbox.js";
import { toggleVisibility } from "./functions/toggleVisibilityIcons.js";
import Swiper from "swiper/bundle";
import "swiper/css/bundle";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

// ********** DOMContentLoaded ************
document.addEventListener("DOMContentLoaded", function () {
    // Dark Theme Management
    const button = document.querySelector(".theme-switcher");
    button.addEventListener("click", () => {
        axios
            .get("/get-theme", {
                params: {
                    userTheme: calculateSettingAsThemeString({
                        systemSettingDark,
                    }),
                },
            })
            .then((response) => {
                const userThemeCurrent = response.data.color;

                const newTheme = userThemeCurrent === "dark" ? "light" : "dark";
                console.log(newTheme);

                axios
                    .post("/set-theme", { color: newTheme })
                    .then((response) => {
                        if (response.data.success) {
                            document.documentElement.className = "";
                            document.documentElement.classList.add(
                                response.data.color
                            );
                        } else {
                            console.error("Failed to set theme color");
                        }
                    })
                    .catch((error) => {
                        console.error("Error setting theme color:", error);
                    });
            })
            .catch((error) => {
                console.error("Error fetching theme color:", error);
            });
    });

    // Scroll
    const backToTopArrow = document.getElementById("back-to-top-btn");
    const navbar = document.getElementById("navbar");
    const navbarHeight = navbar.getBoundingClientRect().height;
    const navbarOffsetTop = navbar.offsetTop;

    function smoothScroll(button, section) {
        const targetPosition =
            section.offsetTop - (navbarHeight + navbarOffsetTop);

        button.addEventListener("click", function () {
            window.scrollTo({
                top: targetPosition,
                behavior: "smooth",
            });
        });
    }

    if (backToTopArrow) {
        smoothScroll(backToTopArrow, document.getElementById("home"));
    }

    function checkScrollPosition() {
        const scrollPos = window.scrollY || document.documentElement.scrollTop;
        if (scrollPos >= 300 && backToTopArrow.classList.contains("hidden")) {
            backToTopArrow.classList.remove("hidden");
        } else if (
            scrollPos < 300 &&
            !backToTopArrow.classList.contains("hidden")
        ) {
            backToTopArrow.classList.add("hidden");
        }
    }

    // Scroll for projects and contact btns
    function scrollToSection(btnId, sectionId) {
        if (document.getElementById(btnId)) {
            document.getElementById(btnId).addEventListener("click", () => {
                // Smoothly scroll to the projects section
                document
                    .getElementById(sectionId)
                    .scrollIntoView({ behavior: "smooth" });
            });
        }
    }
    scrollToSection("scroll-to-projects-btn", "projects");
    scrollToSection("scroll-to-contact-btn", "contact");

    //svgs scroll behavior
    window.addEventListener("scroll", function () {
        // Show/hide the button based on scroll position
        checkScrollPosition();

        //Management of waves
        if (document.querySelector(".svg-dark-1")) {
            document.querySelector(".svg-dark-1").style.top = -(
                window.scrollY * 0.05
            );
        }

        if (document.querySelector(".svg-dark-2")) {
            document.querySelector(".svg-dark-2").style.top = -(
                window.scrollY * 0.01
            );
        }

        if (document.querySelector("#shadow1")) {
            document.querySelector("#shadow1").style.transform = `translate(-${
                scrollY * 0.02
            }px, -${scrollY * 0.02}px)`;
        }

        if (document.querySelector("#shadow3")) {
            document.querySelector("#shadow3").style.transform = `translate(${
                scrollY * 0.02
            }px, -${scrollY * 0.02}px)`;
        }
    });

    const projectTitles = document.querySelectorAll(".project-title");
    const projectBtns = document.querySelectorAll(".project-btn");

    projectBtns.forEach(function (element) {
        element.addEventListener("mouseover", function (event) {
            const projectId = element.getAttribute("data-projectId");
            const targetTitle = document.querySelector(
                "#project-id-" + projectId
            );
            targetTitle.classList.add("hover-state");
        });
    });

    projectBtns.forEach(function (element) {
        element.addEventListener("mouseout", () => {
            projectTitles.forEach(function (title) {
                title.classList.remove("hover-state");
            });
        });
    });

    if (document.getElementsByClassName(".mySwiperInit")) {
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
    }

    if (document.getElementsByClassName(".mySwiper")) {
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
                slidesPerView: 1,
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
    }
    // ********** Flash Session Message  ************
    const flashMessage = document.getElementById("flash-message");
    const axiosFlashMessage = document.getElementById("axios-flash-message");

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

    // ********** set date ************
    const date = document.getElementById("date");
    if (date) {
        date.innerHTML = new Date().getFullYear();
    }

    // ********** nav toggle ************
    const navbarEl = document.getElementById("navbar");
    const linksContainer = document.querySelector(".links-container");
    const links = document.querySelector(".links");

    const hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function () {
        const containerHeight = linksContainer.getBoundingClientRect().height;
        const linksHeight = links.getBoundingClientRect().height;
        if (containerHeight === 0) {
            linksContainer.style.height = `${linksHeight}px`;
            hamburger.classList.add("is-opened");
        } else {
            linksContainer.style.height = 0;
            hamburger.classList.remove("is-opened");
        }
    });

    // ********** close menu on click outside ************
    document.addEventListener("click", function (event) {
        if (event.target !== navbarEl && !navbarEl.contains(event.target)) {
            linksContainer.style.height = 0;
            hamburger.classList.remove("is-opened");
        }
    });

    // ********** Upload Image with Drag and Drop ************
    const dragAndDropArea = document.getElementById("dragAndDropArea");

    dragAndDropArea?.addEventListener("dragover", function (event) {
        event.preventDefault();
    });

    dragAndDropArea?.addEventListener("drop", function (event) {
        event.preventDefault();
        document.getElementById("dragAndDropSvg").classList.add("hidden");
        document
            .getElementById("previewExistingMedia")
            ?.classList.add("hidden");

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
        document
            .getElementById("previewExistingMedia")
            ?.classList.add("hidden");

        if (window.location.href.includes("illustrations")) {
            document.getElementById("existingIllustrationsContainer")?.remove();
        }

        const file = e.target.files;
        imagePreview(file);
    });
});
