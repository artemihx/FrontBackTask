import { defineStore } from 'pinia';
import {reactive, ref} from "vue";
import { api } from "@/shared/index.js";

export const useCatalogStore = defineStore('catalog', () => {
    const rooms = ref([]);
    const isLoading = ref(false);
    const params = reactive({
        sort_order: 'asc'
    })

    const getRooms = async () => {
        isLoading.value = true; // Начало загрузки
        try {
            const response = (await api.get('rooms', { params })).data;
            rooms.value = response;
            console.log(response)
        } catch (error) {
            console.error('Ошибка загрузки комнат:', error);
        } finally {
            isLoading.value = false;
        }
    };

    const updateSortOrder = (order) => {
        params.sort_order = order;
        getRooms();
    };

    return {
        getRooms,
        updateSortOrder,
        rooms,
        params,
        isLoading
    };
});
