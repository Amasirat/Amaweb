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

    document.querySelectorAll('.cancel-edit').forEach(cancelButton => {
        cancelButton.addEventListener("click", () => {
            const commentWrapper = cancelButton.closest('.comment-wrapper');
            commentWrapper.querySelector(".edit-comment").classList.remove(hide);
            commentWrapper.querySelector(".comment-text").classList.remove(hide);
            commentWrapper.querySelector(".edit-comment-box").classList.add(hide);
        });
    });
});
