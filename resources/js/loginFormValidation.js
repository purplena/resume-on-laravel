import { deleteErrorMessages } from "./validationHelperFunctions.js";
import { deleteRedErrorRing } from "./validationHelperFunctions.js";
import { deleteInputValues } from "./validationHelperFunctions.js";
import { addErrorValidationStyles } from "./validationHelperFunctions.js";

const loginForm = document.getElementById("loginForm");
const inputs = [
    document.getElementById("email"),
    document.getElementById("password"),
];
const authErrorDiv = document.getElementById("authErrorDiv");

loginForm?.addEventListener("submit", function (event) {
    event.preventDefault();
    authErrorDiv.classList.add("hidden");
    deleteErrorMessages(document.querySelectorAll("[data-inputName]"));
    deleteRedErrorRing(inputs);

    axios
        .post("/sessions", new FormData(this))
        .then((response) => {
            if (response.status === 200) {
                window.location.href = "/";
                deleteInputValues(inputs);
            }
        })
        .catch((error) => {
            if (error.response && error.response.data.errors) {
                addErrorValidationStyles(error.response.data.errors);
            } else if (!error.response.data.status) {
                authErrorDiv.classList.remove("hidden");
                authErrorDiv.innerHTML = `<span class="text-red-500">${error.response.data.message}</span>`;
            } else {
                console.error("Error response is missing:", error);
            }
        });
});
