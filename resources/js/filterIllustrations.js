const genreBtns = document.querySelectorAll(".genreBtn");

genreBtns.forEach((btn) => {
    btn.addEventListener("click", function (event) {
        if (event.target.classList.contains("genre-active")) {
            event.target.classList.remove("genre-active");
            window.location.replace("/illustrations");
            return;
        }

        genreBtns.forEach((otherBtn) => {
            otherBtn.classList.remove("genre-active");
        });

        btn.classList.add("genre-active");
        const genreId = btn.getAttribute("data-genre-id");

        const formData = new FormData();
        formData.append("id", genreId);

        axios
            .get(`/illustrations/${genreId}`, formData)
            .then((response) => {
                document
                    .querySelector(".links-element")
                    .classList.add("hidden");
                const illustrationSection = document.querySelector(
                    ".illustrationSection"
                );
                illustrationSection.innerHTML = "";
                const illustrations = response.data.projectsByGenre;
                const protocol = window.location.protocol;
                const domain = window.location.hostname;

                illustrations.forEach(function (illustration) {
                    const imgIllustration = document.createElement("img");
                    imgIllustration.src = `${protocol}//${domain}/storage/${illustration.medias[0].path}`;
                    illustrationSection.appendChild(imgIllustration);
                });
            })
            .catch((error) => {
                console.log(error);
            });
    });
});
