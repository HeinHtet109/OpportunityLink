import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#eff6ff",
                    100: "#dbeafe",
                    200: "#bfdbfe",
                    300: "#93c5fd",
                    400: "#60a5fa",
                    500: "#3b82f6",
                    600: "#2563eb",
                    700: "#1d4ed8",
                    800: "#1e40af",
                    900: "#1e3a8a",
                },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            transitionProperty: {
                width: "width",
            },
            textDecoration: ["active"],
            minWidth: {
                kanban: "28rem",
            },
        },
    },

    safelist: [
        // In Markdown (README…)
        "justify-evenly",
        "overflow-hidden",
        "rounded-md",

        // From the Hugo Dashboard
        "w-64",
        "w-1/2",
        "rounded-l-lg",
        "rounded-r-lg",
        "bg-gray-200",
        "grid-cols-4",
        "grid-cols-7",
        "h-6",
        "leading-6",
        "h-9",
        "leading-9",
        "shadow-lg",
        "bg-opacity-50",
        "dark:bg-opacity-80",
        "capitalize",

        // For Astro one
        "grid",
        "bg-amber-600",
        "bg-amber-700",
        "bg-emerald-700",
        "bg-teal-600",
        "bg-teal-700",
        "bg-teal-800",
        "bg-red-700",
        "bg-red-400",
        "bg-red-500",
        "text-red-700",
        "text-red-600",
        "text-green-800",
        "text-green-400",
        "bg-green-50",
        "bg-green-600",
        "scrollbar-h-1/5",
    ],
    plugins: [
        forms,
        require("@tailwindcss/aspect-ratio"),
        require("flowbite/plugin"),
        require("flowbite-typography"),
        require("tailwind-scrollbar")({ nocompatible: true }),
    ],
};
