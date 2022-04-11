module.exports = {
     content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
  theme: {
    extend: {
         colors: {
              'primary': '#15008B',
              'secondary': '#151515',
              'tertiary': 'rgba(21, 0, 139, 0.3)'
         },
         backgroundImage: {
              'hero-bg': "url('/images/header-bg.jpg')"
         }
    },
  },
  plugins: [],
}
