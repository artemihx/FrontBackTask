<script setup>
import ProfileSkeletonCard from "@/components/profile/ProfileSkeletonCard.vue";
import ProfileCard from "@/components/profile/ProfileCard.vue";

import { onMounted } from 'vue';
import { useAuthStore } from "@/stores/AuthStore.js";
import {storeToRefs} from "pinia";

const { user, isLoading } = storeToRefs(useAuthStore())
const { userData } = useAuthStore();

onMounted(async ()=>{
  await userData();
})
</script>
<template>
  <div>
    <template v-if="user">
      <profile-card
        :user="user"
        :is-loading="isLoading"
      />
    </template>

    <template v-if="isLoading">
      <profile-skeleton-card/>
    </template>
  </div>
</template>
