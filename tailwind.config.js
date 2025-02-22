/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
        colors: {
            "background":"rgb(2, 17, 68)",
        },
    },
  },
  safelist: [
    'ml-8',
    'ml-16',
    'ml-24',
    'ml-32',
    'ml-40',
    'ml-48',
  ],
};
