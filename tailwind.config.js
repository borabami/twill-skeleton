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
        }
    },
    container: {
      center: 'center',
      // padding: {
      //   DEFAULT: '1.5rem',
      //   sm: '2rem',
      //   lg: '4rem',
      //   xl: '5rem',
      //   '2xl': '6rem',
      // },
    },
  },
  plugins: [
      require('@tailwindcss/typography'),
  ],
}
