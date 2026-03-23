/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
        primary: '#1E3A8A',   // blue-800
        secondary: '#3B82F6', // blue-500
        accent: '#60A5FA',    // blue-400
        background: '#F9FAFB',// gray-50
        surface: '#FFFFFF',   // white
        text: '#111827',      // gray-900
        muted: '#6B7280',     // gray-500
        border: '#E5E7EB',    // gray-200
      },
      fontFamily: {
        'sans': ['Poppins', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [],
}