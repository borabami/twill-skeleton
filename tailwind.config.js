/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        borderColor: {
            primary: '#999',
            secondary: '#ccc',
        },
    },
    container: {
      center: 'center',
    },
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
}
