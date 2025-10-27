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
                volt: {
                    bg: '#0B1437',    // Fondo lateral oscuro tipo Volt
                    card: '#0E1B4D',  // Variante más clara
                    brand: '#3B82F6', // Acento principal (puedes cambiar a #4F46E5 si prefieres índigo)
                },
            },
            boxShadow: {
                volt: '0 10px 30px rgba(2, 6, 23, .15)',
            },
        },

        fontFamily: {
            sans: ['InterVariable', ...defaultTheme.fontFamily.sans],
        },
    },

    plugins: [forms],
};
