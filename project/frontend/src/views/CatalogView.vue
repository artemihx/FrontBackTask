<script setup>

import RoomCatalogCard from "@/components/room/RoomCatalogCard.vue";
import CatalogFilters from "@/components/catalog/CatalogFilters.vue";
</script>

<template>
  <div class="flex justify-between">
    <section
      class="rooms"
    >
      <room-catalog-card
        v-for="room in 3"
        :key="room"
        :room="room"
      />
    </section>
    <catalog-filters/>
  </div>
</template>

<style scoped lang="scss">
.rooms{
  @apply flex flex-col gap-y-10 py-12;
}
</style>