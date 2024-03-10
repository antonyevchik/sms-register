import VueRouter from 'vue-router'
import Register from './RegisterForm.vue'
import Home from './Home.vue'
import store from '../store/index.js'

const routes = [
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
    name: 'home',
    meta: {
      requiresAuth: true
    }
  }
]

const router = new VueRouter({
  mode: 'history',
  hashbang: false,
  base: '/',
  routes: routes
})

router.beforeEach((to, from, next) => {
  const requiresAuth = to.matched.some((record) => record.meta.requiresAuth)

  if (!store.getters['auth/authUser']) {
    store.dispatch('auth/getAuthUser').then(() => {
      if (requiresAuth && !store.getters['auth/authUser']) next({ name: 'register' })
      else if (to.name === 'register' && store.getters['auth/authUser']) next({ name: 'home' })
      else next()
    })
  } else next()
})

export default router
