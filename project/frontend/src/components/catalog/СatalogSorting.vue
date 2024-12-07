<script setup>
import { ref, defineEmits } from 'vue';

const selectedOption = ref('asc');
const emit = defineEmits(['sort']);

const emitSort = () => {
  emit('sort', selectedOption.value);
};
</script>
<template>
  <div class="sort">
    <label
      for="sortSelect"
      class="sort__label"
    >
      Сортировать по цене:
    </label>
    <select
      id="sortSelect"
      v-model="selectedOption"
      class="sort__select"
      @change="emitSort"
    >
      <option value="asc">По возрастанию</option>
      <option value="desc">По убыванию</option>
    </select>
  </div>
</template>

<style lang="scss">
.sort {
  @apply flex flex-col space-y-2;

  &__label {
    @apply text-sm font-medium text-gray-700;
  }

  &__select {
    @apply w-48 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500;
  }
}
</style>
