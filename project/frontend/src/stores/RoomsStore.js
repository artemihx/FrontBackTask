import { defineStore, storeToRefs } from 'pinia';
import { api } from '@/shared/index.js';
import { ref } from 'vue';
import { useCatalogStore } from '@/stores/CatalogStore.js';
import { toastNotification } from '@/shared/functions.js';
import { useAuthStore } from '@/stores/AuthStore.js';

export const useRoomsStore = defineStore('roomsStore', () => {
    const rooms = ref([]);
    const isLoading = ref(false);
    const { params } = storeToRefs(useCatalogStore());
    const { token } = storeToRefs(useAuthStore());

    const getRooms = async (id = null) => {
        isLoading.value = true;
        try {
            const endpoint = id ? `rooms/${id}` : 'rooms';
            const response = (await api.get(endpoint, { params: params.value })).data;

            if (id) {
                return response;
            } else {
                rooms.value = response;
            }
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

    return {
        rooms,
        isLoading,
        getRooms,
        bookingRoom,
    };
});
