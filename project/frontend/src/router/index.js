import { createRouter, createWebHistory } from 'vue-router'
import { HomeView, RegisterView, CatalogView } from '@/views/index.js'

const routes = [
  { name: 'home', path: '/', component: HomeView },
  { name: 'register', path: '/register', component: RegisterView },
  { name: 'catalog', path: '/catalog', component: CatalogView },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return new Promise((resolve) => {
        setTimeout(() => {
          const element = document.querySelector(to.hash);
          if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
          }
          resolve({ el: to.hash });
        }, 300); // Убедитесь, что элемент доступен после рендеринга
      });
    }
    return { top: 0 };
  },
})

export default router