import "../css/main.scss";
import "./bootstrap";
// Swiper
import Swiper from "swiper/bundle";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

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

//Swiper
let swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    loop: true,
    spaceBetween: 30,

    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// Update Swiper config based on window size
function updateSwiperConfig() {
    if (window.innerWidth <= 768) {
        swiper.params.slidesPerView = 1;
        swiper.update();
    } else {
        swiper.params.slidesPerView = 2;
        swiper.update();
    }
}

updateSwiperConfig();
// Event listener for window resize
window.addEventListener("resize", updateSwiperConfig);

document
    .getElementById("contactUSForm")
    .addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission
        console.log("here");

        let formData = new FormData(this); // Create a FormData object
        console.log(formData.get("email"));

        const object = {};
        formData.forEach((value, key) => {
            object[key] = value;
        });
        const json = JSON.stringify(object);

        fetch("contact-us", {
            method: "POST",
            body: json,
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ),
            },
            credentials: "same-origin",
        })
            .then((response) => {
                if (!response.ok) {
                    // Check if the response was successful
                    return response.json().then((errors) => {
                        console.error("Validation Errors:", errors);
                        // Handle the errors appropriately
                    });
                }
                return response.json(); // Process the successful response
            })
            .catch((error) => console.error("Fetch Error:", error));
        // .then((response) => {
        //     console.log(response);
        //     if (!response.ok) {
        //         // Check if the response was successful
        //         throw new Error("Network response was not ok");
        //     }
        //     return response.json(); // Parse the response as JSON
        // })
        // .then((data) => {
        //     if ("errors" in data) {
        //         // Check if there are validation errors
        //         // Display validation errors
        //         Object.entries(data.errors).forEach(([key, values]) => {
        //             // Assuming you have a way to target the input field associated with the error
        //             document
        //                 .querySelector(`#${key}`)
        //                 .classList.add("is-invalid"); // Add your custom error styling
        //             document
        //                 .querySelector(`#${key}`)
        //                 .insertAdjacentHTML(
        //                     "afterend",
        //                     `<div class="invalid-feedback">${values[0]}</div>`
        //                 ); // Display the error message
        //         });
        //     } else {
        //         // Handle success case
        //         alert("Success!");
        //         // Optionally clear the form after success
        //         this.reset();
        //     }
        // })
        // .catch((error) => {
        //     console.error(
        //         "There has been a problem with your fetch operation:",
        //         error
        //     );
        // });
    });
