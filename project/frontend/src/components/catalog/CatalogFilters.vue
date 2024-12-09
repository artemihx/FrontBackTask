<script setup>
import { FilterPriceInput, FilterArea, FilterEquipment, FilterButtons } from '@/components/catalog/index.js'
</script>

<template>
  <div class="filter">
    <h2 class="filter__title">Фильтры</h2>
    <div class="filter__group">
      <filter-price-input
        :price="500"
        :min="500"
      >
        Минимальная цена
      </filter-price-input>

      <filter-price-input
        :price="5000"
        :max="5000"
      >
        Максимальная цена
      </filter-price-input>
    </div>
    <filter-area/>
    <filter-equipment/>
    <filter-buttons/>
  </div>
</template>
<style scoped lang="scss">
.filter {
  @apply w-full max-w-xs bg-white shadow-md rounded-lg p-6 h-fit;
  position: sticky;
  top: 80px;

  &__title {
    @apply text-lg font-bold mb-4;
  }

  &__group {
    @apply mb-4;
  }
}

</style>