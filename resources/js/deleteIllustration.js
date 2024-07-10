const deleteBtns = document.querySelectorAll("[data-action='delete']");

deleteBtns.forEach((btn) => {
    btn.addEventListener("click", function (event) {
        const targetBtn = event.target;
        const id = targetBtn.getAttribute("data-illustrationId");
        const axiosFlashMessage = document.getElementById(
            "axios-flash-message"
        );

        const formData = new FormData();
        formData.append("id", id);

        axios
            .delete(`/admin/illustrations/delete/${id}`, formData)
            .then((response) => {
                btn.parentElement.parentElement.parentElement.style.display =
                    "none";
                axiosFlashMessage.classList.remove("hidden");
                axiosFlashMessage.innerHTML = `<span class="font-bold text-h4 text-egg">${response.data.status}</span>`;
            })
            .catch((error) => {
                console.log(error);
            });
    });
});
