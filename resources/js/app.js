import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import UserLayout from './Layouts/UserLayout.vue'

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue')
        let page = await pages[`./Pages/${name}.vue`]()
        page.default.layout ??= UserLayout;
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el)
    },
    title: (title) => `${title} - ${import.meta.env.VITE_APP_NAME}`,
})