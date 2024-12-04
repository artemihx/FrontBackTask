<script setup>
import {storeToRefs} from "pinia";
import {useAuthStore} from "@/stores/AuthStore.js";

const { isAuthenticated } = storeToRefs(useAuthStore());
</script>

<template>
  <router-link
    v-if="isAuthenticated"
    to="/catalog"
    class="greeting__link"
  >
    Забронировать
  </router-link>
  <router-link
    v-else
    to="/register"
    class="greeting__link"
  >
    Забронировать
  </router-link>
</template>

<style scoped lang="scss">
.greeting__link{
  @apply flex items-center text-white p-2.5 justify-center max-w-48 tracking-wide rounded-lg;
  background: $green;
  color: $white !important;
  font-weight: 600;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  &:hover{
    background: $green-hover;
  }
}
</style>