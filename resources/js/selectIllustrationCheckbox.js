const illustrations = document.querySelectorAll(".selectedIllustrations");
const deleteSelectedBtn = document.getElementById("deleteSelectedBtn");
const selectAllCheckbox = document.getElementById(
    "selectAllIllustrationsCheckbox"
);

// ********** Checkbox: Select ALL illustrations functionality ************
selectAllCheckbox?.addEventListener("change", function () {
    selectAllToggle(this, deleteSelectedBtn, illustrations);
});

// ********** Checkbox: Select SINGLE illustration functionality ************
illustrations?.forEach(function (checkbox) {
    checkbox.addEventListener("click", function () {
        const checkedList = document.querySelectorAll(
            "input[name='selected_illustrations[]']:checked"
        );

        if (checkedList.length == illustrations.length) {
            selectAllCheckbox.checked = true;
            deleteSelectedBtn.classList.remove("hidden");
        } else if (checkedList.length > 0) {
            deleteSelectedBtn.classList.remove("hidden");
            selectAllCheckbox.checked = false;
        } else {
            deleteSelectedBtn.classList.add("hidden");
            selectAllCheckbox.checked = false;
        }
    });
});

function selectAllToggle(selectAllCheckbox, deleteSelectedBtn, illustrations) {
    const newState = selectAllCheckbox.checked;
    deleteSelectedBtn.classList.toggle("hidden", !newState);
    illustrations.forEach((checkbox) => {
        checkbox.checked = newState;
    });
}
