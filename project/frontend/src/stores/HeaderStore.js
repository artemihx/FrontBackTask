import { defineStore } from 'pinia';
import { ref } from "vue";
import { api } from "@/shared/index.js";


export const useHeaderStore = defineStore('header', () => {
    const slogan = ref(localStorage.getItem('slogan') || null);
    const city = ref(localStorage.getItem('city') || null);

    const getHeader = async () => {
        const response = (await api.get(`header`)).data
        slogan.value = response.slogan;
        city.value = response.city;
        localStorage.setItem('slogan', slogan.value);
        localStorage.setItem('city', city.value);
    };
    return { getHeader, city, slogan };
});
