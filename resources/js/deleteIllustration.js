const deleteBtns = document.querySelectorAll("[data-action='delete']");

deleteBtns.forEach((btn) => {
    btn.addEventListener("click", function (event) {
        const id = event.target.getAttribute("data-illustrationId");
        const axiosFlashMessage = document.getElementById(
            "axios-flash-message"
        );

        const formData = new FormData();
        formData.append("id", id);

        const route = identifyRoute();

        axios
            .delete(`${route}${id}`, formData)
            .then((response) => {
                btn.parentElement.parentElement.style.display = "none";
                axiosFlashMessage.classList.remove("hidden");
                axiosFlashMessage.innerHTML = `<span class="font-bold text-h4 text-egg">${response.data.status}</span>`;
            })
            .catch((error) => {
                console.log(error);
            });
    });
});

function identifyRoute() {
    if (window.location.href.includes("illustrations")) {
        return "/admin/illustrations/";
    } else if (window.location.href.includes("projects")) {
        return "/admin/projects/";
    }
}
