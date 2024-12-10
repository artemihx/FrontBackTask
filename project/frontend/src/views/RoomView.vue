<script setup>
import { ref, onMounted } from 'vue';
import { useCatalogStore } from '@/stores/CatalogStore.js';
import { useRoute } from 'vue-router';
import RoomViewSkeleton from "@/components/room/RoomViewSkeleton.vue";
import RoomViewCard from "@/components/room/RoomViewCard.vue";
import RoomBookingModal from "@/components/room/RoomBookingModal.vue";

const { getRooms } = useCatalogStore();
const room = ref(null);
const route = useRoute();

// Состояния для управления модальным окном
const book = ref(false);
const selectedRoomId = ref(null);

onMounted(async () => {
  room.value = await getRooms(route.params.id).catch((error) => {
    console.log('Ошибка загрузки комнаты:', error);
  });
  console.log('Комната:', room.value);
});

const startBook = (roomId) => {
  selectedRoomId.value = roomId;
  book.value = true;
};

const cancelBook = () => {
  book.value = false;
  selectedRoomId.value = null;
};
</script>

<template>
  <div>
    <room-view-card
      v-if="room"
      :room="room"
      @start-book="startBook(room.id)"
    />
    <room-view-skeleton v-else />

    <room-booking-modal
      v-if="book"
      :room-id="selectedRoomId"
      @cancel="cancelBook"
      @success="cancelBook"
    />
  </div>
</template>

<style scoped lang="scss">
</style>
