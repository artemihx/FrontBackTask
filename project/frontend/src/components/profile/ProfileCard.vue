<script setup>
import {ref, computed} from 'vue';
import {useAuthStore} from '@/stores/AuthStore';

const props = defineProps({
  user: {
    type: Object,
    required: true,
  },
});

const authStore = useAuthStore();

const editing = ref(false);
const formData = ref({name: props.user.name, phone: props.user.phone, email: props.user.email});

const formattedDate = (date) => {
  if (!date) return 'Дата неизвестна';
  const parsedDate = new Date(date);
  return parsedDate.toLocaleDateString('ru-RU', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit',
  });
};

const startEditing = () => {
  editing.value = true;
};

const cancelEditing = () => {
  editing.value = false;
  formData.value = {name: props.user.name, phone: props.user.phone, email: props.user.email};
};

const saveChanges = async () => {
  await authStore.updateUser(formData.value);
  editing.value = false;
};
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
        v-else
        :src="user.photo"
        alt="User Avatar"
        class="profile__avatar-image"
      />
    </div>

    <div
      v-if="!editing"
      class="profile__info"
    >
      <h2 class="profile__info-name">{{ user.name }}</h2>
      <p class="profile__info-detail">
        <span class="profile__info-label">Телефон:</span>
        {{ user.phone }}
      </p>
      <p class="profile__info-detail">
        <span class="profile__info-label">Email:</span>
        {{ user.email }}
      </p>
      <p class="profile__info-detail mt-5">
        <span class="profile__info-label">Дата регистрации:</span>
        {{ formattedDate(user.created_at) }}
      </p>
      <p class="profile__info-detail">
        <span class="profile__info-label">Последняя дата изменения:</span>
        {{ formattedDate(user.updated_at) }}
      </p>
      <button
        class="profile__button"
        @click="startEditing"
      >
        Изменить
      </button>
    </div>

    <form
      v-else
      class="profile__form"
      @submit.prevent="saveChanges"
    >
      <div class="profile__form-group">
        <label
          for="name"
          class="profile__form-label"
        >
          Имя:
        </label>
        <input
          id="name"
          v-model="formData.name"
          placeholder="Имя"
          class="profile__form-input"
        />
      </div>

      <div class="profile__form-group">
        <label
          for="phone"
          class="profile__form-label"
        >
          Телефон:
        </label>
        <input
          id="phone"
          v-model="formData.phone"
          placeholder="Телефон"
          class="profile__form-input"
        />
      </div>

      <div class="profile__form-group">
        <label
          for="email"
          class="profile__form-label"
        >
          Email:
        </label>
        <input
          id="email"
          v-model="formData.email"
          placeholder="Email"
          class="profile__form-input"
        />
      </div>

      <div class="profile__buttons">
        <button
          type="submit"
          class="profile__button"
        >
          Сохранить
        </button>
        <button
          type="button"
          class="profile__button cancel"
          @click="cancelEditing"
        >
          Отмена
        </button>
      </div>
    </form>
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

  &__info,
  &__form {
    @apply w-7/12 bg-gray-50 p-6 rounded-lg shadow-md;
  }

  &__info-name {
    @apply text-3xl font-bold text-gray-800 mb-4;
  }

  &__info-detail {
    @apply text-lg text-gray-600 mb-2;
  }

  &__info-label {
    @apply font-medium text-gray-700;
  }

  &__form-group {
    @apply mb-4;
  }

  &__form-label {
    @apply block mb-2 font-medium text-gray-700;
  }

  &__form-input {
    @apply w-full p-2 border border-gray-300 rounded-lg;
  }

  &__buttons {
    @apply flex justify-between;
  }

  &__button {
    @apply flex items-center text-white mt-8 p-2.5 justify-center w-48 tracking-widest rounded-lg bg-gray-600;
    transition: all 0.3s ease-in-out;
    cursor: pointer;

    &:hover {
      background: #444;
    }

    &.cancel {
      @apply bg-red-500;

      &:hover {
        background: #c53030;
      }
    }
  }
}
</style>
