/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./vendor/power-components/livewire-powergrid/**/*.php", // Add PowerGrid
  ],
  theme: {
    extend: {
      colors: { // Ensure default colors are extended (optional)
        blue: { 500: "#3b82f6", 600: "#2563eb" },
        green: { 500: "#22c55e", 600: "#16a34a" },
      },
    },
  },
  plugins: [],
  safelist: [ // Critical for dynamic PowerGrid classes
    { pattern: /bg-(blue|green|red)-(500|600)/ },       // Base colors
    { pattern: /hover:bg-(blue|green|red)-(600|700)/ }, // Hover states
  ],
}
