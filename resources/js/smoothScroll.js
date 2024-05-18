const scrollToContactBtn = document.getElementById("scroll-to-contact-btn");
const scrollToProjectsBtn = document.getElementById("scroll-to-projects-btn");
const backToTopArrow = document.getElementById("back-to-top-btn");

function smoothScroll(button, section, offsetValue) {
    const targetPosition = section.offsetTop - offsetValue;
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

smoothScroll(backToTopArrow, document.getElementById("home"), 68);
smoothScroll(scrollToContactBtn, document.getElementById("contact"), 68);
smoothScroll(scrollToProjectsBtn, document.getElementById("projects"), 68);
