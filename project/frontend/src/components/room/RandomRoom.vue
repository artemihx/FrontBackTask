<script setup>
defineProps({
  randomRoom:{
    type: Object,
    required: true
  }
})
</script>

<template>
  <div
    v-if="randomRoom"
    class="room"
  >
    <img
      v-if="randomRoom.photos && randomRoom.photos.length > 0"
      :src="randomRoom.photos[0].photo"
      alt="image-room"
    >
    <img
      v-else
      class="room__img"
      src="@/assets/images/no-image.png"
      alt="no-image"
    >
    <div class="room__info">
      <span>{{ randomRoom.name }}</span> - {{ randomRoom.price }} руб.
    </div>
  </div>
</template>

<style scoped lang="scss">
.room{
  @apply flex flex-col items-center shadow-md p-5;

  &__img{
    height: 300px;
  }
  &__info{
    @apply text-lg;
    span{
      @apply font-semibold;
    }
  }
}
</style>