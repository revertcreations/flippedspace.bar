const colors = require('tailwindcss/colors')

module.exports = {
    theme: {
        colors: {
            black: colors.black,
            white: colors.white,
            gray: colors.trueGray,
        },
        variants: {
            extend: {
                transform: ['hover'],
                rotate: ['active']
            }
        }
    }
}
