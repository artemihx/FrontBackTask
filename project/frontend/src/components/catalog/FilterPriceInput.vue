<script setup>
import { ref } from 'vue';

const props = defineProps({
  price: {
    type: Number,
    required: true,
  },
  min: {
    type: Number,
  },
  max: {
    type: Number,
  },
});

const userInput = ref(props.price);
const min = ref(props.min);
const max = ref(props.max);

const handleInputChange = () => {
  if (userInput.value > props.max) {
    userInput.value = props.max;
  } else if (userInput.value < props.min) {
    userInput.value = props.min;
  }
};
</script>

<template>
  <label
    class="filter__label"
    for="price"
  >
    <slot />
  </label>
  <input
    id="price"
    v-model="userInput"
    type="number"
    class="filter__input"
    :max="max"
    :min="min"
    @change="handleInputChange"
  />
</template>

<style scoped lang="scss">
.filter__label {
  @apply block text-sm font-medium mt-1 mb-1;
}
.filter__input {
  @apply w-full border rounded-md p-2 text-sm focus:outline-none focus:ring focus:ring-green-300;
}
</style>
