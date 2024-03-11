import "../css/main.scss";
import "./bootstrap";

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
const navbarEl = document.getElementById("navbar");

navBtn.addEventListener("click", () => {
    links.classList.toggle("show-links");
    navBtn.classList.toggle("open");
});

//close menu on click outside
document.addEventListener("click", function (event) {
    if (event.target !== navbarEl && !navbarEl.contains(event.target)) {
        links.classList.remove("show-links");
        navBtn.classList.remove("open");
    }
});
