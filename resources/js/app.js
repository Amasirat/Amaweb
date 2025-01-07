import './bootstrap';
import './panel.js';
import './editor.js';

// Featured Slider
document.addEventListener("DOMContentLoaded", () => {
    const scrollableDiv = document.getElementById("scrollable-div");
    const scrollLeftButton = document.getElementById("scroll-left");
    const scrollRightButton = document.getElementById("scroll-right");

    scrollLeftButton.addEventListener("click", () => {
        scrollableDiv.scrollBy({ left: -200, behavior: "smooth" });
    });

    scrollRightButton.addEventListener("click", () => {
        scrollableDiv.scrollBy({ left: 200, behavior: "smooth" });
    });
});


