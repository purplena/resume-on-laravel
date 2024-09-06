const deleteBtns = document.querySelectorAll(
    "[data-action='deleteProjectMedia']"
);

deleteBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
        const id = btn.parentElement.getAttribute("data-mediaId");

        const axiosFlashMessage = document.getElementById(
            "axios-flash-message"
        );

        const formData = new FormData();
        formData.append("id", id);

        axios
            .delete(`/admin/projects/medias/${id}`, formData)
            .then((response) => {
                btn.parentElement.style.display = "none";
                axiosFlashMessage.classList.remove("hidden");
                axiosFlashMessage.innerHTML = `<span class="font-bold text-h4 text-egg">${response.data.status}</span>`;
            })
            .catch((error) => {
                console.log(error);
            });
    });
});
