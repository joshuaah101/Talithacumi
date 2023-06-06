// const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
        fontFamily: {
            'poppins' : ['poppins'],
            'montserrat' : ['montserrat']
        }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
