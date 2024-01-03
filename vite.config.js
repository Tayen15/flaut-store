import { defineConfig } from 'vite';
import VitePluginLaravel from 'laravel-vite-plugin';

export default {
  plugins: [
    VitePluginLaravel({
      /* Konfigurasi tambahan jika diperlukan */
    }),
  ],
};
