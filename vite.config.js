import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/',
    build: {
        assetsDir: 'assets',
        rollupOptions: {
            output: {
                manualChunks: undefined,
            }
        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/theme-overrides.css', 'resources/css/icon-sizes.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
