const backToTopArrow = document.getElementById("back-to-top-btn");
const navbarHeight = document
    .getElementById("navbar")
    .getBoundingClientRect().height;
const navbarOffsetTop = navbar.offsetTop;

function smoothScroll(button, section) {
    const targetPosition = section.offsetTop - (navbarHeight + navbarOffsetTop);
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
smoothScroll(
    document.getElementById("scroll-to-contact-btn"),
    document.getElementById("contact")
);
smoothScroll(
    document.getElementById("scroll-to-projects-btn"),
    document.getElementById("projects")
);
