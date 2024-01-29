import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

import Component from 'unplugin-vue-components/vite'
import RadixVueResolver from 'radix-vue/resolver'

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
        Component({
            dts: true,
            resolvers: [
                RadixVueResolver()
        
                // RadixVueResolver({
                //   prefix: '' // use the prefix option to add Prefix to the imported components
                // })
            ],
        }),
    ],
});
