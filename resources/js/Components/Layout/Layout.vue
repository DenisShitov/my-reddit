<script setup lang="ts">
import HeaderComponent from "@/Components/Layout/Header.vue";
import BaseModal from "@/Components/Modal/BaseModal.vue";

</script>

<template>
    <div class="container flex flex-col gap-6 min-h-screen py-2 relative">
        <div class="">
            <slot name="header">
                <header-component/>
            </slot>
        </div>
        <div class="grid grid-cols-[1fr_25%] flex-1 gap-4">
            <div class="">
                <slot/>
            </div>
            <div class="">
                <slot name="aside"/>
            </div>
        </div>
        <div class="">
            <slot name="footer"></slot>
        </div>
    </div>

    <base-modal/>
</template>

<style scoped>

</style>
