require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('category-component', require('./components/CategoryComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

import VueRouter from 'vue-router';
import routes from './routes.js';
Vue.use(VueRouter);
const router = new VueRouter(routes);

const app = new Vue({
    el: '#app',
    router,
});
