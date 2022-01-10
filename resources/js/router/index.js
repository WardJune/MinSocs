import {createWebHistory, createRouter} from 'vue-router'
import Login from '../pages/Login'
import Register from '../pages/Register'
import Home from '../pages/Home'
import store from '../store'

export const routes = [
  {
    name: 'login',
    path: '/login',
    component: Login,
    meta:{
      middleware: 'guest',
      title: `Login`
    }
  },
  {
    name: 'register',
    path: '/register',
    component: Register,
    meta:{
      middleware: 'guest',
      title: `Register`
    }
  },
  {
    name: 'home',
    path: '/',
    component: Home,
    meta:{
      middleware: 'auth',
      title: `Home`
    }
  }

]

const router = createRouter({
  history: createWebHistory(),
  routes: routes
})

router.beforeEach((to,from,next)=> {
  document.title = `${to.meta.title} - MiniSocs`
  if (to.meta.middleware == "guest") {
    if (store.state.auth.authenticated) {
      next({name: 'home'})
    }
    next()
  } else {
    if (store.state.auth.authenticated) {
      next()
    } else {
      next({name:'login'})
    }
  }

})

export default router