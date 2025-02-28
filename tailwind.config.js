/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        primary: '#fff',
        secondary: '#222',
        accent: '#20C7D9',
        alert: '#b10001'
      }
    },
  },
  plugins: [],
}

