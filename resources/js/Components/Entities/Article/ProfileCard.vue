<script setup lang="ts">
import Panel from "primevue/panel";
import Button from "primevue/button";
import {router} from "@inertiajs/vue3";
import {Article as IArticle} from "@/types/entities";

interface IProps {
    article: IArticle
}

const {article} = defineProps<IProps>()

const onDelete = () => {
    router.delete(
        route('articles.destroy', article.id),
        {
            only: ['articles'],
            preserveState: true,
            preserveScroll: true
        }
    )
}
</script>

<template>
    <panel :pt="{ header: ['!pb-0'] }">
        <div class="flex items-center justify-between">

            <div class="flex items-center gap-2">
                <img v-if="article.media.length" :src="article.media[0].preview_url" class="w-10 h-10 rounded-md"
                     alt="preview">
                <h4>{{ article.title }}</h4>
            </div>

            <div class="flex gap-2">
                <Button icon="pi pi-eye" text/>
                <Button icon="pi pi-pencil" text/>
                <Button icon="pi pi-trash" severity="danger" text @click="onDelete"/>
            </div>

        </div>
    </panel>
</template>

<style scoped>

</style>
