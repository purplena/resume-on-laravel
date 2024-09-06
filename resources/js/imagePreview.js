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
            imgElement.classList.add(
                "object-contain",
                "w-[100%]",
                "max-w-[200px]"
            );

            const outerDiv = document.createElement("div");
            outerDiv.className = "absolute -right-2 -top-2 cursor-pointer";

            const buttonDiv = document.createElement("div");
            buttonDiv.className =
                "w-[36px] h-[36px] relative border border-bg-main-600 bg-white rounded-full hover:bg-egg";

            const iconElement = document.createElement("i");
            iconElement.className =
                "fa-solid fa-xmark absolute top-0 left-[50%] -translate-x-2/4 text-main-600 text-[18px] p-2";

            buttonDiv.appendChild(iconElement);
            outerDiv.appendChild(buttonDiv);

            const outerOuterDiv = document.createElement("div");
            outerOuterDiv.className = "relative";

            outerOuterDiv.appendChild(outerDiv);
            outerOuterDiv.appendChild(imgElement);

            buttonDiv.addEventListener("click", function () {
                imgElement.remove();
                outerOuterDiv.remove();
                document.getElementById("path").value = "";
            });

            previewContainer.appendChild(outerOuterDiv);
        };

        reader.readAsDataURL(file);
    });
}
