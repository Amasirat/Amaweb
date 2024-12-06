document.addEventListener("DOMContentLoaded", () => {

    let commentArea = document.getElementById("reply_division");
    commentArea.style.visibility = 'hidden';


    let replyButton = document.getElementById("reply_button");
    let cancelButton = document.getElementById("cancel_button");

    replyButton.addEventListener("click", () => {
        commentArea.style.visibility = 'visible';
    });

    cancelButton.addEventListener("click", () => {
        commentArea.style.visibility = 'hidden';
    });
});
