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
                bunny('Zen Kaku Gothic New', {
                    weights: [400, 500, 700, 900],
                }),
                bunny('Zen Old Mincho', {
                    weights: [400, 600, 700, 900],
                }),
                bunny('Syne', {
                    weights: [600, 700, 800],
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
