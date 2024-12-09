<script setup>
import { computed } from "vue";

const props = defineProps({
  user:{
    type: Object,
    required:true
  }
})

const formattedDate = computed(() => {
  const date = new Date(props.user.created_at);
  return date.toLocaleDateString('ru-RU', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
    minute: '2-digit',
  });
});
</script>

<template>
  <div class="profile container">
    <div class="profile__avatar">
      <img
        v-if="user.photo === null"
        src="@/assets/images/no-avatar.jpg"
        alt="User Avatar"
        class="profile__avatar-image"
      />
      <img
        :src="user.photo"
        alt="User Avatar"
        class="profile__avatar-image"
      />
    </div>

    <div class="profile__info">
      <h2 class="profile__info-name">{{ user.name }}</h2>
      <p class="profile__info-detail">
        <span class="profile__info-label">Телефон:</span>
        {{ user.phone }}
      </p>
      <p class="profile__info-detail">
        <span class="profile__info-label">Email:</span>
        {{ user.email }}
      </p>
      <p class="profile__info-detail">
        <span class="profile__info-label">Дата регистрации:</span>
        {{ formattedDate }}
      </p>
    </div>
  </div>
</template>

<style scoped lang="scss">
.profile {
  @apply w-4/5 my-12 mx-auto justify-between p-8 flex bg-white rounded-lg shadow-lg;

  &__avatar {
    @apply flex-shrink-0;

    &-image {
      @apply w-64 h-64 rounded-full object-cover border-4 border-gray-300 shadow-md;
    }
  }

  &__info {
    @apply w-6/12 bg-gray-50 p-6 rounded-lg shadow-md;

    &-name {
      @apply text-3xl font-bold text-gray-800 mb-4;
    }

    &-detail {
      @apply text-lg text-gray-600 mb-2;
    }

    &-label {
      @apply font-medium text-gray-700;
    }
  }
}
</style>
