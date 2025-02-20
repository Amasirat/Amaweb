let hide = "hidden";
document.addEventListener("DOMContentLoaded", function () {
    // Handle Edit Buttons
    document.querySelectorAll('.edit-comment').forEach(editButton => {
        editButton.addEventListener('click', () => {
            const commentWrapper = editButton.closest('.comment-wrapper');
            const textBox = commentWrapper.querySelector('.comment-text');
            const commentBox = commentWrapper.querySelector('.edit-comment-box');

            commentBox.classList.remove('hidden');
            editButton.classList.add('hidden');
            textBox.classList.add('hidden');
        });
    });
    // Handling canceling editing
    document.querySelectorAll('.cancel-edit').forEach(cancelButton => {
        cancelButton.addEventListener("click", () => {
            const commentWrapper = cancelButton.closest('.comment-wrapper');
            commentWrapper.querySelector(".edit-comment").classList.remove(hide);
            commentWrapper.querySelector(".comment-text").classList.remove(hide);
            commentWrapper.querySelector(".edit-comment-box").classList.add(hide);
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
