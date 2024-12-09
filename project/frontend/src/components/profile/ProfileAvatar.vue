<script setup>
defineProps({
  user:{
    type:Object,
    required:true
  }
})
</script>

<template>
  <div class="profile__avatar">
    <img
      v-if="user.photo === null"
      src="@/assets/images/no-avatar.jpg"
      alt="User Avatar"
      class="profile__avatar-image"
    />
    <img
      v-else
      :src="user.photo"
      alt="User Avatar"
      class="profile__avatar-image"
    />
  </div>
</template>

<style scoped lang="scss">
.profile {
  &__avatar {
    @apply flex-shrink-0;

    &-image {
      @apply w-80 h-80 rounded-full object-cover border-4 border-gray-300 shadow-md;
    }
  }
}
</style>