<script setup>

</script>

<template>
  <article class="room">
    <img
      src="@/assets/images/no-image.png"
      alt="image"
    >
    <div class="room__info">
      <h2 class="room__title">
        <span>Номер:</span>
        Люкс
      </h2>
      <p class="room__size">Площадь: 240 кв.м.</p>
      <p class="room__list-title">Оснащение номера:</p>
      <ul class="room__list">
        <li class="room__list-item">Отопление</li>
        <li class="room__list-item">3 кровати</li>
        <li class="room__list-item">Когтеточка</li>
        <li class="room__list-item">Игры с питомцем</li>
      </ul>
      <p class="room__price">
        <span>Стоимость за сутки:</span>
        150 руб.
      </p>
    </div>
  </article>
</template>

<style scoped lang="scss">
.room{
  letter-spacing: 0.05em;
  max-width: 960px;
  @apply flex gap-16 py-10 px-12;
  box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
  img{
    width: 350px;
  }
  &__info{
    @apply flex flex-col;
  }
  &__title{
    font-size: 32px;
    margin-bottom: 20px;
    span{
      font-weight: 600;
    }
  }
  &__size{
    font-weight: 600;
    font-size: 24px;
    margin-bottom: 20px;
  }
  &__list-title {
    font-weight: 600;
    font-size: 24px;
  }
  &__list{
    @apply text-lg list-none p-0 mb-7;
    & li {
      @apply  relative pl-5;
      color: $light-black;

      &::before {
        content: "•";
        color: $orange;
        @apply text-lg absolute left-0 top-0;
      }
    }
  }
  &__price{
    font-size: 24px;
    span{
      font-weight: 600;
      color: $bright-green;
    }
  }
}
</style>