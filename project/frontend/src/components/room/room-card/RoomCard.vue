<script setup>
import { ref } from "vue";

import RoomCardInfo from "@/components/room/room-card/RoomCardInfo.vue";
import RoomCardGallery from "@/components/room/room-card/RoomCardGallery.vue";
import RoomCardLightbox from "@/components/room/room-card/RoomCardLightbox.vue";

const props = defineProps({
  room: {
    type: Object,
    required: true
  }
});

const emit = defineEmits(['start-book']);

const showLightbox = ref(false);
const currentImageIndex = ref(0);

const openLightbox = (index) => {
  currentImageIndex.value = index;
  showLightbox.value = true;
};

const closeLightbox = () => {
  showLightbox.value = false;
};

const prevImage = () => {
  if (currentImageIndex.value > 0) {
    currentImageIndex.value--;
  }
};

const nextImage = () => {
  if (currentImageIndex.value < props.room.photos.length - 1) {
    currentImageIndex.value++;
  }
};
</script>

<template>
  <div class="room__container">
    <room-card-gallery
      :room="props.room"
      @open="openLightbox"
    />

    <room-card-info
      :room="room"
      @start="emit('start-book', room.id)"
    />

    <room-card-lightbox
      v-if="showLightbox"
      :room="room"
      :current-image-index="currentImageIndex"
      @click.self="closeLightbox"
      @close="closeLightbox"
      @next="nextImage"
      @prev="prevImage"
    />
  </div>
</template>

<style scoped lang="scss">
.room__container {
  @apply flex gap-5 m-5;
}
</style>
