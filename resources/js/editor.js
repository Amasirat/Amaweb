import { createWysimark } from "@wysimark/standalone";

document.addEventListener("DOMContentLoaded", () => {

    const editorContainer = document.getElementById("blog-editor");

    const wysimark = createWysimark(editorContainer, {
        initialMarkdown: "# Hello World!",
        placeholder: "Write Here..."
    });
});
