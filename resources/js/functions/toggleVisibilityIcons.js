export function toggleVisibility(className, isVisible) {
    const elements = document.querySelectorAll(`.${className}`);
    elements.forEach(function (element) {
        if (isVisible) {
            element.classList.remove("hidden");
        } else {
            element.classList.add("hidden");
        }
    });
}
