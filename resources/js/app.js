import "../css/main.scss";
import "./bootstrap";

const c = console.log.bind(document);

// ********** set date ************
// select span
var date = document.getElementById("date");

if (date) {
    date.innerHTML = new Date().getFullYear();
}

// ********** nav toggle ************
// select button and links
const navBtn = document.getElementById("nav-toggle");
const links = document.getElementById("nav-links");

navBtn.addEventListener("click", () => {
    links.classList.toggle("show-links");
    navBtn.classList.toggle("open");
});

// ********** smooth scroll on menu links ************
// select links
const scrollLinks = document.querySelectorAll(".scroll-link");

scrollLinks.forEach((link) => {
    link.addEventListener("click", (e) => {
        return;
        // prevent default element behaviour (here: go to anchor)
        e.preventDefault();

        links.classList.remove("show-links");
        navBtn.classList.remove("open");

        const targetId = e.target.getAttribute("href").slice(1); // We get the value of Href without '#'
        const element = document.getElementById(targetId); // We get the element with id={}

        let position = element.offsetTop - 62;

        window.scrollTo({
            left: 0,
            // top: element.offsetTop,
            top: position,
            behavior: "smooth",
        });
    });
});

// ********** smooth scroll on home logo (back to top) ************
const navLogo = document.getElementById("nav-logo");

navLogo.addEventListener("click", (e) => {
    return;
    window.scrollTo({
        left: 0,
        top: 0,
        behavior: "smooth",
    });
});
