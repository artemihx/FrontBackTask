import { createRouter, createWebHistory } from 'vue-router'
import HomeView  from "@/views/HomeView.vue";
import RegisterView from "@/views/RegisterView.vue";
import CatalogView from "@/views/CatalogView.vue";

const routes = [
  { name: 'home', path: '/', component: HomeView },
  { name: 'register', path: '/register', component: RegisterView },
  { name: 'catalog', path: '/catalog', component: CatalogView },
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router