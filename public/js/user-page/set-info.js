document.addEventListener("DOMContentLoaded", () => {
    const editBtn = document.querySelector("#edit-user-info"),
        name = document.querySelector("#name"),
        surname = document.querySelector("#surname"),
        patronymic = document.querySelector("#patronymic"),
        numPhone = document.querySelector("#num-phone"),
        numCertif = document.querySelector("#num-certif"),
        school = document.querySelector("#school"),
        dateBirth = document.querySelector("#date-birth"),
        address = document.querySelector("#address"),
        loadedImg = document.querySelector("#loaded-img-edit"),
        passportNum = document.querySelector("#passport-num"),
        passportSeries = document.querySelector("#passport-series"),
        passportGetBy = document.querySelector("#passport-get-by"),
        datePassport = document.querySelector("#date-passport")

    editBtn.addEventListener("click", async () => {
            getInfo();
    })

    async function getInfo() {
        let route = "/app/controllers/user-page/set-info.php"
        let info = await getData(route)
        outInPage(info)
    }

    function outInPage(data) {
        name.value = data.name
        surname.value = data.surname
        patronymic.value = data.patronymic
        numPhone.value = data.num_phone
        numCertif.value = data.num_certif
        school.value = data.school
        dateBirth.value = data.date_birth
        address.value = data.address
        loadedImg.src = "/public/img/statement/" + data.img
        passportNum.value = data.passport_num
        passportSeries.value = data.passport_series
        passportGetBy.value = data.passport_get_by
        datePassport.value = data.date_passport
    }
})