import './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from "./routes/index.js";
import App from "./App.vue";

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    hashbang: false,
    base: '/',
    routes: routes,
})

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
