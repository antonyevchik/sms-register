import Register from "./Register.vue";

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
    }
];
