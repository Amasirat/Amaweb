let toggled = false;
let hide = "hidden";
document.addEventListener("DOMContentLoaded", () => {
    let picturebutton = document.getElementById("picture-button");
    picturebutton.onclick = () => {
        let picture_upload = document.getElementById("picture-upload-div");
        if(!toggled)
            picture_upload.classList.remove(hide);
        else
            picture_upload.classList.add(hide);

        toggled = !toggled;
    };
});
