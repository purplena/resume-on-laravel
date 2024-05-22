const scrollToContactBtn = document.getElementById("scroll-to-contact-btn");
const scrollToProjectsBtn = document.getElementById("scroll-to-projects-btn");
const backToTopArrow = document.getElementById("back-to-top-btn");
const navbar = document.getElementById("navbar");

const navbarHeight = document
    .getElementById("navbar")
    .getBoundingClientRect().height;
const gapTopWindowNavbarInPxl = window
    .getComputedStyle(navbar)
    .getPropertyValue("top");

const gapTopWindowNavbarInt = parseInt(
    gapTopWindowNavbarInPxl.substring(0, gapTopWindowNavbarInPxl.length - 2)
);
const gapFromTop = navbarHeight + gapTopWindowNavbarInt;

function smoothScroll(button, section) {
    const targetPosition = section.offsetTop - gapFromTop;
    button.addEventListener("click", function () {
        window.scrollTo({
            top: targetPosition,
            behavior: "smooth",
        });
    });
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

// Show/hide the button based on scroll position
checkScrollPosition();
window.addEventListener("scroll", checkScrollPosition);

smoothScroll(backToTopArrow, document.getElementById("home"));
smoothScroll(scrollToContactBtn, document.getElementById("contact"));
smoothScroll(scrollToProjectsBtn, document.getElementById("projects"));
