// import './bootstrap';
// import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';


import { OhVueIcon, addIcons } from 'oh-vue-icons'
import { FaFlag, RiZhihuFill, MdDaterange, CoMyspace, RiDeleteBin6Line, MdModeeditOutlined, IoAddOutline } from 'oh-vue-icons/icons'
import * as FaIcons from "oh-vue-icons/icons/fa";

const Fa = Object.values({ ...FaIcons });

addIcons(FaFlag, RiZhihuFill, Fa, MdDaterange, CoMyspace, RiDeleteBin6Line , MdModeeditOutlined, IoAddOutline)


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .component('v-icon', OhVueIcon)

            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
