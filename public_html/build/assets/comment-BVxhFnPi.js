let e="hidden";document.addEventListener("DOMContentLoaded",function(){document.querySelectorAll(".edit-comment").forEach(c=>{const t=c.closest(".comment-wrapper"),o=t.querySelector(".comment-text"),s=t.querySelector(".edit-comment-box"),r=t.querySelector(".reply-button"),l=t.querySelector(".cancel-edit");c.addEventListener("click",()=>{s.classList.remove(e),c.classList.add(e),o.classList.add(e),r.classList.add(e)}),l.addEventListener("click",()=>{s.classList.add(e),c.classList.remove(e),o.classList.remove(e),r.classList.remove(e)})}),document.querySelectorAll(".reply-button").forEach(c=>{const t=c.closest(".comment-wrapper"),o=t.querySelector(".reply-cancel"),s=t.querySelector(".reply-form");c.addEventListener("click",()=>{c.classList.add(e),s.classList.remove(e)}),o.addEventListener("click",()=>{c.classList.remove(e),s.classList.add(e)})})});
