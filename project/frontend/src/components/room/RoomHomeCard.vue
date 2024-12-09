<script setup>
import ReservedButton from "@/components/button/ReservedButton.vue";
</script>

<template>
  <div class="room">
    <h3 class="room-title">Комфорт</h3>
    <img
      src="@/assets/images/room-card-img.jpeg"
      alt="room"
    >
    <ul class="room-features">
      <li>Площадь 3,5 кв.м</li>
      <li>Ежедневная уборка и дезинфекция</li>
      <li>Уход и кормление по Вашему расписанию</li>
      <li>Ежедневный фотоотчет</li>
      <li>Присмотр котоняни 24/7</li>
      <li>Видеонаблюдение 24/7</li>
    </ul>
    <reserved-button/>
    <p class="room-price">15 руб. / сутки</p>
  </div>
</template>

<style scoped lang="scss">
.room {
  background-color: $white;
  @apply rounded-2xl text-left flex flex-col;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  padding: 30px 60px 40px;

  &-price {
    @apply mt-4 text-base text-center font-bold;
    color: $light-black;
  }
  
  & img{
    @apply mb-5 rounded;
    width:300px;
  }
  & a{
    @apply self-center;
    padding-inline: 120px ;
  }
  &-title {
    @apply text-xl mb-4;
    font-weight: 600;
    color: $light-black;
  }
  &-features {
    @apply text-sm list-none p-0 mb-11;

    & li {
      @apply mb-2.5 relative pl-5;
      color: $light-black;

      &::before {
        content: "•";
        color: $orange;
        @apply text-lg absolute left-0 top-0;
      }
    }
  }
}
</style>