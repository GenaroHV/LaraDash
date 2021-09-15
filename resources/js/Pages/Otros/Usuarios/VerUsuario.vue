<template>
    <LaraDashLayout>
        <Head title="Mi perfil"/>
        <div class="flex justify-between mb-2">
            <h2 class="my-3 text-2xl font-semibold text-gray-600 dark:text-gray-200">
                Mi Perfil
            </h2>
            <button onclick="history.back()">retornar</button>
        </div>
        <GitHub/>
        <div class="flex flex-col flex-wrap sm:flex-row">
            <!-- Perfil -->
            <div class="w-full sm:w-1/2 xl:w-1/4">
                <div class="mb-4 sm:mr-2 xl:mr-2">
                    <form class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                        <div class="block">
                            <input type="file" accept="image/*" class="hidden" ref="file" @change="actualizaFotoPrevia">
                            <label class="laradash-label" for="foto" value="Foto">Foto</label>
                            <div v-show="!fotoPrevia">
                                <img v-if="!usuario.profile_photo_path" :src="usuario.profile_photo_url" :alt="usuario.name" class="rounded-full h-20 w-20 object-cover">
                                <img v-else :src="`/storage/${usuario.profile_photo_path}`" :alt="usuario.name" class="rounded-full h-20 w-20 object-cover">
                            </div>
                            <!-- Foto de perfil actual -->
                            <div class="mt-2" v-show="fotoPrevia">
                                <span class="block rounded-full w-20 h-20"
                                    :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + fotoPrevia + '\');'">
                                </span>
                            </div>
                            <div class="flex">
                                <button class="btn-gray mt-2 mr-2 !p-1 !text-xs" type="button" @click.prevent="seleccionarNuevaFoto">
                                    Seleccionar imagen
                                </button>
                                <button type="button" class="btn-red mt-2 !p-1 !text-xs" @click.prevent="eliminarFoto" v-if="formUsuario.photo">
                                    <svg fill="currentColor" class="h-4 w-4" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="block">
                            <label class="laradash-label">Nombre</label>
                            <input class="laradash-input" type="text" v-model="formUsuario.name">
                        </div>
                        <div class="block">
                            <label class="laradash-label">Correo</label>
                            <input class="laradash-input" type="email" v-model="formUsuario.email">
                        </div>
                        <br>
                        <button class="btn-blue !text-xs" @click.prevent="actualizarInformacionPerfil">Actualizar perfil</button>
                    </form>
                </div>
            </div>
            <!-- Roles -->
            <div class="w-full sm:w-1/2 xl:w-1/4">
                <div class="mb-4 sm:ml-2 xl:mx-2">
                    <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                        <h3 class="text-gray-700 dark:text-gray-300">Roles</h3>
                        <div class="block" v-for="r in paramsRol" :key="r.id">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="rounded" v-model="r.checked" :id="r.id"/>
                                <span class="laradash-label uppercase ml-2">{{ r.name }}</span>
                            </label>
                            <div class="flex flex-wrap mb-2">
                                <span class="w-1/3 text-xs dark:text-gray-400" v-for="p in r.permissions" :key="p.id">{{p.name}}</span>
                            </div>
                        </div>
                        <br>
                        <button class="btn-blue !text-xs" @click.prevent="actualizarRoles">Actualizar roles</button>
                    </div>
                </div>
            </div>
            <!-- Permisos -->
            <div class="w-full sm:w-1/2 xl:w-1/4">
                <div class="mb-4 sm:mr-2 xl:mx-2">
                    <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                        <h3 class="text-gray-700 dark:text-gray-300">Permisos</h3>
                        <div class="flex flex-wrap">
                            <div class="w-1/2" v-for="p in paramsPermission" :key="p.id">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" class="rounded" v-model="p.checked" :id="p.id"/>
                                    <span class="laradash-label ml-2">{{ p.name }}</span>
                                </label>
                            </div>
                        </div>
                        <br>
                        <button class="btn-blue !text-xs" @click.prevent="actualizarPermisos">Actualizar permisos</button>
                    </div>
                </div>
            </div>
            <!-- Contraseña -->
            <div class="w-full sm:w-1/2 xl:w-1/4">
                <div class="mb-4 sm:ml-2 xl:ml-2">
                    <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                        <!-- <div class="block">
                            <label class="laradash-label">Contraseña actual</label>
                            <input class="laradash-input" type="password" v-model="formPass.passwordCurrent">
                        </div> -->
                        <div class="block">
                            <label class="laradash-label">Nueva contraseña</label>
                            <input class="laradash-input" type="password" v-model="formPass.passwordNew" placeholder="Escribir la nueva contraseña">
                        </div>
                        <div class="block">
                            <label class="laradash-label">Confirmar contraseña</label>
                            <input class="laradash-input" type="password" v-model="formPass.passwordConfirm" placeholder="Repite la contraseña">
                            <div v-if="errorPassword" class="text-xs text-red-600">
                                {{ errorPassword }}
                            </div>
                        </div>
                        <br>
                        <button class="btn-blue !text-xs" @click.prevent="actualizarPassword" :disabled="!estadoBoton" :class="estadoBoton === false ? '!bg-opacity-50 cursor-not-allowed':''">Actualizar contraseña</button>
                    </div>
                </div>
            </div>
        </div>
    </LaraDashLayout>
</template>

<script setup>
    import LaraDashLayout from '@/Layouts/Laradash'
    import { Head, useForm } from '@inertiajs/inertia-vue3'
    import GitHub from '@/Components/GitHub'
    import { Inertia } from '@inertiajs/inertia'
    import { ref, toRefs, onMounted, watch } from 'vue'
    const props = defineProps({
        usuario: Object,
        roles: Object,
        permissions: Object
    })
    // Perfil de usuario
    const usuario = props.usuario[0]
    const formUsuario = useForm({
        id: usuario.id,
        name: usuario.name,
        email: usuario.email,
        photo: usuario.profile_photo_path
    })
    const file = ref('')
    const fotoPrevia = ref('')
    const actualizarInformacionPerfil = () => {
        if(file.value){
            formUsuario.photo = fotoPrevia.value
        }
        Inertia.post(route('usuario.perfil.actualizar'),{
            formUsuario
        })
    }
    const seleccionarNuevaFoto = () => {
        file.value.click();
    }
    const actualizaFotoPrevia = () => {
        const foto = file.value.files[0];
        if (! foto) return;
        const reader = new FileReader();
        reader.onload = (e) => {
            fotoPrevia.value = e.target.result;
        };
        reader.readAsDataURL(foto);
    }
    const eliminarFoto = () => {
        Inertia.post(route('usuario.perfil.eliminarFoto'), {formUsuario},{
            onSuccess: () => {
                fotoPrevia.value = ''
                formUsuario.photo = ''
            },
            onError: errors => {
                console.log(errors)
            }
        })
    }
    // Roles
    const roles = toRefs(props).roles
    const paramsRol = ref()
    onMounted(() => {
        let r = roles.value.map( r => ({id: r.id, checked: tieneRol(r.id), name: r.name, permissions: r.permissions}))
        paramsRol.value = r
    })
    const tieneRol = (id) => {
        return usuario.roles.find((paramRoles) => paramRoles.id === id) !== undefined
    }
    const actualizarRoles = () => {
        Inertia.post(route('usuario.perfil.roles'), {roles: paramsRol.value, usuario: formUsuario.id})
    }
    // Permisos
    const permissions = toRefs(props).permissions
    const paramsPermission = ref()
    onMounted(() => {
        let r = permissions.value.map( r => ({id: r.id, checked: tienePermiso(r.id), name: r.name}))
        paramsPermission.value = r
    })
    const tienePermiso = (id) => {
        return usuario.permissions.find((paramPermisos) => paramPermisos.id === id) !== undefined
    }
    const actualizarPermisos = () => {
        Inertia.post(route('usuario.perfil.permisos'), {permisos: paramsPermission.value, usuario: formUsuario.id})
    }
    // Actualizar contraseña
    const formPass = useForm({
        // passwordCurrent: '',
        passwordNew: '',
        passwordConfirm: ''
    })
    const errorPassword = ref('')
    const estadoBoton = ref(false)
    const actualizarPassword = () => {
        console.log(formPass)
        Inertia.post(route('usuario.perfil.password'), {formPass, usuario: formUsuario.id})
    }
    watch(
        () => formPass.passwordNew,
        (before, after) => {
            if(formPass.passwordNew.length >= 8){
                errorPassword.value = ""
            }else{
                errorPassword.value = "La contraseña debe tener de 8 digitos a más"
                estadoBoton.value = false
            }
        }
    )
    watch(
        () => formPass.passwordConfirm,
        (before, after) => {
            if(formPass.passwordConfirm == formPass.passwordNew){
                errorPassword.value = ""
                estadoBoton.value = true
            }else{
                errorPassword.value = "Las contraseñas no son iguales"
                estadoBoton.value = false
            }
        }
    )
</script>
