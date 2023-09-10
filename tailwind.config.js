const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './resources/views/portal/ninja2020/**/*.blade.php',
        './resources/views/email/template/**/*.blade.php',
        './resources/views/email/components/**/*.blade.php',
        './resources/views/themes/ninja2020/**/*.blade.php',
        './resources/views/auth/**/*.blade.php',
        './resources/views/setup/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                mont: ['Mont', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gray: colors.gray,
            },
            minWidth: {
                '1/2': '50%',
            },
        },
    },
    variants: {
        extend: {
            ringWidth: ['hover', 'active'],
            ringColor: ['hover', 'active'],
        },
    },
    plugins: [
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
};
