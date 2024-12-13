<script setup>
import ProfileSkeletonCard from "@/components/profile/ProfileSkeletonCard.vue";
import ProfileCard from "@/components/profile/ProfileCard.vue";

import { onMounted } from 'vue';
import { useAuthStore } from "@/stores/AuthStore.js";
import {storeToRefs} from "pinia";
import {useRoomsStore} from "@/stores/RoomsStore.js";
import ReservationCard from "@/components/reservations/ReservationCard.vue";
import ReservationCardSkeleton from "@/components/reservations/ReservationCardSkeleton.vue";

const { user, isLoading } = storeToRefs(useAuthStore())
const { userData } = useAuthStore();

const { reservations } = storeToRefs(useRoomsStore());
const { getReservations } = useRoomsStore();

onMounted(async ()=>{
  await userData();
  await getReservations();
})
</script>
<template>
  <div>
    <template v-if="user && reservations">
      <profile-card
        :user="user"
        :is-loading="isLoading"
      />
      <section
        v-if="!isLoading"
        class="booking"
      >
        <h2 class="booking__title">Ваши забронированные комнаты:</h2>
        <div class="booking__list">
          <reservation-card
            v-for="reservation in reservations"
            :key="reservation.id"
            :reservation="reservation"
          />
        </div>
        <div
          v-if="reservations.length < 1"
          class="flex flex-col gap-5 mx-auto items-center"
        >
          <h3 class="text-lg font-medium tracking-wide">У вас пока нету забронированных комнат</h3>
          <router-link
            to="catalog"
            class="bg-gray-300 p-2 rounded hover:bg-gray-400 transition"
          >
            Перейти в каталог
          </router-link>
        </div>
      </section>
    </template>


    <template v-if="isLoading">
      <profile-skeleton-card/>
      
      <div class="booking__list mb-10">
        <reservation-card-skeleton
          v-for="reservation in [1,2,3]"
          :key="reservation"
        />
      </div>
    </template>
  </div>
</template>
<style scoped lang="scss">
.booking {
  @apply flex flex-col gap-5 mb-10;

  &__title {
    @apply font-semibold text-lg tracking-wide;
  }

  &__list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    @apply gap-x-10 gap-y-14;
  }
}
</style>
