import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  { name: 'home', path: '/', component: () => import('@/views/HomeView.vue')},
  { name: 'register', path: '/register', component: () => import('@/views/RegisterView.vue')},
  { name: 'catalog', path: '/catalog', component: () => import('@/views/CatalogView.vue')},
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router