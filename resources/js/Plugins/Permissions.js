import { usePage } from '@inertiajs/inertia-vue3'
export default {
    install: (app) => {
        app.mixin({
            mounted(){
                let authRoles = usePage().props.value.auth;
                let authPermissions;
                if(authRoles !== null){
                    authRoles = usePage().props.value.auth.roles;
                    authPermissions = usePage().props.value.auth.permisos;
                    this.$gates.setRoles(authRoles);
                    this.$gates.setPermissions(authPermissions);
                }
            }
        })
    }
}
