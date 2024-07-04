// I leave for now in case I make error validation client-side

export function uploadImage(file) {
    document
        .getElementById("addIllustrationForm")
        .addEventListener("submit", function (e) {
            e.preventDefault();
            const formData = new FormData();
            formData.append("path", file);
            formData.append("title", document.getElementById("title").value);

            axios
                .post("/admin/illustrations/store", formData, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((response) => {
                    console.log("Upload successful:", response);
                })
                .catch((error) => {
                    console.error("Upload failed:", error);
                });
        });
}
