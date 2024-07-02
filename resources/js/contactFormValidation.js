import { deleteErrorMessages } from "./validationHelperFunctions.js";
import { deleteRedErrorRing } from "./validationHelperFunctions.js";
import { deleteInputValues } from "./validationHelperFunctions.js";
import { addErrorValidationStyles } from "./validationHelperFunctions.js";

const contactForm = document.getElementById("contactUSForm");
const inputs = [
    document.getElementById("name"),
    document.getElementById("email"),
    document.getElementById("message"),
];
const successDiv = document.getElementById("success-message");
const overlay = document.getElementById("overlay");
const btn = document.querySelector("#submitButton");

contactForm?.addEventListener("submit", function (event) {
    event.preventDefault();
    btn.disabled = true;
    overlay.classList.remove("hidden");
    deleteErrorMessages(document.querySelectorAll("[data-inputName]"));
    deleteRedErrorRing(inputs);
    successDiv.innerHTML = "";

    axios
        .post("/contact-us", new FormData(this))
        .then((response) => {
            if (response.status === 200 && response.data.success) {
                successDiv.innerHTML = `<span class="alert alert-success">${response.data.message}</span>`;
                btn.disabled = false;
                overlay.classList.add("hidden");
                deleteInputValues(inputs);
            }
        })
        .catch((error) => {
            if (error.response && error.response.data.errors) {
                btn.disabled = false;
                overlay.classList.add("hidden");
                addErrorValidationStyles(error.response.data.errors);
            } else {
                console.error("Error response is missing:", error);
            }
        });
});
