document.addEventListener("DOMContentLoaded", () => {
    let picturebutton = document.getElementById("picture-button");

    let toggled = false;
    picturebutton.onclick = () => {
        let picture_upload = document.getElementById("picture-upload-div");
        if(!toggled)
            picture_upload.classList.remove("invisible");
        else
            picture_upload.classList.add("invisible");

        toggled = !toggled;
    };


});
