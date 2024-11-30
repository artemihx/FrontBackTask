<script setup>

</script>

<template>
  <nav class="header__menu flex gap-8">
    <a
      class="header__link"
      href="#"
    >
      О нас
    </a>

    <a
      class="header__link"
      href="#"
    >
      Каталог номеров
    </a>

    <div class="flex gap-1">
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