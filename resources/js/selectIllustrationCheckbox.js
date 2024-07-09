const illustrations = document.querySelectorAll(".selectedIllustrations");
const deleteSelectedBtn = document.getElementById("deleteSelectedBtn");
const selectAllCheckbox = document.getElementById(
    "selectAllIllustrationsCheckbox"
);

// ********** Checkbox: Select SINGLE illustration functionality ************
document
    .getElementById("illustrationTable")
    .addEventListener("click", function () {
        let checkedInputs = [];
        illustrations.forEach(function (checkbox) {
            if (checkbox.checked) {
                checkedInputs.push(checkbox.value);
            }
        });
        if (checkedInputs.length > 0) {
            deleteSelectedBtn.classList.remove("hidden");
        } else {
            deleteSelectedBtn.classList.add("hidden");
        }
    });

// ********** Checkbox: Select ALL illustrations functionality ************

function toggleAll() {
    illustrations.forEach(function (checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });
}

selectAllCheckbox.addEventListener("change", function () {
    toggleAll();
    deleteSelectedBtn.classList.toggle("hidden");
});

toggleAll();
