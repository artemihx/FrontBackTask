<script setup>
import ReservedButton from "@/components/button/ReservedButton.vue";
</script>

<template>
  <section class="greeting">
    <div class="greeting__info">
      <h2 class="greeting__title text-4xl">Теперь в отпуске можно не переживать за Барсика</h2>
      <p class="greeting__text text-xl">Мы позаботимся о ваших любимках, пока вас нет рядом!</p>
      <reserved-button/>
    </div>
  </section>
</template>

<style scoped lang="scss">
.greeting{
  @apply w-full pt-36;
  height: 90vh;
  background: url("../../assets/images/home-page/greeting-cat.png") no-repeat bottom right 100px;
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

}
</style>