<script setup lang="ts">
import {useForm, usePage} from "@inertiajs/vue3";
import InputText from "primevue/inputtext";
import Password from 'primevue/password';
import Button from "primevue/button";
import Menu from "primevue/menu";

import {default as menuItems} from "@/options/AuthMenuOptions"
import {computed, Ref, ref} from "vue";
import {MenuItem} from "primevue/menuitem";

interface ILoginForm {
    email: string | null
    password: string | null
}

const form = useForm<ILoginForm>({
    email: null,
    password: null
})

const menu = ref();

const toggle = (event: Event) => {
    menu.value.toggle(event);
};

const errors = computed(() => usePage().props.errors)
</script>

<template>
    <div class="flex flex-col gap-4">
        <div class="flex flex-col">
            <label for="useremail">Email</label>
            <input-text id="useremail" v-model="form.email" aria-describedby="useremail-help"/>
            <small id="useremail-help">
                <span class="text-red-500" v-if="errors?.email">{{ errors?.email }}</span>
                <span v-else>Введите почту, указанную при регистрации</span>
            </small>
        </div>
        <div class="flex flex-col">
            <label for="userpassword">Пароль</label>
            <Password id="userpassword" v-model="form.password" toggleMask :feedback="false" inputClass="w-full"
                      aria-describedby="userpassword-help"/>
            <small id="userpassword-help">
                <span class="text-red-500" v-if="errors?.password">{{ errors?.password }}</span>
                <span v-else>Введите пароль</span>
            </small>
        </div>
        <div class="flex gap-1 w-full ">
            <Button label="Войти" class="flex-1" @click="form.post(route('login'), form)"/>
            <Button type="button" icon="pi pi-ellipsis-v" @click="toggle" outlined aria-haspopup="true"
                    aria-controls="login-additional-menu"/>
        </div>
        <Menu ref="menu" id="login-additional-menu" :model="menuItems" :popup="true"/>
    </div>
</template>

<style scoped>

</style>
