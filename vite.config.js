import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
            fonts: [
                bunny('Noto Sans JP', {
                    weights: [300, 400, 500, 600, 700],
                }),
                bunny('Shippori Mincho', {
                    weights: [500, 600, 800],
                }),
                bunny('Noto Serif JP', {
                    weights: [300, 400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        host: true,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
