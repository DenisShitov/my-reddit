import {usePage} from "@inertiajs/vue3";
import {computed, ComputedRef} from "vue";

export function useAuth() {

    const page = usePage()

    const isAuth: ComputedRef<boolean> = computed(() => !!page.props.auth.user)

    return {
        isAuth
    }
}
