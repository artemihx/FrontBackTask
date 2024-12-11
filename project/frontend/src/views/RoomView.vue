<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import BookingModal from "@/components/BookingModal.vue";
import RoomCard from "@/components/room/room-card/RoomCard.vue";
import RoomCardSkeleton from "@/components/room/room-card/RoomCardSkeleton.vue";
import {useRoomsStore} from "@/stores/RoomsStore.js";

const { getRooms } = useRoomsStore();
const room = ref(null);
const route = useRoute();

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
    <room-card
      v-if="room"
      :room="room"
      @start-book="startBook(room.id)"
    />
    <room-card-skeleton v-else />

    <booking-modal
      v-if="book"
      :room-id="selectedRoomId"
      @cancel="cancelBook"
      @success="cancelBook"
    />
  </div>
</template>

