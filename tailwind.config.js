import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Public Sans','Figtree', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                sm: '480px',
                md: '768px',
                lg: '976px',
                xl: '1300px',
              },
            colors: {
                'accent'    : '#FF0000',
                'danger'    : '#7B1010',
                'warning'   : '#FFDB0C',
                'success'   : '#3CE037',
                'primary'   : '#F0F0F0',
                'night'     : '#111827'
              },
        },
    },

    plugins: [forms],
};
