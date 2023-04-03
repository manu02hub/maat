import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
<<<<<<< HEAD
    optimizeDeps: {
        exclude: ['oh-vue-icons/icons'],
      },
=======
>>>>>>> 6d99990ebfdb12bc38a99cc93a13f68ed23d634b
});
