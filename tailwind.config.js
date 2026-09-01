import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
    ],

    darkMode: "class",

    theme: {
        extend: {
            fontFamily: {
                sans: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    50: '#eef6ff',
                    100: '#d9ebff',
                    200: '#bcdbff',
                    300: '#8ec3ff',
                    400: '#599eff',
                    500: '#2563eb', // Primary sapphire blue
                    600: '#1d4ed8',
                    700: '#1e40af',
                    800: '#1e3a8a',
                    900: '#172554',
                    950: '#0f172a',
                },
                accent: {
                    cyan: '#06b6d4',
                    indigo: '#6366f1',
                    emerald: '#10b981',
                    amber: '#f59e0b',
                    rose: '#f43f5e',
                }
            },
            animation: {
                'fade-in': 'fadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                'slide-up': 'slideUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'float': 'float 4s ease-in-out infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                slideUp: {
                    '0%': { opacity: '0', transform: 'translateY(16px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-6px)' },
                }
            }
        },
    },

    plugins: [forms, "flowbite/plugin"],
};
