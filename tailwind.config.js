/** @type {import('tailwindcss').Config} */
module.exports = {
  plugins: [
        require('flowbite/plugin')
    ],
  darkMode: "class",
  content: [
    "./src/**/*.{html,js,php}",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      screens: {
        print: {raw: 'print'},
        screen: {raw: 'screen'},
      },
    },
  },
  plugins: [require("flowbite/plugin")],
  charts: true,
  plugins:[require('@tailwindcss/aspect-ratio')],
};
