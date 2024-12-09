<script setup>
import RoomCatalogCard from "@/components/room/RoomCatalogCard.vue";
import CatalogFilters from "@/components/catalog/CatalogFilters.vue";
import CatalogSorting from "@/components/catalog/СatalogSorting.vue";
import { onMounted, ref, computed } from "vue";
import { useCatalogStore } from "@/stores/CatalogStore.js";
import RoomCatalogSkeleton from "@/components/room/RoomCatalogSkeleton.vue";

const catalogStore = useCatalogStore();
const { getRooms } = catalogStore;


onMounted(async () => {
  await getRooms();
});
</script>

<template>
  <div class="flex justify-between">
    <div class="flex flex-col">
      <catalog-sorting/>

      <template v-if="catalogStore.rooms.length">
        <section class="rooms">
          <room-catalog-card
            v-for="room in catalogStore.rooms"
            :key="room.id"
            :room="room"
          />
        </section>
      </template>

      <template v-else>
        <section class="rooms">
          <room-catalog-skeleton
            v-for="item in 6"
            :key="item"
          />
        </section>
      </template>
    </div>
    <catalog-filters/>
  </div>
</template>

<style scoped lang="scss">
.rooms {
  @apply flex flex-col gap-y-10 py-12;
}
</style>
