const illustrations = document.querySelectorAll(".selectedIllustrations");
const deleteSelectedBtn = document.getElementById("deleteSelectedBtn");
const selectAllCheckbox = document.getElementById(
    "selectAllIllustrationsCheckbox"
);
let checkedInputs = [];

// ********** Checkbox: Select ALL illustrations functionality ************
selectAllCheckbox?.addEventListener("change", function () {
    let arrayHelper = [];
    if (selectAllCheckbox.checked) {
        deleteSelectedBtn.classList.remove("hidden");
        illustrations.forEach(function (checkbox) {
            checkbox.checked = true;
            arrayHelper.push(checkbox.value);
        });
        checkedInputs = arrayHelper;
    } else {
        deleteSelectedBtn.classList.add("hidden");
        illustrations.forEach(function (checkbox) {
            checkbox.checked = false;
        });
        checkedInputs = [];
    }
});

// ********** Checkbox: Select SINGLE illustration functionality ************
illustrations?.forEach(function (checkbox) {
    checkbox.addEventListener("click", function () {
        if (checkbox.checked) {
            checkedInputs.push(checkbox.value);
        } else {
            checkedInputs = checkedInputs.filter(function (item) {
                return item !== checkbox.value;
            });
        }

        if (checkedInputs.length == illustrations.length) {
            selectAllCheckbox.checked = true;
        } else if (checkedInputs.length > 0) {
            deleteSelectedBtn.classList.remove("hidden");
            selectAllCheckbox.checked = false;
        } else {
            deleteSelectedBtn.classList.add("hidden");
            selectAllCheckbox.checked = false;
        }
    });
});
