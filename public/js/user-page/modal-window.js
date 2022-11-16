document.addEventListener("DOMContentLoaded", () => {
    const modalWindowEdit = document.querySelector(".modal-wrapper-edit"),
        inputs = document.querySelectorAll("input"),
        editBtn = document.querySelector("#edit-user-info"),
        updateBtn = document.querySelector(".update-btn"),
        closeModalSymbEdit = document.querySelectorAll(".close-modal-edit")

    function checkInvalidSymb(input) {
        return input.value.trim().length <= 0
    }

    inputs.forEach(item => {
        item.addEventListener("change", () => {
            if (checkInvalidSymbEdit(item)) {
                item.style.backgroundColor = ""
            }
        })
    });


    function openModalWindowEdit() {
        modalWindowEdit.classList.replace("hide", "active");
    }

    function closeModalWindowEdit() {
        modalWindowEdit.classList.replace("active", "hide");
    }

    modalWindowEdit.addEventListener("click", (e) => {
        if (e.target == e.currentTarget) {
            closeModalWindowEdit();
        }
    })

    document.addEventListener("keydown", (e) => {
        if (e.code == "Escape") {
            closeModalWindowEdit();
        }
    })

    editBtn.addEventListener("click", (e) => {
            e.preventDefault();
            updateBtn.value = e.target.value;
            openModalWindowEdit();
    })

    updateBtn.addEventListener("click", () => {
        closeModalWindowEdit();
    })

    closeModalSymbEdit.forEach(item => {
        item.addEventListener("click", () => {
            closeModalWindowEdit();
        })
    })
})