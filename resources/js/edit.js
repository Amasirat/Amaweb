document.addEventListener("DOMContentLoaded", () => {
    const modalButton = document.getElementById("modal-button");
    const modal = document.getElementById("delete-modal");
    const modalCancelButton = document.getElementById("cancel-modal");

    let clicked = false;
    modalButton.onclick = () => {
        clicked = !clicked;
        clicked ?
        modal.classList.remove("hidden") :
        modal.classList.add("hidden");
    };

    modalCancelButton.onclick = () => {
        clicked = false;

        modal.classList.add("hidden");
    };
});

