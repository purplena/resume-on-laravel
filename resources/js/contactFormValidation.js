const contactForm = document.getElementById("contactUSForm");
const inputs = [
    document.getElementById("name"),
    document.getElementById("email"),
    document.getElementById("message"),
];
const successDiv = document.getElementById("success-message");
const overlay = document.getElementById("overlay");
const btn = document.querySelector("#submitButton");

document.addEventListener("DOMContentLoaded", function () {
    if (!contactForm) return;

    contactForm.addEventListener("submit", function (event) {
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
});

// Helper functions
function deleteErrorMessages(dataAttribute) {
    Array.from(dataAttribute).forEach((errorDiv) => {
        errorDiv.innerHTML = "";
        errorDiv.classList.remove("text-red-500");
    });
}

function deleteRedErrorRing(inputs) {
    inputs.forEach((input) => {
        input.classList.remove("ring-rose-500");
    });
}

function deleteInputValues(inputs) {
    inputs.forEach((input) => {
        input.value = "";
    });
}

function addErrorValidationStyles(errorResponse) {
    Object.entries(errorResponse).forEach(([key, message]) => {
        const errorDiv = document.querySelector(`[data-inputName="${key}"]`);
        const targetInput = document.getElementById(`${key}`);
        errorDiv.innerHTML = `<span class="text-red-500">${message}</span>`;
        errorDiv.classList.add("text-red-500");
        targetInput.classList.add("ring-rose-500");
    });
}
