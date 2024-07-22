<script setup lang="ts">
import Menubar from 'primevue/menubar';
import {useAuth} from "@/use/useAuth";
import {ref} from "vue";
import {router} from "@inertiajs/vue3";

const {isAuth} = useAuth()

const guestItems = ref([
    {
        label: 'Вход',
        icon: 'pi pi-sign-in',
        command: () => {
            router.get(route('login'), {}, {
                preserveState: true,
            })
        }
    },
    {
        label: 'Регистрация',
        icon: 'pi pi-user-plus',
        command: () => {
            router.get(route('register'), {}, {
                preserveState: true,
            })
        }
    },
])

const authItems = ref([
    {
        label: 'Выход',
        icon: 'pi pi-sign-out',
        command: () => {
            router.post(route('logout'))
        }
    },
])

</script>

<template>
    <div class="">
        <header>
            <div class="container">
                <Menubar :model="isAuth ? authItems : guestItems"/>
            </div>
        </header>

    </div>
</template>

<style scoped>

</style>
