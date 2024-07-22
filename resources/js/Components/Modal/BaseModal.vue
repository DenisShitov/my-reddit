<script setup lang="ts">
import DynamicDialog from "primevue/dynamicdialog";
import {useDialog} from "primevue/usedialog";
import {Component, computed, ComputedRef, defineAsyncComponent, inject, watch} from "vue";
import {usePage} from "@inertiajs/vue3";

interface IParsedModal {
    component: string
    title: string
    cleanOnClose: boolean
}

const page = usePage()
const modal: ComputedRef<string> = computed(() => page.props.flash.modal)
const dialog = useDialog();
const dialogRef: any = inject('dialogRef');

watch(modal, () => {

    if (modal.value) {
        const modalParsed: IParsedModal = JSON.parse(modal.value)
        const openDialog = (component: Component, title: string) => {
            dialog.open(component, {
                props: {
                    header: title,
                    style: {
                        width: '30vw',
                    },
                    breakpoints: {
                        '960px': '60vw',
                        '640px': '90vw'
                    },
                    modal: true
                },
                onClose: () => {
                    if (modalParsed.cleanOnClose) page.props.flash.modal = null
                },
                onOpen: () => {
                    console.log(dialogRef)

                }
            })
        };

        openDialog(defineAsyncComponent(() => import(`../Modal/${modalParsed.component}.vue`)), modalParsed.title)
    }
})
</script>

<template>
    <DynamicDialog/>
</template>

<style scoped>

</style>
