<script setup>

import RoomHomeCard from "@/components/room/RoomHomeCard.vue";
</script>

<template>
  <section
    id="rooms"
    class="rooms"
  >
    <h2 class="rooms__title">Номера и цены</h2>
    <div class="rooms__block">
      <room-home-card
        v-for="room in 4"
        :key="room"
        :room="room"
      />
    </div>
  </section>
</template>

<style scoped lang="scss">
.rooms {
  background: linear-gradient(to bottom, $orange, #f0bc87);
  padding: 40px 20px;
  text-align: center;
  &__block {
    @apply flex justify-center flex-wrap;
    gap: 20px 120px;
  }
  &__title {
    @apply text-2xl mb-5;
    color: $light-black;
  }
}
</style>