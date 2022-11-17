/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class',
  theme: {
    colors: {
      'white': '#ffffff',
      'black': '#000000',
      'gray-very-lightest': '#E5E7EB',
      'gray-lightest': '#D1D5DB',
      'gray-light': '#9CA3AF',
      'gray': '#6B7280',
      'gray-dark': '#374151',
      'gray-darkest': '#1F2937',
      'cyan': '#155E75',
      'cyan-dark': '#164E63',
      'red-light': '#DC2626',
      'red': '#B91C1C',
      'red-dark': '#991B1B',
      'green-light': '#84CC16',
      'green': '#65A30D',
      'green-dark': '#4D7C0F',
      'orange-light': '#FB923C',
      'orange': '#F97316',
      'orange-dark': '#EA580C',
    },
    extend: {
    },
  },
  plugins: [],
}