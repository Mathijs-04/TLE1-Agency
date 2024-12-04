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
            colors: {
                violetOH: { 500: '#aa0160',
                            600: '#7c1a51'},
                greenOH: { 500: '#92AA83' },
                cream: '#FBFCF6',
            },
            fontFamily: {
                custom: ['Radikal', 'sans-serif'],
            },
            fontWeight: {
                thin: 100,
                normal: 400,
                bold: 700,
            },
        },
    },

    plugins: [forms],
};
