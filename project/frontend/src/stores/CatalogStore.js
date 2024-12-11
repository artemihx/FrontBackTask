import { defineStore } from 'pinia';
import { reactive } from 'vue';
import { useRoomsStore } from '@/stores/RoomsStore.js';

export const useCatalogStore = defineStore('catalog', () => {
    const roomsStore = useRoomsStore();

    const params = reactive({
        sort_order: 'asc',
    });

    const updateSortOrder = async (order) => {
        params.sort_order = order;
        await roomsStore.getRooms();
    };

    return {
        updateSortOrder,
        params,
    };
});
