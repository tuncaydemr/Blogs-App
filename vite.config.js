import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/index.js', 'resources/js/jquery-3.7.0.min.js'],
            refresh: true,
        }),
    ],
});
