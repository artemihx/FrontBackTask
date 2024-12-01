<script setup>
import * as yup from "yup";
import { useForm } from "vee-validate";
import { useAuthStore } from "@/stores/AuthStore.js";
import { storeToRefs } from "pinia";
import { useRouter } from "vue-router";

const { isAuthenticated } = storeToRefs(useAuthStore());
const authStore = useAuthStore();
const router = useRouter();

const yupValidationSchema = yup.object({
  name: yup
      .string()
      .matches(/^[а-яА-ЯёЁa-zA-Z\s.-]+$/, "Имя может содержать только буквы, пробелы, точки и тире")
      .required("Поле является обязательным"),
  email: yup
      .string()
      .email("Некорректная почта")
      .required("Поле является обязательным"),
  phone: yup
      .string()
      .matches(/^\+7\(\d{3}\)\d{3}-\d{2}-\d{2}$/, "Телефон должен быть в формате +7(ХХХ)ХХХ-ХХ-ХХ")
      .required("Поле является обязательным"),
  password: yup
      .string()
      .min(8, "Минимум 8 символов")
      .matches(/[A-Za-z\d@$!%*?&]/, "Пароль должен содержать буквы, цифры или спецсимволы")
      .required("Поле является обязательным"),
  avatar: yup
      .mixed()
      .test(
          "fileSize",
          "Файл не должен превышать 2MB",
          (value) => !value || (value.size && value.size <= 2097152)
      )
      .test(
          "fileFormat",
          "Файл должен быть формата jpeg или png",
          (value) => !value || ["image/jpeg", "image/png"].includes(value.type)
      )
});

const { defineField, errors, handleSubmit } = useForm({
  validationSchema: yupValidationSchema
});

const [name, nameAttrs] = defineField("name");
const [email, emailAttrs] = defineField("email");
const [phone, phoneAttrs] = defineField("phone");
const [password, passwordAttrs] = defineField("password");
const [avatar, avatarAttrs] = defineField("avatar");

const submit = handleSubmit((values) => {
  authStore.register({ name: values.name, password: values.password, email: values.email, phone: values.phone })})

const goHome = () => {
  isAuthenticated.value ? router.push("/") : null;
};
</script>


<template>
  <form @submit.prevent="submit">
    <label
      class="label"
      for="chk"
      aria-hidden="true"
    >
      Регистрация
    </label>

    <input
      id="name"
      v-model="name"
      v-bind="nameAttrs"
      :class="{ 'error-input': errors.name }"
      type="text"
      name="name"
      placeholder="Ваше имя"
      required
    />
    <p
      v-if="errors.name"
      class="error-message"
    >
      {{ errors.name }}
    </p>

    <input
      v-bind="emailAttrs"
      id="email"
      v-model="email"
      :class="{ 'error-input': errors.email }"
      type="email"
      name="email"
      placeholder="Почта"
      required
    />
    <p
      v-if="errors.email"
      class="error-message"
    >
      {{ errors.email }}
    </p>

    <input
      v-bind="phoneAttrs"
      id="phone"
      v-model="phone"
      :class="{ 'error-input': errors.phone }"
      type="text"
      name="phone"
      placeholder="Телефон (в формате +7(XXX)XXX-XX-XX)"
      required
    />
    <p
      v-if="errors.phone"
      class="error-message"
    >
      {{ errors.phone }}
    </p>

    <input
      v-bind="passwordAttrs"
      id="password"
      v-model="password"
      :class="{ 'error-input': errors.password }"
      type="password"
      name="password"
      placeholder="Пароль"
      required
    />
    <p
      v-if="errors.password"
      class="error-message"
    >
      {{ errors.password }}
    </p>

    <input
      id="avatar"
      v-bind="avatarAttrs"
      type="file"
      name="avatar"
      accept="image/jpeg, image/png"
      @change="(e) => (avatar.value = e.target.files[0])"
    />
    <p
      v-if="errors.avatar"
      class="error-message"
    >
      {{ errors.avatar }}
    </p>

    <button
      :disabled="errors.name || errors.email || errors.phone || errors.password"
      :class="{ 'error-button': errors.name || errors.email || errors.phone || errors.password }"
      type="submit"
      @click="goHome"
    >
      Зарегистрироваться
    </button>
  </form>
</template>


<style scoped lang="scss">
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:active,
input:-webkit-autofill:focus {
  background-color: #ffffff !important;
  color: #555 !important;
  -webkit-box-shadow: 0 0 0 1000px #fff1d2 inset !important;
  -webkit-text-fill-color: #9c6006 !important;
}

.error-message{
  @apply ml-40 text-base -mt-3.5 opacity-80 text-blue-950;

  @media screen and (max-width:550px ) {
    @apply ml-0 text-center
  }
}
.error-input{
  border: 0.15rem solid rgba(255, 0, 0, 0.78);
}
.error-button{
  background: #aca2a2;
  &:hover{
    background: #aca2a2;
  }
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
.label {
  letter-spacing: 2px;
}
label {
  @apply text-white text-4xl/normal justify-center flex mt-10 font-bold cursor-pointer;
  transition: 0.5s ease-in-out;
}
input {
  @apply w-3/5 h-9 bg-white justify-center flex my-4 mx-auto p-3 border-none outline-none rounded-md;
}
input[type="file"] {
  @apply h-12;
}
button {
  @apply w-3/5 h-10 my-6 mx-auto justify-center block text-white text-base font-bold border-none outline-none rounded-md cursor-pointer;
  background: $button-auth-color;
  transition: 0.2s ease-in;
}
button:hover {
  background: $button-auth-hover;
}
#chk:checked ~ .signup label {
  transform: scale(0.6);
}
</style>