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
      <a
        class="header__link"
        href="#"
      >
        Вход
      </a>
      &frasl;
      <a
        class="header__link"
        href="#"
      >
        Регистрация
      </a>
    </div>
  </nav>
</template>

<style scoped lang="scss">
.header__menu{
  a{
    transition: all 0.3s ease;
    &:hover{
      transform: scale(1.05);
    }
  }
}
</style>