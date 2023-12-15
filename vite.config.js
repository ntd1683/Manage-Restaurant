import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.ts',
                "resources/js/user.ts",
                "resources/js/admin.ts",
                "resources/js/guest.ts",
                "resources/js/setting.js",
                "resources/js/profile.ts",
                "resources/js/staff.ts",
                "resources/js/preLoader.ts",
                "resources/js/datepicker.ts",
                "resources/js/theme.ts",
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
        },
    },
});
