/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./includes/**/*.php",
    "./assets/js/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'brand-primary': '#D4945E',
        'brand-dark': '#A67346',
        'brand-light': '#E8B88D',
        'brand-orange': '#EF7D32',
        'brand-accent': '#8B4513',
        'brand-cream': '#FFF9F3',
        'brand-brown': '#2C1810',
      }
    },
  },
  plugins: [],
}