import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // server: {
    //     host: '192.168.1.11', // IP onde o Vite será servido
    //     port: 5173,           // Porta do Vite
    //     watch: {
    //         usePolling: true, // Garante que alterações sejam detectadas
    //     },
    // },
});
