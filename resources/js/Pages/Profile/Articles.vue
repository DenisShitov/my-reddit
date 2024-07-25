<script setup lang="ts">
import Layout from "@/Components/Layout/Layout.vue";
import Panel from "primevue/panel";
import {usePage} from "@inertiajs/vue3";
import ProfileCard from "@/Components/Entities/Article/ProfileCard.vue";
import {computed} from "vue";

const articles = computed(() => usePage().props.articles)
</script>

<template>
    <layout>
        <h1 class="mb-2">Посты</h1>

        <panel :pt="{ header: ['!pb-0'] }">
            <div class="flex flex-col gap-4">
                <profile-card v-for="article in articles" :article="article"/>
            </div>
        </panel>

        <template #aside>

        </template>
    </layout>
</template>

<style scoped>

</style>
