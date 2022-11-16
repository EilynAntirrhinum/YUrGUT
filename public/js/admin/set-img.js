const loadImgEdit = document.querySelector("#load-img-edit"),
    imgEdit = document.querySelector("#loaded-img-edit"),
    loadImgAdd = document.querySelector("#load-img-add"),
    imgAdd = document.querySelector("#loaded-img-add")

loadImgEdit.addEventListener("change", (e) => {
    imgEdit.src = URL.createObjectURL(e.target.files[0])
    imgEdit.style.display = "block";
})

loadImgAdd.addEventListener("change", (e) => {
    imgAdd.src = URL.createObjectURL(e.target.files[0])
    imgAdd.style.display = "block";
})