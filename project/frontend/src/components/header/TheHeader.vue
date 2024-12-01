<script setup>
import TheHeaderLogo from '@/components/header/TheHeaderLogo.vue'
import TheHeaderNav from '@/components/header/TheHeaderNav.vue'

import { useHeaderStore } from "@/stores/HeaderStore.js";
import {onMounted} from "vue";
const headerStore = useHeaderStore();
const { getHeader } = useHeaderStore();

onMounted(async () => {
  await getHeader();
})

</script>

<template>
  <header
    v-if="headerStore.city"
    class="header"
  >
    <div class="flex justify-between">
      <router-link to="/"><the-header-logo/></router-link>
      <div class="flex gap-20">
        <the-header-nav/>
        <span
          class="header__city"
        >
          <b>Город</b> - {{ headerStore.city }}
        </span>
      </div>
    </div>
    <span class="header__slogan">{{ headerStore.slogan }}</span>
  </header>
</template>

<style scoped lang="scss">
.header{
  @apply flex flex-col w-full p-4;
  color: $light-black;

  &__slogan{
    color: $light-gray;
    font-size: 14px;
  }
}
</style>