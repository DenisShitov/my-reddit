<script setup lang="ts">
import Layout from "@/Components/Layout/Layout.vue";
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import Panel from 'primevue/panel';
import FileUpload, {FileUploadSelectEvent} from "primevue/fileupload";
import {QuillEditor} from "@vueup/vue-quill";

import {default as modules} from '@/options/QuillModules'
import {Ref, ref} from "vue";
import {useForm} from "@inertiajs/vue3";

interface IArticleForm {
    title: string | null
    content: string | null
    preview: File | null
}

const form: IArticleForm = useForm({
    title: null,
    content: null,
    preview: null
})

const fileUpload: Ref = ref()

const onSelectPreview = (event: FileUploadSelectEvent) => {
    form.preview = event.files[0]
};

const onClearPreview = () => {
    fileUpload.value.clear()
    form.preview = null
}

const onSubmit = () => {
    form.post(
        route('articles.store'),
        form
    )
}

</script>

<template>
    <layout>
        <h1 class="mb-2">Создать пост</h1>
        <div class="flex flex-col items-start gap-4 h-full box-border">
            <InputText
                type="text"
                placeholder="Заголовок"
                v-model="form.title"
                class="w-full box-border"
            />


            <div class="">
                <quill-editor
                    toolbar="full"
                    theme="snow"
                    content-type="html"
                    :modules="modules"
                    v-model:content="form.content"/>
            </div>
        </div>

        <template #aside>
            <div class="mb-2">
                <FileUpload
                    ref="fileUpload"
                    mode="basic"
                    choose-label="Загрузить превью"
                    accept="image/*"
                    :multiple="false"
                    :maxFileSize="1024*1024*1"
                    @select="onSelectPreview"
                />
            </div>

            <div v-if="form.preview" class="rounded-md overflow-hidden relative w-full aspect-square mb-2 mx-auto">
                <img class="object-cover w-full h-full" :src="form.preview?.objectURL"/>
                <div class="absolute top-2 right-1">
                    <Button @click="onClearPreview" severity="secondary" icon="pi pi-trash"/>
                </div>
            </div>
            <div class="sticky top-2">
                <panel
                    :pt="{
                        header: ['!pb-0']
                    }"
                >
                    <div class="flex flex-col gap-2 ">
                        <Button label="Сохранить" @click="onSubmit"/>
                    </div>
                </panel>
            </div>
        </template>
    </layout>
</template>

<style scoped>

</style>
