<script setup>
import { useAuthStore } from '@/stores/AuthStore.js';

import {storeToRefs} from "pinia";

const { isAuthenticated } = storeToRefs(useAuthStore());
const authStore = useAuthStore();
</script>

<template>
  <nav class="header__menu flex gap-8">
    <a
      class="header__link"
      href="#"
    >
      О нас
    </a>
    
    <template v-if="isAuthenticated">
      <a
        class="header__link"
        href="#"
      >
        Каталог номеров
      </a>
      <button
        class="flex p-2 bg-black rounded text-white uppercase hover:bg-blue-200 hover:text-black ease-in-out duration-300"
        @click="authStore.logout"
      >
        выйти
      </button>
    </template>
    
    <div
      v-if="!isAuthenticated"
      class="flex gap-1"
    >
      <router-link
        to="register"
        class="header__link"
        href="#"
      >
        Вход
        &frasl;
        Регистрация
      </router-link>
    </div>
  </nav>
</template>

<style scoped lang="scss">
.header__menu{
  a{
    transition: all 0.3s ease;
    &:hover{
      color: $black;
    }
  }
}
</style>