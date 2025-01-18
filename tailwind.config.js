import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php', // Incluye todos los archivos .blade.php en resources
        './resources/**/*.js',        // Incluye todos los archivos .js en resources (si los hay)
        './resources/**/*.vue',       // Incluye todos los archivos .vue en resources (si los hay)
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};