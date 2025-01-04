import Quill from 'quill'
// import "quill/dist/quill.core.css";

const options = {
    modules: {
      toolbar: true,
    },
    placeholder: 'Compose an epic...',
    theme: "snow",
  };
const quill = new Quill('#editor', options);
