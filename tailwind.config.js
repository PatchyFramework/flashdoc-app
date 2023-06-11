/** @type {import('tailwindcss').Config} */
module.exports = {
  purge: {
    content: ['./resources/**/*.blade.php'],
  },
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./src/**/*.{html,js}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    fontFamily: {
      quicksand : ["'Quicksand', sans-serif"],
    }, 

    colors: {
      'lightblue' : '#8ECAE6',
      'darkblue' : '#023047',
      'solidyellow' : '#FFB703',
      'solidorange' : '#FB8500',
      'white' : '#FFFFFF',
      'solidblue' : '#3570D2',
      'tealblue' : '#219EBC',
      'gray' : '#808080',
      'black' : '#000000',
      'success' : '#76FF6A',
      'danger' : '#E11F28',
      'warning' : '#FFB703',
    },

    extend: {},
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

