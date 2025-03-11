import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            publicDirectory: 'public',
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/scroll.js',
                'resources/js/comment.js',
                'resources/js/panel.js',
            ],
            refresh: true,
        }),
    ],
});