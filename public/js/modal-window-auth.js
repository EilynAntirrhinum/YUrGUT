document.addEventListener("DOMContentLoaded", () => {
    const userBtn = document.querySelector("#user-button"),
        authBtn = document.querySelector(".auth-btn"),
        modalWindowAuth = document.querySelector(".modal-wrapper-auth"),
        closeModalSymbAuth = document.querySelector(".close-modal-auth")

    function openModalWindowAuth() {
        modalWindowAuth.classList.replace("hide", "active");
    }

    function closeModalWindowAuth() {
        modalWindowAuth.classList.replace("active", "hide");
    }

    modalWindowAuth.addEventListener("click", (e) => {
        if (e.target == e.currentTarget) {
            closeModalWindowAuth();
        }
    })

    document.addEventListener("keydown", (e) => {
        if (e.code == "Escape") {
            closeModalWindowAuth();
        }
    })

    userBtn.addEventListener("click", (e) => {
        e.preventDefault();
        openModalWindowAuth();
    })

    authBtn.addEventListener("click", () => {
        closeModalWindowAuth();
    })

    closeModalSymbAuth.addEventListener("click", () => {
        closeModalWindowAuth();
    })
})
