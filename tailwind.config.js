/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    colors: {
      ...colors,
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'green-pastel': '#77dd77',
      'sea-green': '#008B7FFF',
      'turquoise-green': '#90cdc3',
      'linen': '#FC98C3FF',
      'pale-turquoise': '#b6d8f2',
      'yellow': '#B4C70BFF',
      'black': '#000000'
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

