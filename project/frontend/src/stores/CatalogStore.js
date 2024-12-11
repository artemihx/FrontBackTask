import { defineStore } from 'pinia';
import {reactive, ref} from "vue";
import { api } from "@/shared/index.js";

export const useCatalogStore = defineStore('catalog', () => {
    const rooms = ref([]);
    const isLoading = ref(false);
    const params = reactive({
        sort_order: 'asc'
    })

    const getRooms = async (id = null) => {
        isLoading.value = true;
        try {
            const endpoint = id ? `rooms/${id}` : 'rooms';
            const response = (await api.get(endpoint, { params })).data;

            if (id) {
                return response; // Возвращаем данные конкретной комнаты
            } else {
                rooms.value = response;
            }
        } catch (error) {
            console.error('Ошибка загрузки комнат:', error);
            throw error; // Пробрасываем ошибку для обработки
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
