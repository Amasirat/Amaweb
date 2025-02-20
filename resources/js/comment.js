let hide = "hidden";
document.addEventListener("DOMContentLoaded", function () {
    // Handle Edit Buttons
    document.querySelectorAll('.edit-comment').forEach(editButton => {
        const commentWrapper = editButton.closest('.comment-wrapper');
        const textBox = commentWrapper.querySelector('.comment-text');
        const commentBox = commentWrapper.querySelector('.edit-comment-box');
        const replyButton = commentWrapper.querySelector('.reply-button');
        const cancelButton = commentWrapper.querySelector('.cancel-edit');

        editButton.addEventListener('click', () => {
            commentBox.classList.remove(hide);
            editButton.classList.add(hide);
            textBox.classList.add(hide);
            replyButton.classList.add(hide);
        });
    // Handling canceling editing
        cancelButton.addEventListener("click", () => {
            commentBox.classList.add(hide);
            editButton.classList.remove(hide);
            textBox.classList.remove(hide);
            replyButton.classList.remove(hide);
        });
    });

    document.querySelectorAll('.reply-button').forEach(replyButton => {
        const commentWrapper = replyButton.closest('.comment-wrapper');
        const cancelReplyButton = commentWrapper.querySelector(".reply-cancel");
        const replyForm = commentWrapper.querySelector(".reply-form");

        replyButton.addEventListener("click", () => {
            replyButton.classList.add(hide);
            replyForm.classList.remove(hide);
        });

        cancelReplyButton.addEventListener("click", () => {
            replyButton.classList.remove(hide);
            replyForm.classList.add(hide);

        });

    });
});
