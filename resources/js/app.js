import './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes/index.js';
import App from './App.vue';
import vuetify from './vuetify.js';

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    hashbang: true,
    base: '/',
    routes: routes,
})

const app = new Vue({
    el: '#app',
    router,
    vuetify,
    render: h => h(App),
});
