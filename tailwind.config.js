/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./dist/*.{html,js,php}",
    "./User/*.{html,js,php}",
    "./Admin/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

