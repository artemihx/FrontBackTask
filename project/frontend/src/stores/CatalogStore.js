import { defineStore } from 'pinia';
import { ref } from "vue";
import { api } from "@/shared/index.js";


export const useCatalogStore = defineStore('catalog', () => {
    const rooms = ref([]);

    const getRooms = async () => {
        const response = (await api.get(`rooms`)).data
        console.log(response)
        rooms.value = response;
        console.log(rooms.value)
    };
    return { getRooms,rooms };
});
