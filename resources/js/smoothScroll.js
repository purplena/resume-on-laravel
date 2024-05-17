const homeSection = document.getElementById("home");
const contactSection = document.getElementById("contact");
const projectsSection = document.getElementById("projects");
const scrollToContactBtn = document.getElementById("scrollToContactBtn");
const scrollToProjectsBtn = document.getElementById("scrollToProjectsBtn");
const backToTopArrow = document.getElementById("backToTopBtn");

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
    console.log(backToTopArrow.classList.contains("hidden"));

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

smoothScroll(backToTopArrow, homeSection, 68);
smoothScroll(scrollToContactBtn, contactSection, 75);
smoothScroll(scrollToProjectsBtn, projectsSection, 50);
