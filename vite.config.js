import { defineConfig } from 'vite';
import jigsaw from '@tighten/jigsaw-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        jigsaw({
            input: ['source/_assets/js/app.js', 'source/_assets/css/app.css'],
            refresh: true,
        }),
        tailwindcss()
    ],
});
