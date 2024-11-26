<script setup>

import TheHeaderLogo from '@/components/header/TheHeaderLogo.vue'
import TheHeaderNav from '@/components/header/TheHeaderNav.vue'
</script>

<template>
  <header class="header">
    <div class="flex justify-between">
      <router-link to="/"><the-header-logo/></router-link>
      <the-header-nav/>
      <span class="header__city">
        <b>Город</b> - Томск
      </span>
    </div>
    <span class="header__slogan">Уют для вашего кота – забота в каждом мурлыканье!</span>
  </header>
</template>

<style scoped lang="scss">
.header{
  @apply flex flex-col w-full p-4;
  color: $light-black;

  &__slogan{
    color: $light-gray;
    font-size: 14px;
  }
}
</style>