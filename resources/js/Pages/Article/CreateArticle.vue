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
    preview: null,
})

const fileupload: Ref = ref();

const onSelectPreview = (event: FileUploadSelectEvent) => {
    form.preview = event.files[0]
};

</script>

<template>
    <layout>
        <div class="flex flex-col items-start gap-4 h-full box-border">
            <InputText
                type="text"
                placeholder="Заголовок"
                v-model="form.title"
                class="w-full box-border"
            />
            <FileUpload
                ref="fileupload"
                mode="basic"
                accept="image/*"
                :multiple="false"
                :maxFileSize="5000000"
                @select="onSelectPreview"
            />
            <img class="h-[80px] object-contain" :src="form.preview.objectURL"/>
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
            <div class="sticky top-2">
                <panel
                    :pt="{
                        header: ['!pb-0']
                    }"
                >
                    <div class="flex flex-col gap-2 ">
                        <Button label="Сохранить" @click="form.post(route('articles.store'), form)"/>
                    </div>
                </panel>
            </div>

        </template>
    </layout>
</template>

<style scoped>

</style>
