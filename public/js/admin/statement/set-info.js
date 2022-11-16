document.addEventListener("DOMContentLoaded", () => {
    const editBtn = document.querySelectorAll(".spec-stmt-btn"),
        name = document.querySelector("#name-edit"),
        description = document.querySelector("#description-edit"),
        duration = document.querySelector("#duration-edit"),
        bPlaces = document.querySelector("#b-places-edit"),
        cPlaces = document.querySelector("#c-places-edit"),
        price = document.querySelector("#price-edit"),
        loadedImg = document.querySelector("#loaded-img-edit")


    editBtn.forEach(item => {
        item.addEventListener("click", async (e) => {
            getInfo(e.target.value);
        })
    })

    async function getInfo(id) {
        let route = "/admin/app/controllers/statement/set-info.php?stmt-info=" + id
        let info = await getData(route)
        outInPage(info)
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
})