<script setup>

</script>

<template>
  <section class="greeting">
    <div class="greeting__info">
      <h2 class="greeting__title text-4xl">Теперь в отпуске можно не переживать за Барсика</h2>
      <p class="greeting__text text-xl">Мы позаботимся а ваших любимках, пока вас нет рядом!</p>
      <a class="greeting__link">Забронировать</a>
    </div>
  </section>
</template>

<style scoped lang="scss">
.greeting{
  @apply w-full pt-36;
  height: 90vh;
  background: url("src/assets/images/home-page/greeting-cat.png") no-repeat bottom right 100px;
  background-size:500px ;
  &__info{
    @apply flex flex-col;
  }
  &__title{
    font-weight: 800;
    max-width: 600px;
    margin-bottom: 30px;
    color: $light-black;
  }
  &__text{
    color: $light-gray;
    max-width: 350px;
    margin-bottom: 40px;
  }
  &__link{
    @apply flex items-center p-2.5 justify-center max-w-48 tracking-wide rounded-lg;
    background: $green;
    color: $white;
    font-weight: 600;
    transition: all 0.3s ease-in-out;
    &:hover{
      background: $green-hover;
    }
  }
}
</style>