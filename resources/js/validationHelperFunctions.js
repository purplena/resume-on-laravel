export function deleteErrorMessages(dataAttribute) {
    Array.from(dataAttribute).forEach((errorDiv) => {
        errorDiv.innerHTML = "";
        errorDiv.classList.remove("text-red-500");
    });
}

export function deleteRedErrorRing(inputs) {
    inputs.forEach((input) => {
        input.classList.remove("ring-rose-500");
    });
}

export function deleteInputValues(inputs) {
    inputs.forEach((input) => {
        input.value = "";
    });
}

export function addErrorValidationStyles(errorResponse) {
    Object.entries(errorResponse).forEach(([key, message]) => {
        const errorDiv = document.querySelector(`[data-inputName="${key}"]`);
        const targetInput = document.getElementById(`${key}`);
        errorDiv.innerHTML = `<span class="text-red-500">${message}</span>`;
        errorDiv.classList.add("text-red-500");
        targetInput.classList.add("ring-rose-500");
    });
}
