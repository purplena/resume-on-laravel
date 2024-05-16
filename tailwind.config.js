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
        extend: {
            spacing: {
                navbarMargin: "68px",
            },
            maxWidth: {
                maxScreenWidth: "1024px",
            },
            maxHeight: {
                heroImage: "400px",
            },
            colors: {
                egg: "#FDF8EE",
                "main-100": "#efecf2",
                "main-200": "#e0dae5",
                "main-300": "#d1c7d9",
                "main-400": "#c2b5cc",
                "main-500": "#B3A3C0",
                "main-600": "#8f8299",
                "main-700": "#6b6173",
                "main-800": "#47414c",
                "main-900": "#2A1E35",
                "pink-active": "#D197C3",
                "pink-pastel": "#FDE9FF",
                "peach-pastel": "#E5957E",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
