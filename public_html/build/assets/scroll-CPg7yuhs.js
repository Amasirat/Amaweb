document.addEventListener("DOMContentLoaded",()=>{const t=document.getElementById("scrollable-div"),e=document.getElementById("scroll-left"),l=document.getElementById("scroll-right");e.addEventListener("click",()=>{t.scrollBy({left:-200,behavior:"smooth"})}),l.addEventListener("click",()=>{t.scrollBy({left:200,behavior:"smooth"})})});
