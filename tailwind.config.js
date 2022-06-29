module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                mainblue: "#04529C",
                mainyellow: "#F7B523",
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
