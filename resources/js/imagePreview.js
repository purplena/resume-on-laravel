export function imagePreview(file) {
    const allowedTypes = ["image/jpeg", "image/png", "image/gif"];
    if (!allowedTypes.includes(file.type)) {
        alert("Invalid file type. Please upload an image.");
        return;
    }
    if (file) {
        const reader = new FileReader();
        reader.onload = function (event) {
            document.getElementById("dragAndDropSvg").classList.add("hidden");
            document.getElementById("previewImage").classList.remove("hidden");
            document.getElementById("previewImage").src = event.target.result;
        };

        reader.readAsDataURL(file);
    }
}
