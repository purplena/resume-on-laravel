const backToTopArrow = document.getElementById("back-to-top-btn");
const navbar = document.getElementById("navbar");
const navbarHeight = navbar.getBoundingClientRect().height;
const navbarOffsetTop = navbar.offsetTop;

function smoothScroll(button, section) {
    const targetPosition = section.offsetTop - (navbarHeight + navbarOffsetTop);
    if (!button) return;

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
window.addEventListener("scroll", checkScrollPosition);

function ifElementExists(selectorButton, selectorSection) {
    const button = document.getElementById(selectorButton);
    const section = document.getElementById(selectorSection);

    if (button && section) {
        smoothScroll(button, section);
    }
}

ifElementExists("back-to-top-btn", "home");
ifElementExists("scroll-to-contact-btn", "contact");
ifElementExists("scroll-to-projects-btn", "projects");
