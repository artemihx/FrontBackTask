<script setup>

</script>

<template>
  <div
    v-for="item in 4"
    :key="item"
    class="about__info-block"
  >
    <h4 class="font-semibold">Адрес</h4>
    <p>г.Томск, ул.Герцена,18</p>
  </div>
  <p>Присоединяйтесь к нам</p>
  <div class="about__messengers">
    <a
      href="https://t.me/mamamakysa"
      target="_blank"
      class="about__telegram"
    >
      <img
        alt="telegram"
        src="../../assets/images/home-page/telegram.svg"
      >
    </a>
    <a
      href="https://vk.com/lilmyrra"
      target="_blank"
    >
      <img
        alt="vk"
        src="../../assets/images/home-page/vk.svg"
      >
    </a>
    <a
      href=""
      target="_blank"
    >
      <img
        alt="whatsapp"
        src="../../assets/images/home-page/whatsapp.svg"
      >
    </a>
  </div>
</template>
<style scoped lang="scss">
.about{
  &__messengers{
    @apply flex gap-1 items-center;
    & img{
      width: 32px;
    }
  }

}
</style>

