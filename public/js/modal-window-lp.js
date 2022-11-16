document.addEventListener("DOMContentLoaded", () => {
    const modalWindowLP = document.querySelector(".modal-wrapper-lp"),
        saveLPBtn = document.querySelector(".save-lp-btn"),
        closeModalSymbLP = document.querySelector(".close-modal-lp"),
        finishStmt = document.querySelector("#finish-statement-btn"),
        examsInput = document.querySelectorAll(".fill-exams-input")

    function openModalWindowLP() {
        examsInput.forEach(item => {
            if (item.value != "") {
                modalWindowLP.classList.replace("hide", "active");
            }
        })
    }

    function closeModalWindowLP() {
        modalWindowLP.classList.replace("active", "hide");
    }

    modalWindowLP.addEventListener("click", (e) => {
        if (e.target == e.currentTarget) {
            closeModalWindowLP();
        }
    })

    document.addEventListener("keydown", (e) => {
        if (e.code == "Escape") {
            closeModalWindowLP();
        }
    })

    finishStmt.addEventListener("click", (e) => {
        // e.preventDefault();
        saveLPBtn.value = e.target.value;
        openModalWindowLP();
    })

    saveLPBtn.addEventListener("click", () => {
        closeModalWindowLP();
    })

    closeModalSymbLP.addEventListener("click", () => {
        closeModalWindowLP();
    })
})
