const defaults = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        // Only way to not rebuild infinitely is to *not* watch './source/assets/build'
        './source/404.blade.php',
        './source/index.blade.php',
        './source/_assets/**/*.{js,vue}',
        './source/_components/**/*.{html,php,md}',
        './source/_layouts/**/*.{html,php,md}',
        './source/docs/**/*.{html,php,md}',
    ],
    theme: {
        screens: {
            sm: '576px',
            md: '768px',
            lg: '992px',
            xl: '1200px',
        },
        extend: {
            colors: {
                'grey-darker': '#596a73',
                'grey-dark': '#70818a',
                grey: '#f2f5f8',
                'grey-light': '#dae4e9',
                'grey-lighter': '#f3f7f9',
                'grey-lightest': '#fafcfc',

                'brown-lightest': '#F7F6F5',

                yellow: '#ffed4a',

                'teal-light': '#AEF2FD',

                'blue-darkest': '#0A2440',
                'blue-darker': '#0F2F53',
                'blue-dark': '#45658a',
                blue: '#3C6492',
                'blue-lighter': '#2D81DF',

                'indigo-darker': '#3E6389',
                'indigo-dark': '#143154',
                'indigo-lighter': '#e1e6ea',

                'purple-darker': '#562b61',
                'purple-dark': '#773580',
                purple: '#96539f',
                'purple-light': '#a779e9',
                'purple-lighter': '#cbabf8',

                'pink-dark': '#eb5286',
                pink: '#ee6e99',
                'pink-lighter': '#FFD8D8',
            },
            fontFamily: {
                sans: ['proxima-nova', ...defaults.fontFamily.sans],
            },
            // All defaults, kept to override v2 default line heights
            fontSize: {
                sm: '0.875rem',
                base: '1rem',
                lg: '1.125rem',
                xl: '1.25rem',
                '2xl': '1.5rem',
                '3xl': '1.875rem',
                '4xl': '2.25rem',
            },
            borderColor: (theme) => ({
                DEFAULT: theme('colors.grey-light'),
            }),
        },
    },
};
