document.addEventListener("DOMContentLoaded", () => {
    const modalWindowEdit = document.querySelector(".modal-wrapper-edit"),
        modalWindowAdd = document.querySelector(".modal-wrapper-add"),
        inputs = document.querySelectorAll("input"),
        editBtn = document.querySelectorAll(".edit-btn"),
        updateBtn = document.querySelector(".update-btn"),
        addBtn = document.querySelector(".add-btn"),
        closeModalSymbEdit = document.querySelectorAll(".close-modal-edit"),
        closeModalSymbAdd = document.querySelectorAll(".close-modal-add"),
        addSpec = document.querySelector("#add-spec"),
        modalWindowExams = document.querySelector(".modal-wrapper-exams"),
        examsBtn = document.querySelectorAll(".exams-btn"),
        closeModalSymbExams = document.querySelectorAll(".close-modal-exams"),
        saveExamsBtn = document.querySelector(".save-exams-btn")

    function checkInvalidSymb(input) {
        return input.value.trim().length <= 0
    }

    inputs.forEach(item => {
        item.addEventListener("change", () => {
            if (checkInvalidSymb(item)) {
                item.style.backgroundColor = ""
            }
        })
    });


    // modal window with editing speciality

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

    editBtn.forEach(item => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            updateBtn.value = e.target.value;
            openModalWindowEdit();
        })
    })

    updateBtn.addEventListener("click", () => {
        closeModalWindowEdit();
    })

    closeModalSymbEdit.forEach(item => {
        item.addEventListener("click", () => {
            closeModalWindowEdit();
        })
    })


    // modal window with adding speciality

    function openModalWindowAdd() {
        modalWindowAdd.classList.replace("hide", "active");
    }

    function closeModalWindowAdd() {
        modalWindowAdd.classList.replace("active", "hide");
    }

    addSpec.addEventListener("click", (e) => {
        e.preventDefault();
        openModalWindowAdd();
    })

    modalWindowAdd.addEventListener("click", (e) => {
        if (e.target == e.currentTarget) {
            closeModalWindowAdd();
        }
    })

    document.addEventListener("keydown", (e) => {
        if (e.code == "Escape") {
            closeModalWindowAdd();
        }
    })

    addBtn.addEventListener("click", () => {
        closeModalWindowAdd();
    })

    closeModalSymbAdd.forEach(item => {
        item.addEventListener("click", () => {
            closeModalWindowAdd();
        })
    })


    // modal window with exams

    function openModalWindowExams() {
        modalWindowExams.classList.replace("hide", "active");
    }

    function closeModalWindowExams() {
        modalWindowExams.classList.replace("active", "hide");
    }

    examsBtn.forEach(item => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            saveExamsBtn.value = e.target.value;
            openModalWindowExams();
        })
    })

    modalWindowExams.addEventListener("click", (e) => {
        if (e.target == e.currentTarget) {
            closeModalWindowExams();
        }
    })

    document.addEventListener("keydown", (e) => {
        if (e.code == "Escape") {
            closeModalWindowExams();
        }
    })

    saveExamsBtn.addEventListener("click", () => {
        closeModalWindowExams();
    })

    closeModalSymbExams.forEach(item => {
        item.addEventListener("click", () => {
            closeModalWindowExams();
        })
    })
})