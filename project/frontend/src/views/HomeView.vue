<script setup>
import GreetingBlock from '@/components/home-page/GreetingBlock.vue'
import RoomCard from "@/components/room/RoomCard.vue";
import ReviewItem from "@/components/home-page/ReviewItem.vue";
import AboutUsItem from "@/components/home-page/AboutUsItem.vue";
import ContactForm from "@/components/home-page/ContactForm.vue";
</script>
<template>
  <greeting-block/>
  <section id="rooms" class="rooms">
    <h2 class="rooms__title">Номера и цены</h2>
    <div class="rooms__block">
      <room-card
        v-for="room in 4"
        :key="room"
        :room="room"
      />
    </div>
  </section>
  <section id="reviews" class="reviews">
    <h2>Отзывы наших клиентов</h2>
    <div class="review__container">
      <review-item
        v-for="review in 5"
        :key=review
        :review="review"
      />
    </div>
  </section>
  <section id="about" class="about">
    <div class="about__block">
      <h3 class="about__title">Отель для животных</h3>
      <img
        class="about__logo"
        src="../assets/icons/logo.svg"
        alt="kuksik"
      >
      <div class="about__info">
        <about-us-item/>
      </div>
    </div>
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1101.86993623164!2d84.95902104154581!3d56.47224229350683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x432693bbc4df60c9%3A0xff642b6e8472339a!2z0KLQvtC80YHQutC40Lkg0YLQtdGF0L3QuNC60YPQvCDQuNC90YTQvtGA0LzQsNGG0LjQvtC90L3Ri9GFINGC0LXRhdC90L7Qu9C-0LPQuNC5!5e0!3m2!1sru!2sru!4v1732717133844!5m2!1sru!2sru"
      width="100%"
      height="700"
      style="border:0;"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
  </section>
  <contact-form/>
</template>
<style scoped lang="scss">
.about{
  position: relative;
  @apply relative mb-20;
  &__block{
    height: 470px;
    width: 300px;
    background: $white;
    padding: 10px 15px;
    @apply absolute top-40 left-5 flex flex-col rounded;
  }
  &__title{
  @apply text-xl;
  }
  &__logo{
    width: 100px;
    margin-bottom: 35px;
  }
  &__info{
    @apply flex flex-col gap-5;
  }

}
.rooms {
  background: linear-gradient(to bottom, $orange, #f0bc87);
  padding: 40px 20px;
  text-align: center;
  &__block {
    @apply flex justify-center flex-wrap;
    gap: 20px 120px;
  }
  &__title {
    @apply text-2xl mb-5;
    color: $light-black;
  }
}
/* Блок с отзывами */
.reviews {
  background-color: #5a977a;
  border-radius: 8px;
  padding: 20px;
  color: #fff;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  margin: 80px 0 80px 0;
}

.reviews h2 {
  text-align: center;
  color: #fff;
}

.review__container {
  display: grid;
  grid-template-columns: 1fr;
  gap: 15px;
  margin-top: 20px;
}
</style>