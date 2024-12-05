<script setup>

import FilterChecboxSquare from "@/components/catalog/FilterChecboxSquare.vue";
import FilterCheckboxEquipment from "@/components/catalog/FilterCheckboxEquipment.vue";
import FilterPriceInput from "@/components/catalog/FilterPriceInput.vue";
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

    <div class="filter__group">
      <h3 class="filter__subtitle">Площадь</h3>
      <div class="filter__checkbox-group">
        <filter-checbox-square
          v-for="item in 4"
          :key="item"
          :item="item"
          class="filter__checkbox-label"
        />
      </div>
    </div>
    <div class="filter__group">
      <h3 class="filter__subtitle">Оснащение</h3>
      <div class="filter__checkbox-group">
        <filter-checkbox-equipment
          v-for="item in 4"
          :key="item"
          :item="item"
          class="filter__checkbox-label"
        />
      </div>
    </div>

    <div class="filter__buttons">
      <button class="filter__button filter__button--apply">Применить</button>
      <button class="filter__button filter__button--reset">Сбросить фильтр</button>
    </div>
  </div>
</template>
<style scoped lang="scss">
.filter {
  @apply w-full max-w-xs bg-white shadow-md rounded-lg p-6 h-fit;
  position: sticky;
  top: 30px;

  &__title {
    @apply text-lg font-bold mb-4;
  }

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



  &__buttons {
    @apply flex space-x-2;
  }

  &__button {
    @apply w-full py-2 rounded-md text-sm focus:outline-none;

    &--apply {
      @apply bg-green-500 text-white hover:bg-green-600 focus:ring focus:ring-green-300;
    }

    &--reset {
      @apply bg-gray-200 text-gray-700 hover:bg-gray-300 focus:ring focus:ring-gray-300;
    }
  }
}

</style>