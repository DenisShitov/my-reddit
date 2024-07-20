<script setup lang="ts">
import Menubar from 'primevue/menubar';
import {useAuth} from "@/use/useAuth";
import {ref} from "vue";

const {isAuth} = useAuth()

const guestItems = ref([
    {
        label: 'Вход',
        icon: 'pi pi-sign-in',
        command: () => {

        }
    },
    {
        label: 'Регистрация',
        icon: 'pi pi-user-plus',
        command: () => {

        }
    },
])

const authItems = ref([])

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
