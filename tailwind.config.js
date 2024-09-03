import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
const { withAnimations } = require("animated-tailwindcss");
const { nextui } = require("@nextui-org/react");

/** @type {import('tailwindcss').Config} */

module.exports = withAnimations({
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.tsx",
        "./node_modules/@nextui-org/theme/dist/**/*.{js,ts,jsx,tsx}",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                "inter" : ["Inter",...defaultTheme.fontFamily.sans],
                "nunito" : ["Nunito",...defaultTheme.fontFamily.sans],
                //"nunito" : ["Nunito",...defaultTheme.fontFamily.sans]

            },

            colors : {
                "danger" : "#9e1c2e",
                "primary" : "#1c479e",
                "success" : "#118504"
            }
        },
    },

    plugins: [
        forms,
         nextui()
    ],
});
