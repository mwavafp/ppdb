import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'orange':'#F4511E',
                'orangehvr':'#D5481C',
                'reds':'#FF0000',
                'blue' : '#3C2EFF',
                'purple':'#D70EBD'
            },
            borderRadius:{
                'larges':'200px'
            }
        },
    },
    plugins: [],
};
