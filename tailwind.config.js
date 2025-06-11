/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{vue,js,ts}'],
  theme: {
    extend: {
      screens: {
        md960: '960px', // ➕ Benutzerdefinierter Breakpoint
      },
    },
  },
  plugins: [],
}