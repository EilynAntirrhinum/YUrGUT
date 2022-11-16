document.addEventListener("DOMContentLoaded", () => {
    const editBtn = document.querySelectorAll(".edit-btn"),
        login = document.querySelector("#login-edit"),
        password = document.querySelector("#password-edit"),
        surname = document.querySelector("#surname-edit")

    editBtn.forEach(item => {
        item.addEventListener("click", async (e) => {
            getInfo(e.target.value);
        })
    })

    async function getInfo(id) {
        let route = "/admin/app/controllers/committee/set-info.php?com-info=" + id
        let info = await getData(route)
        outInPage(info)
    }

    function outInPage(data) {
        login.value = data.login
        password.value = data.password
        surname.value = data.surname
    }
})