<script setup>

import RoomCatalogCard from "@/components/room/RoomCatalogCard.vue";
</script>

<template>
  <section
    v-for="room in 3"
    :key="room"
    class="rooms"
    :room="room"
  >
    <room-catalog-card/>
  </section>
</template>

<style scoped lang="scss">
.rooms{
  @apply flex flex-col gap-y-5 py-12;
}
</style>