import { defineStore, storeToRefs } from 'pinia';
import { api } from '@/shared/index.js';
import { ref } from 'vue';
import { useCatalogStore } from '@/stores/CatalogStore.js';
import { toastNotification } from '@/shared/functions.js';
import { useAuthStore } from '@/stores/AuthStore.js';

export const useRoomsStore = defineStore('roomsStore', () => {
    const rooms = ref([]);
    const randomRooms = ref([])

    const isLoading = ref(false);
    const { params } = storeToRefs(useCatalogStore());
    const { token } = storeToRefs(useAuthStore());

    const getRooms = async (id = null) => {
        isLoading.value = true;
        try {
            // Если передан `id`, запрашиваем конкретную комнату
            if (id) {
                const response = (await api.get(`rooms/${id}`)).data;
                return response;
            }

            // Если `id` не передан, запрашиваем все комнаты с фильтрами
            const response = (await api.get('rooms', { params: params.value })).data;
            rooms.value = response;
            console.log(rooms.value);
        } catch (error) {
            console.error('Ошибка загрузки комнат:', error);
            throw error;
        } finally {
            isLoading.value = false;
        }
    };


    const bookingRoom = async (updatedData) => {
        try {
            const response = await api.post('bookings', updatedData, {
                headers: {
                    Authorization: `Bearer ${token.value}`,
                },
            });
            console.log(response.data);
            toastNotification('Заявка успешно отправлена!', 'success');
        } catch (error) {
            toastNotification('Ошибка бронирования', 'error');
            console.error('Ошибка бронирования:', error);
        }
    };
    const getRandomRooms = async () => {
        const response = (await api.get(`randRooms`)).data
        randomRooms.value = response;
        console.log(response)
    };
    return {
        rooms,
        randomRooms,
        isLoading,
        getRooms,
        bookingRoom,
        getRandomRooms,
    };
});
