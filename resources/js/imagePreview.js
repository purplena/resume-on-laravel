export function imagePreview(files) {
    const allowedTypes = ["image/jpeg", "image/png", "image/gif"];
    const previewContainer = document.getElementById("previewContainer");

    previewContainer.innerHTML = "";

    Array.from(files).forEach((file) => {
        if (!allowedTypes.includes(file.type)) {
            alert("Invalid file type. Please upload an image.");
            return;
        }

        const reader = new FileReader();
        reader.onload = function (event) {
            const imgElement = document.createElement("img");
            imgElement.src = event.target.result;
            imgElement.alt = "Image Preview";
            imgElement.classList.add("w-full", "max-w-[250px]", "m-2"); // Example classes, adjust as needed

            previewContainer.appendChild(imgElement);
        };

        reader.readAsDataURL(file);
    });
}
