<script setup>
</script>

<template>
  <main>
    <div class="wrapper">
      <div class="cont">
        <main class="main">
          <router-view v-slot="{ Component }">
            <transition
              name="fade"
              mode="out-in"
            >
              <component :is="Component"/>
            </transition>
          </router-view>
        </main>
      </div>
    </div>
  </main>
</template>

<style scoped lang="scss">
.fade-enter-to,
.fade-leave-from {
  opacity: 1;
}
.fade-enter-from,
.fade-leave-to{
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active{
  transition: opacity 0.3s ease-out;
}
</style>
