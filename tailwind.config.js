/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/views/**/*.blade.php", "./resources/js/**/*.js"],
    theme: {
        screens: {
            xxs: "330px",
            xs: "400px",
            sm: "540px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
        },
        fontSize: {
            h1: "2.5rem",
            h2: "2rem",
            h3: "1.75rem",
            h4: "1.5rem",
            h5: "1.25rem",
            h6: "0.875rem",
            xs: "0.75rem" /* 12px */,
            sm: "0.875rem" /* 14px */,
            base: "1rem" /* 16px */,
            lg: "1.125rem" /* 18px */,
            xl: "1.25rem" /* 20px */,
            "2xl": "1.5rem" /* 24px */,
            "3xl": "1.875rem" /* 30px */,
        },
        fontFamily: {
            headers: ["Bebas Neue", "Roboto", "sans-serif"],
            body: ["Roboto", "sans-serif"],
        },
        extend: {
            spacing: {
                navbarMargin: "68px",
            },
            maxWidth: {
                maxScreenWidth: "1024px",
                heroImage: "300px",
                heroParagraph: "600px",
            },
            colors: {
                white: "#fefefe",
                black: "#222",
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
            transitionProperty: {
                all: "all",
            },
            transitionDuration: {
                300: "0.3s",
            },
            transitionTimingFunction: {
                in: "ease-in",
                out: "ease-out",
                "in-out": "ease-in-out",
                linear: "linear",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
