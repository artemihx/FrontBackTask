<script setup>

</script>

<template>
  <a class="greeting__link">Забронировать</a>
</template>

<style scoped lang="scss">
.greeting__link{
  @apply flex items-center p-2.5 justify-center max-w-48 tracking-wide rounded-lg;
  background: $green;
  color: $white;
  font-weight: 600;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  &:hover{
    background: $green-hover;
  }
}
</style>