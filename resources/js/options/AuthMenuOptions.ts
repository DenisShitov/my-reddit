import {MenuItem} from "primevue/menuitem";
import {router} from "@inertiajs/vue3";

const items: MenuItem = [
    {
        label: 'Регистрация',
        icon: 'pi pi-user-plus',
        command: () => {
            router.get(route('register'))
        }
    },
    // {
    //     label: 'Сброс пароля',
    //     icon: 'pi pi-upload',
    //     command: () => {
    //         router.get(route('register'))
    //     }
    // }
];

export default items;
