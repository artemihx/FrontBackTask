<script setup>
import TheHeaderLogo from '@/components/header/TheHeaderLogo.vue'
import TheHeaderNav from '@/components/header/TheHeaderNav.vue'
import {ref,onMounted} from "vue";
import axios from 'axios';

const data = ref(null);
const error = ref(null);

const fetchData = async () => {
  try {
    const response = await axios.get('http://localhost:8081/api/asd', {
      headers: {
        'Access-Control-Allow-Origin': 'no-cors',
      },
    });
    data.value = response.data;
    console.log(response.data)
  } catch (err) {
    error.value = err.message;
    console.error('Error fetching data:', err);
  }
};
onMounted(fetchData);
</script>

<template>
  <header class="header">
    <div class="flex justify-between">
      <router-link to="/"><the-header-logo/></router-link>
      <div class="flex gap-20">
        <the-header-nav/>
        <span
          v-if="data"
          class="header__city"
        >
          <b>Город</b> - Т {{ data }}
        </span>
      </div>
    </div>
    <span class="header__slogan">Уют для вашего кота – забота в каждом мурлыканье!</span>
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