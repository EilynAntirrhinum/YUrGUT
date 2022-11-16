document.addEventListener("DOMContentLoaded", () => {
    const editBtn = document.querySelectorAll(".edit-btn"),
        name = document.querySelector("#name-edit"),
        shortDesc = document.querySelector("#sd-edit"),
        fullDesc = document.querySelector("#fd-edit"),
        leadership = document.querySelector("#leadership-edit"),
        loadedImg = document.querySelector("#loaded-img-edit")

    editBtn.forEach(item => {
        item.addEventListener("click", async (e) => {
            getInfo(e.target.value);
        })
    })

    async function getInfo(id) {
        let route = "/admin/app/controllers/faculties/set-info.php?faculty-info=" + id
        let info = await getData(route)
        outInPage(info)
    }

    function outInPage(data) {
        name.value = data.name
        shortDesc.value = data.short_description
        fullDesc.value = data.full_description
        leadership.value = data.leadership
        loadedImg.src = "/public/img/" + data.img
    }
})