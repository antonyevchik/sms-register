import Register from "./RegisterForm.vue";
import Home from "./Home.vue";

export default [
    {
        path: '',
        redirect: {
            name: 'register'
        }
    },
    {
        path: '/register',
        component: Register,
        name: 'register'
    },
    {
        path: '/home',
        component: Home,
        name: 'home'
    }
];
