<script setup>
import RoomCatalogCard from "@/components/room/RoomCatalogCard.vue";
import CatalogFilters from "@/components/catalog/CatalogFilters.vue";
import CatalogSorting from "@/components/catalog/СatalogSorting.vue"
import { onMounted } from "vue";
import { useCatalogStore } from "@/stores/CatalogStore.js";

const catalogStore = useCatalogStore();
const { getRooms } = useCatalogStore();


onMounted(async () => {
  await getRooms();
})
</script>

<template>
  <div class="flex justify-between">
    <div class="flex flex-col">
      <catalog-sorting/>
      <section
        class="rooms"
      >
        <room-catalog-card
          v-for="room in catalogStore.rooms"
          :key="room.id"
          :room="room"
        />
      </section>
    </div>
    <catalog-filters/>
  </div>
</template>

<style scoped lang="scss">
.rooms{
  @apply flex flex-col gap-y-10 py-12;
}
</style>