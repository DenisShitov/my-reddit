<script setup lang="ts">
import Password from "primevue/password";
import InputText from "primevue/inputtext";
import Menu from "primevue/menu";
import Button from "primevue/button";

import {default as menuItems} from "@/options/AuthMenuOptions"
import {useForm, usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";

interface IRegistrationForm {
    email: string | null
    name: string | null
    password: string | null
    password_confirmation: string | null
}

const form = useForm<IRegistrationForm>({
    email: null,
    name: null,
    password: null,
    password_confirmation: null
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
            <label for="username">Имя</label>
            <input-text id="username" v-model="form.name" aria-describedby="username-help"/>
            <small id="username-help">
                <span class="text-red-500" v-if="errors?.name">{{ errors?.name }}</span>
            </small>
        </div>
        <div class="flex flex-col">
            <label for="useremail">Email</label>
            <input-text id="useremail" v-model="form.email" aria-describedby="useremail-help"/>
            <small id="useremail-help">
                <span class="text-red-500" v-if="errors?.email">{{ errors?.email }}</span>
            </small>
        </div>
        <div class="flex flex-col">
            <label for="userpassword">Пароль</label>
            <Password id="userpassword" v-model="form.password" toggleMask :feedback="false" inputClass="w-full"
                      aria-describedby="userpassword-help"/>
            <small id="userpassword-help">
                <span class="text-red-500" v-if="errors?.password">{{ errors?.password }}</span>
            </small>
        </div>
        <div class="flex flex-col">
            <label for="userpasswordconfirmation">Подтверждение пароля</label>
            <password id="userpasswordconfirmation" v-model="form.password_confirmation" toggleMask :feedback="false"
                      inputClass="w-full" aria-describedby="userpasswordconfirmation-help"/>
            <small id="userpasswordconfirmation-help">
                <span class="text-red-500"
                      v-if="errors?.password_confirmation">{{ errors?.password_confirmation }}</span>
            </small>
        </div>
        <div class="flex gap-1 w-full ">
            <Button label="Зарегистрироваться" class="flex-1" @click="form.post(route('register'), form)"/>
            <Button type="button" icon="pi pi-ellipsis-v" @click="toggle" outlined aria-haspopup="true"
                    aria-controls="login-additional-menu"/>
        </div>
        <Menu ref="menu" id="login-additional-menu" :model="menuItems" :popup="true"/>
    </div>
</template>

<style scoped>

</style>
