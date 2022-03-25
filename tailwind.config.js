module.exports = {
     content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
  theme: {
    extend: {
         colors: {
              'primary': '#2E3142',
              'secondary': 'f85762'
         },
         backgroundImage: {
              'hero-bg': "url('/images/header-bg.jpg')"
         }
    },
  },
  plugins: [],
}
