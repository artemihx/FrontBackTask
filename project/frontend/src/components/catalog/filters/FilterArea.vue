<script setup>

import FilterAreaItem from "@/components/catalog/filters/FilterAreaItem.vue";
</script>

<template>
  <div class="filter__group">
    <h3 class="filter__subtitle">Площадь</h3>
    <div class="filter__checkbox-group">
      <filter-area-item
        v-for="item in 4"
        :key="item"
        :item="item"
        class="filter__checkbox-label"
      />
    </div>
  </div>
</template>

<style scoped lang="scss">
.filter {
  &__group {
    @apply mb-4;
  }

  &__subtitle {
    @apply text-sm font-medium mb-2;
  }

  &__checkbox-group {
    @apply space-y-2;
  }

  &__checkbox-label {
    @apply flex items-center space-x-2;
  }
}
</style>