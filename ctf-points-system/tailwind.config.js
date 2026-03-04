import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
                animation: {
                glow: "glow 2s ease-in infinite alternate",
                shimmer: "shimmer 3s cubic-bezier(0.4,0,0.2,1) infinite",
            },
            keyframes: {
                glow: {
                "0%": { boxShadow: "0 0 20px #22C55E" },
                "100%": { boxShadow: "0 0 40px #22C55E" },
                },
                shimmer: {
                    "100%": { transform: "translateX(100%)" },
                },
            },
        },
    },

    plugins: [forms],
};
