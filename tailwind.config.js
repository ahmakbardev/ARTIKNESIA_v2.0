/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        container: {
            center: true,
            screens: {
                sm: '600px',
                md: '728px',
                lg: '984px',
                xl: '1240px',
                '2xl': '1496px',
            },
        },
        extend: {
            colors: {
                'owngray': '#EDEDED',
                'navInfoGray': '#737373',
                'primary': '#DFBE65',
                'primary-darker': '#DAA515',
            },
            fontFamily: {
                montserrat: ['Montserrat', 'sans-serif'],
                poppins: ['Poppins', 'sans-serif'],
            },
            screens: {
                '2xs': '321px',
                xs: '426px',
            },
        },
    },
    plugins: [],
}

