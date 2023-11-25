import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import { nodePolyfills } from 'vite-plugin-node-polyfills';

const env = loadEnv(
    'mock', 
    process.cwd(),
    '' 
);

export default defineConfig({
    base: "/build",
	server: {
		https: env.VITE_HTTPS_STATUS == "false" ? false : true,
        host : env.APP_LINKS,
		hmr:  env.APP_LINKS ,
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
				'resources/js/header.js',
                'resources/js/login.js',
                'resources/js/register.js',
                'resources/js/transaction.js',
            ],
            buildDirectory: "build",
            refresh: [
                'resources/css/**',
                'resources/views/**'
                ],
        }),
        nodePolyfills({
            // To add only specific polyfills, add them here. If no option is passed, adds all polyfills
            include: ['path'],
            // To exclude specific polyfills, add them to this list. Note: if include is provided, this has no effect
            // exclude: [
            //   'fs', // Excludes the polyfill for `fs` and `node:fs`.
            // ],
            // Whether to polyfill specific globals.
            globals: {
                Buffer: true, // can also be 'build', 'dev', or false
                global: true,
                process: true,
            },
            // Whether to polyfill `node:` protocol imports.
            protocolImports: true,
        }),
    ],
    resolve: {
        alias: [
            {
                find: /^~.+/,
                replacement: (val) => 
                    {
                        return val.replace(/^~/, "node_modules//");
                    },
            },
        ],
    },
});
