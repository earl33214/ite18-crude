import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        manifest: true,  // Enable the manifest to be generated
        outDir: 'public/build',  // Ensure this matches the directory Laravel looks for
        cssCodeSplit: true,  // Enable CSS code splitting
    },
});
