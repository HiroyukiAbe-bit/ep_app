import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'TopPage',
    component: () => import('../views/TopPage')
  },
  {
    path: '/index',
    name: 'TopPage',
    component: () => import('../views/TopPage')
  },
  {
    path: '/form',
    name: 'InputForm',
    component: () => import('../views/InputForm.vue')
  },
  {
    path: '/admin',
    name: 'AdminPage',
    component: () => import('../views/AdminPage.vue')
  },
  {
    path: '/admin/index',
    name: 'AdminIndex',
    component: () => import('../views/AdminIndex.vue')
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
