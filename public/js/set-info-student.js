document.addEventListener("DOMContentLoaded", () => {
    const editBtn = document.querySelectorAll(".edit-btn"),
        name = document.querySelector("#name-edit"),
        shortDesc = document.querySelector("#sd-edit"),
        fullDesc = document.querySelector("#fd-edit"),
        duration = document.querySelector("#duration-edit"),
        bPlaces = document.querySelector("#b-places-edit"),
        cPlaces = document.querySelector("#c-places-edit"),
        price = document.querySelector("#price-edit"),
        loadedImg = document.querySelector("#loaded-img")


    editBtn.forEach(item => {
        item.addEventListener("click", async (e) => {
            getInfo(e.target.value);
        })
    })

    async function getInfo(id) {
        let route = "/admin/app/controllers/specialities/set-info.php?spec-info=" + id
        let info = await getData(route)
        outInPage(info)
    }

    function outInPage(data) {
        name.value = data.name
        shortDesc.value = data.short_description
        fullDesc.value = data.full_description
        duration.value = data.duration
        bPlaces.value = data.budget_places
        cPlaces.value = data.commerce_places
        price.value = data.commerce_price
        loadedImg.src = "/public/img/specialities/" + data.img
    }
})