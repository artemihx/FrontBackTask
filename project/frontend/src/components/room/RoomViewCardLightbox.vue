<script setup>
defineProps({
  room:{
    type:Object,
    required:true,
  },
  currentImageIndex:{
    type: Number,
    required:true
  }
})
const emit = defineEmits(['close','prev','next'])
</script>

<template>
  <button
    class="room__lightbox-close"
    @click="emit('close')"
  >
    &times;
  </button>
  <button
    class="room__lightbox-nav room__lightbox-nav--prev"
    :disabled="currentImageIndex === 0"
    @click="emit('prev')"
  >
    &#10094;
  </button>
  <img
    :src="room.photos[currentImageIndex].photo"
    class="room__lightbox-image"
    alt="room-image"
  />
  <button
    class="room__lightbox-nav room__lightbox-nav--next"
    :disabled="currentImageIndex === room.photos.length - 1"
    @click="emit('next')"
  >
    &#10095;
  </button>
</template>

<style scoped lang="scss">

</style>