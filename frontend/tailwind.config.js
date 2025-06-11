/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{vue,js,ts}'],
  theme: {
    extend: {
      colors: {
        navyblue: '#081534', 
      },
      screens: {
        md960: '960px', // dein Breakpoint ab Desktop
      },
    },
  },
  plugins: [],
}