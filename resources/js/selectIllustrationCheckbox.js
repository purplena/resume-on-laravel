const illustrations = document.querySelectorAll(".selectedIllustrations");
const deleteSelectedBtn = document.getElementById("deleteSelectedBtn");
const selectAllCheckbox = document.getElementById(
    "selectAllIllustrationsCheckbox"
);

// ********** Checkbox: Select SINGLE illustration functionality ************
let checkedInputs = [];
illustrations?.forEach(function (checkbox) {
    checkbox.addEventListener("click", function () {
        if (checkbox.checked) {
            checkedInputs.push(checkbox.value);
        } else {
            checkedInputs = checkedInputs.filter(function (item) {
                return item !== checkbox.value;
            });
        }

        if (checkedInputs.length > 0) {
            deleteSelectedBtn.classList.remove("hidden");
        } else {
            deleteSelectedBtn.classList.add("hidden");
        }
    });
});

// ********** Checkbox: Select ALL illustrations functionality ************

function toggleAll() {
    illustrations.forEach(function (checkbox) {
        checkbox.checked = selectAllCheckbox.checked;
    });
}

selectAllCheckbox?.addEventListener("change", function () {
    toggleAll();
    deleteSelectedBtn.classList.toggle("hidden");
});

toggleAll();
