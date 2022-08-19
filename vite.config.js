import { defineConfig } from 'vite'
import reactRefresh from '@vitejs/plugin-react-refresh'


const Global = "var process = { env: {NODE_ENV: 'development'}}"



//production //development
// https://vitejs.dev/config/
export default defineConfig({
    plugins: [reactRefresh()],
    root: './resources',
    base: '/assets/',
    mode: 'development',
    define: {
        'process.env': {}
    },
    build: {
        outDir: '../public/assets',
        assetsDir: '',
        manifest: true,
        minify: false,
        rollupOptions: {
            output: {
                manualChunks: undefined,
                banner: Global
            },
            input:{
                'App.tsx': './resources/js/App.tsx'
            },

        }
    }
})

