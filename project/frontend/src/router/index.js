import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  { name: 'home', path: '/', component: () => import('@/views/HomeView.vue')},
  { name: 'register', path: '/register', component: () => import('@/views/RegisterView.vue')},
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router