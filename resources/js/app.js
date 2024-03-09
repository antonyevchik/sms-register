import './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes/index.js';
import App from './App.vue';
import vuetify from './vuetify.js';
import store from './store/index.js';

Vue.use(VueRouter)

const app = new Vue({
    el: '#app',
    router,
    store,
    vuetify,
    render: h => h(App),
});

