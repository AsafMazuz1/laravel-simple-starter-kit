const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [
        require('./vendor/wireui/wireui/tailwind.config.js')
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/wireui/wireui/resources/**/*.blade.php',
        './vendor/wireui/wireui/ts/**/*.ts',
        './vendor/wireui/wireui/src/View/**/*.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                body: ['Assistant', ...defaultTheme.fontFamily.sans],
                text: ['ALMONI', ...defaultTheme.fontFamily.sans],
                'text-bold': ['ALMONI-BOLD', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    DEFAULT: "rgb(var(--color-primary) / <alpha-value>)",
                    'font': '#00EBB1',
                    '50': '#EFFEF9',
                    '100': '#DBFEF2',
                    '200': '#B4FCE5',
                    '300': '#8DFBD7',
                    '400': '#65F9C9',
                    '500': '#3EF8BB',
                    '600': '#09F5A8',
                    '700': '#07BF83',
                    '800': '#05895E',
                    '900': '#035338'
                },
                'light-green' : '#C8FFF2',
            }
        },
    },
    corePlugins: {
        aspectRatio: false,
    },
    plugins: [require('@tailwindcss/aspect-ratio'), require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
