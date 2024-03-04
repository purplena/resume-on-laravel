/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/views/**/*.blade.php", "./resources/js/**/*.js"],
    theme: {
        fontSize: {
            h1: "2rem",
            h2: "1.75rem",
            h3: "1.5rem",
            h4: "1.25rem",
            h5: "1rem",
            h6: "0.875rem",
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
