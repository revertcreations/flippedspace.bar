const colors = require('tailwindcss/colors')

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js'
    ],
    theme: {
        colors: {
            black: colors.black,
            white: colors.white,
            gray: colors.trueGray,
            red: colors.red,
        },
        fontFamily: {
            'mono': ['"JetBrains Mono"', '"Xanh Mono"', 'Terminus', '"Press Start 2P"', 'VT323', 'ui-monospace'],
        },
        extend: {
            fontSize: {
                'xxs': ['.55rem', '0.7rem'], 
            },
        },
        variants: {
            extend: {
                transform: ['hover'],
                rotate: ['active']
            }
        }
    },
    variants: {
        fontWeight: ({ after }) => after(['hover']),
    },
}
