<template>
  <footer class="footer">
    <nav class="footer__list">
      <a
        href="#about"
        class="footer__list-item"
      >
        О нас
      </a>
      <a
        href="#rooms"
        class="footer__list-item"
      >
        Номера и цены
      </a>
      <a
        href="#"
        class="footer__list-item"
      >
        Забронировать
      </a>
      <a
        href="#"
        class="flex flex-col items-center"
      >
        <img
          src="@/assets/images/home-page/footer-logo.svg"
          alt="Kuksik Logo"
          class="h-32"
        >
      </a>
      <a
        href="#gallery"
        class="footer__list-item"
      >
        Фотогалерея
      </a>
      <a
        href="#reviews"
        class="footer__list-item"
      >
        Отзывы
      </a>
      <a
        href="#contact-form"
        class="footer__list-item"
      >
        Контакты
      </a>
    </nav>
    <p class="text-sm text-gray-500 mt-4 ml-10">Правовая информация</p>
  </footer>
</template>

<style scoped lang="scss">
.footer {
  @apply flex flex-col w-full items-center border-t border-gray-300 py-4;
  &__list {
    @apply flex justify-between w-full items-center text-gray-700;
    &-item {
      @apply hover:text-gray-900;
    }
  }
}

</style>