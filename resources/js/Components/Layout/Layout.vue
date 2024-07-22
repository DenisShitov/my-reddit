<script setup lang="ts">
import HeaderComponent from "@/Components/Layout/Header.vue";
import BaseModal from "@/Components/Modal/BaseModal.vue";





</script>

<template>
    <div class="mb-6 mt-2">
        <header-component/>
    </div>

    <div class="container grid grid-cols-[1fr_25%]">
        <div class="">
            <slot/>
        </div>
        <div class="">
            <slot name="aside"/>
        </div>
    </div>

    <base-modal/>
</template>

<style scoped>

</style>
