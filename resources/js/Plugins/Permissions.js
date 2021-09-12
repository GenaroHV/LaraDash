import { usePage } from '@inertiajs/inertia-vue3'
export default {
    install: (app, options) => {
        app.mixin({
            mounted(){
                const authRoles = usePage().props.value.auth.roles;
                const authPermissions = usePage().props.value.auth.permisos;
                this.$gates.setRoles(authRoles);
                this.$gates.setPermissions(authPermissions);
            }
        })
    }
}
