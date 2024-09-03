import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import path from 'path'

export default defineConfig({
    server: {
        host: process.env.HOST_URL,
        hmr: { host: process.env.HOST_URL, protocol: 'ws' },
    },
    plugins: [
        laravel({
            input: 'resources/js/app.ts',
            refresh: true,
        }),
        react(),
    ],
    publicDir : "public",
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js')
        }
    }
});
