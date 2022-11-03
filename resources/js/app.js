require('./bootstrap');
require('alpinejs');
import { InertiaProgress } from '@inertiajs/progress'

InertiaProgress.init()

import { createApp, h } from 'vue'
import { App, plugin } from '@inertiajs/inertia-vue3'

import { ZiggyVue } from 'ziggy';
import { Ziggy } from './ziggy';


const el = document.getElementById('app');

createApp({
    render: () => h(App, {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: name => require(`./Pages/${name}`).default,
    })
}).use(plugin).use(ZiggyVue, Ziggy).mount(el);
