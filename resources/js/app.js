require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
window.axios = require('axios');

import {routes} from './routes.js';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.all.js';

import App from './components/app.vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(VueSweetalert2)
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

const router = new VueRouter({
    routes,
    mode: 'history'
});

Vue.use(VueRouter);

new Vue({
    router,
    render: h => h(App),
}).$mount("#app")