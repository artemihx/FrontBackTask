<script setup>
import ProfileSkeletonCard from "@/components/profile/ProfileSkeletonCard.vue";
import ProfileCard from "@/components/profile/ProfileCard.vue";

import { onMounted } from 'vue';
import { useAuthStore } from "@/stores/AuthStore.js";
import {storeToRefs} from "pinia";

const { user } = storeToRefs(useAuthStore())
const { userData } = useAuthStore();


onMounted(async ()=>{
  await userData();
})
</script>
<template>
  <template v-if="user">
    <profile-card
      :user="user"
    />
  </template>

  <template v-else>
    <profile-skeleton-card/>
  </template>
</template>
