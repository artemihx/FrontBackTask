import { defineStore } from 'pinia';
import {computed, ref} from "vue";
import {useRouter} from "vue-router";
import {api} from "@/shared/index.js";
import {toastNotification} from "@/shared/functions.js";
import axios from "axios";

export const useAuthStore = defineStore('auth', () => {
    const token = ref(localStorage.getItem('token') || null);
    const router = useRouter()
    const loginError = ref(null);
    const user = ref(null);

    const login = async (credentials) => {
        try {
            const response = await api.post(`login`, credentials);
            console.log(response.data)

            token.value = response.data.user_token;
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

    const register = async (formData) => {
        try {
            const response = await api.post("register", formData, {
                headers: { "Content-Type": "multipart/form-data" },
            });
            console.log(response);
            console.log(response.data);

            token.value = response.data.user_token;
            localStorage.setItem('token', token.value);

            toastNotification("Вы зарегистрировались", "success");
            setTimeout(() => {
                router.push('/');
            }, 1500);
        } catch (error) {
            if (error.response && error.response.status === 422) {
                const errorMessage = error.response.data.message;
                if (errorMessage.includes("The email has already been taken")) {
                    toastNotification("Этот email уже занят", "error");
                } else {
                    toastNotification("Ошибка при регистрации: " + errorMessage, "error");
                }
            } else {
                toastNotification("Ошибка при регистрации", "error");
            }
            console.error('Ошибка при регистрации:', error.response?.data || error);
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

    const userData = async () =>{
        try {
            const response = await api.get('user', {
                headers: {
                    Authorization: `Bearer ${token.value}`
                }
            })
            user.value = response.data
            console.log(user.value)
        }
        catch (error) {
            console.error('Ошибка получения данных о пользователе', error);
        }
    }
    const updateUser = async (updatedData) => {
        try {
            const response = await api.put('user', updatedData, {
                headers: {
                    Authorization: `Bearer ${token.value}`,
                },
            });
            user.value = response.data;
            console.log(user.value)
            toastNotification('Данные успешно обновлены', 'success');
        } catch (error) {
            console.error('Ошибка при обновлении данных пользователя', error);
            toastNotification('Ошибка при обновлении данных', 'error');
        }
    };

    return {
        user,
        token,
        router,
        loginError,
        isAuthenticated,
        login,
        register,
        logout,
        userData,
        updateUser
    };
});
