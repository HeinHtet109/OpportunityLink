import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from "path";

export default defineConfig({
    base: './public/',
    plugins: [
        laravel({
            input: [
                "resources/css/opp_app...slate.scss",
                "resources/css/opp_app...slate.css",
                "resources/js/opp_app...slate.js",
                "resources/js/sidebar.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "~fontawesome": path.resolve(
                __dirname,
                "node_modules/@fortawesome/fontawesome-free"
            ),
            "@": "/resources",
        },
    },
});
