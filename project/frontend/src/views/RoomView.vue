<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';
import BookingModal from "@/components/BookingModal.vue";
import RoomCard from "@/components/room/room-card/RoomCard.vue";
import RoomCardSkeleton from "@/components/room/room-card/RoomCardSkeleton.vue";
import {useRoomsStore} from "@/stores/RoomsStore.js";
import {storeToRefs} from "pinia";

const { getRooms, getRandomRooms } = useRoomsStore();
const { randomRooms } = storeToRefs(useRoomsStore())

const room = ref(null);
const route = useRoute();

const book = ref(false);
const selectedRoomId = ref(null);

const startBook = (roomId) => {
  selectedRoomId.value = roomId;
  book.value = true;
};

const cancelBook = () => {
  book.value = false;
  selectedRoomId.value = null;
};


onMounted(async () => {
  await getRandomRooms();

  room.value = await getRooms(route.params.id).catch((error) => {
    console.log('Ошибка загрузки комнаты:', error);
  });
  console.log('Комната:', room.value);
});
</script>

<template>
  <div>
    <room-card
      v-if="room"
      :room="room"
      :random-rooms="randomRooms"
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

