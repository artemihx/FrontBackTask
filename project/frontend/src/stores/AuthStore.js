import { defineStore } from 'pinia';
import {computed, ref} from "vue";
import {useRouter} from "vue-router";
import {api} from "@/shared/index.js";
import {toastNotification} from "@/shared/functions.js";


export const useAuthStore = defineStore('auth', () => {
    const token = ref(localStorage.getItem('token') || null);
    const router = useRouter()
    const loginError = ref(null);



    const login = async (credentials) => {
        try {
            const response = await api.post(`login`, credentials);
            token.value = response.data.data.user_token;
            localStorage.setItem('token', token.value);
            loginError.value = null;
            await toastNotification("Вы авторизовались!","success")
            setTimeout(()=>{
                router.push('/')
            },2000)
        } catch (error) {
            if (error.response && error.response.status === 401) {
                loginError.value = 'Неверные введеные данные';
                toastNotification("Неверные введенные данные", "error");
            } else {
                loginError.value = 'Ошибка при входе';
            }
        }
    };

    const register = async (credentials) => {
        try {
            const response = await api.post(`signup`, credentials);
            token.value = response.data.data.user_token;
            localStorage.setItem('token', token.value);
            toastNotification("Вы зарегистрировались","success")
            setTimeout(()=>{
                router.push('/')
            },1500)
        } catch (error) {
            toastNotification("Ошибка при регистрации", "error")
            console.error('Ошибка при регистрации:', error);
        }

    };

    const isAuthenticated = computed(() => !!token.value);

    const logout = async () =>{
        try {
            toastNotification("Вы вышли из аккаунта","info")
            setTimeout(()=>{
                router.push('/')
            },2000)

              await api.get('logout', {
                headers: {
                    Authorization: `Bearer ${token.value}`
                }
            })
            token.value = null;
            localStorage.removeItem('token');
        }
        catch (error) {
            console.error('Ошибка выхода', error);
        }
    }






    return { token, router, loginError, login, register, logout, isAuthenticated };
});
