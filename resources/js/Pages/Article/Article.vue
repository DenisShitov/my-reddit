<script setup lang="ts">
import Layout from "@/Components/Layout/Layout.vue";
import {computed} from "vue";
import {usePage} from "@inertiajs/vue3";

const article = computed(() => usePage().props.article)
</script>

<template>
    <layout>
        <div class="" v-html="article.content"></div>
    </layout>

</template>

<style scoped>

</style>
