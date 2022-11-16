document.addEventListener("DOMContentLoaded", () => {
    const editBtn = document.querySelectorAll(".edit-btn"),
        name = document.querySelector("#name-edit"),
        description = document.querySelector("#description-edit"),
        duration = document.querySelector("#duration-edit"),
        bPlaces = document.querySelector("#b-places-edit"),
        cPlaces = document.querySelector("#c-places-edit"),
        price = document.querySelector("#price-edit"),
        loadedImg = document.querySelector("#loaded-img-edit"),
        inputsExams = document.querySelectorAll(".input-exams"),
        examsBtn = document.querySelectorAll(".exams-btn")


    editBtn.forEach(item => {
        item.addEventListener("click", async (e) => {
            getInfo(e.target.value);
        })
    })

    examsBtn.forEach(item => {
        item.addEventListener("click", async (e) => {
            getInfoExams(e.target.value);
        })
    })

    async function getInfo(id) {
        let route = "/admin/app/controllers/specialities/set-info.php?spec-info=" + id
        let info = await getData(route)
        outInPage(info)
    }

    async function getInfoExams(id) {
        let route = "/admin/app/controllers/specialities/set-info.php?exam-info-cb=" + id
        let info = await getData(route)
        outInPageExams(info)

        console.log(info)
    }

    function outInPage(data) {
        name.value = data.name
        description.value = data.description
        duration.value = data.duration
        bPlaces.value = data.budget_places
        cPlaces.value = data.commerce_places
        price.value = data.commerce_price
        loadedImg.src = "/public/img/" + data.img
    }

    function outInPageExams(data) {
        inputsExams.forEach(item => {
            data.forEach(id => {
                if(id.exam_id == item.value) {
                    item.checked = true
                }
            })
        })
    }
})