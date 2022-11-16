const loadImgEdit = document.querySelector("#load-img-edit"),
    imgEdit = document.querySelector("#loaded-img-edit")

loadImgEdit.addEventListener("change", (e) => {
    imgEdit.src = URL.createObjectURL(e.target.files[0])
    imgEdit.style.display = "block";
})
