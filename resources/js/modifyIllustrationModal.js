const editBtns = document.querySelectorAll("[data-action='edit']");

editBtns.forEach((btn) => {
    btn.addEventListener("click", function (event) {
        const targetBtn = event.target;
        const id = targetBtn.getAttribute("data-illustrationId");

        const formData = new FormData();
        formData.append("id", id);

        axios
            .get(`/admin/illustrations/edit/${id}`, formData)
            .then((response) => {
                const modal = document.getElementById("myModal");
                const closeBtn = document.getElementById("closBtn");

                modal.style.display = "block";
                closeBtn.addEventListener("click", function () {
                    modal.style.display = "none";
                });

                const editForm = document.getElementById(
                    "editIllustrationForm"
                );
                editForm.action = `/admin/illustrations/update/${id}`;

                const title = document.getElementById("titleEdit");
                const img = document.getElementById("previewImageEdit");
                title.value = response.data.illustration.title;
                img.src = response.data.url;

                window.addEventListener("click", function (event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                });
            })
            .catch((error) => {
                console.log(error);
            });
    });
});
