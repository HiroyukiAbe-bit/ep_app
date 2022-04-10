import Vue from 'vue'
import VueRouter from 'vue-router'
// import topPage from '../components/content'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'topPage',
    component: () => import('../views/TopPage')
  },
  {
    path: '/form',
    name: 'InputForm',
    component: () => import('../views/InputForm.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
