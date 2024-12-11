<script setup>
import { ref } from "vue";
import RoomViewCardGallery from "@/components/room/RoomViewCardGallery.vue";
import RoomViewCardInfo from "@/components/room/RoomViewCardInfo.vue";
import RoomViewCardLightbox from "@/components/room/RoomViewCardLightbox.vue";

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
    <room-view-card-gallery
      :room="props.room"
      @open="openLightbox(0)"
    />

    <room-view-card-info
      :room="room"
      @start="emit('start-book', room.id)"
    />

    <room-view-card-lightbox
      v-if="showLightbox"
      class="room__lightbox"
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

.room__lightbox {
  @apply fixed top-0 left-0 w-full h-full bg-black bg-opacity-90 flex justify-center items-center z-50;

  &-close {
    @apply absolute top-5 right-7 text-white text-4xl cursor-pointer;
  }

  &-nav {
    @apply absolute top-1/2 text-white text-4xl bg-black bg-opacity-50 px-4 py-2 rounded-full disabled:opacity-50 disabled:cursor-not-allowed;

    &--prev {
      @apply left-5;
    }

    &--next {
      @apply right-5;
    }
  }

  &-image {
    @apply max-w-[90%] max-h-[80%] rounded-lg shadow-lg;
  }
}
</style>
