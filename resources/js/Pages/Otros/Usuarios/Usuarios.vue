<template>
    <LaraDashLayout>
        <Head title="Usuarios"/>
        <div class="flex justify-between mb-2">
            <h2 class="my-3 text-2xl font-semibold text-gray-600 dark:text-gray-200">
                Usuarios
            </h2>
            <button v-role="'super admin'" @click="abrirModal" class="btn-blue my-2">+</button>
        </div>
        <GitHub/>
        <div class="flex flex-wrap mb-4">
            <label class="w-full text-sm mx-1">
                <input class="laradash-input" placeholder="Buscar..." v-model.trim="buscar" type="text" @keyup.enter="realizarBusqueda">
            </label>
        </div>
        <LaraDashTable class="mb-6">
            <template #col>
                <th class="px-4 py-3 text-xs">ID</th>
                <th class="px-4 py-3 text-xs">Nombre</th>
                <th class="px-4 py-3 text-xs">Correo</th>
                <th class="px-4 py-3 text-xs">Roles</th>
                <th class="px-4 py-3 text-xs">Permisos</th>
                <th class="px-4 py-3 text-xs">Acciones</th>
            </template>
            <template #row>
                <tr class="text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-300" v-for="u in usuarios.data" :key="u.id">
                    <td class="px-4 py-1 text-xs">{{ u.id }}</td>
                    <td class="px-4 py-1 text-xs">{{ u.name }}</td>
                    <td class="px-4 py-1 text-xs">{{ u.email }}</td>
                    <td class="px-4 py-1 text-xs">
                        <div class="flex flex-col">
                            <span v-for="r in u.roles" :key="r.id" class="text-gray-600 dark:text-gray-400 bg-gray-300 dark:bg-gray-900 mr-1 mb-1 px-1 rounded">
                                {{ r.name }}
                            </span>
                        </div>
                    </td>
                    <td class="px-4 py-1 text-xs">
                        <div class="flex flex-wrap">
                            <span v-for="p in u.permissions" :key="p.id" class="text-gray-600 dark:text-gray-400 bg-gray-300 dark:bg-gray-900 mr-1 mb-1 px-1 rounded">
                                {{ p.name }}
                            </span>
                        </div>
                    </td>
                    <td class="px-4 py-1 text-xs">
                        <template v-if="u.id === 1">
                            <Link v-role="'super admin'" class="mx-1" :href="route('usuario.perfil', {id: u.id})">
                                editar
                            </Link>
                        </template>
                        <template v-else>
                            <Link class="mx-1" :href="route('usuario.perfil', {id: u.id})">
                                editar
                            </Link>
                            <button class="mx-1" @click.prevent="eliminarUsuario(u.id)">
                                eliminar
                            </button>
                        </template>
                    </td>
                </tr>
            </template>
            <template #pagination>
                <LaraDashPagination :links="usuarios.links" :total="usuarios.total" :to="usuarios.to" :from="usuarios.from"/>
            </template>
        </LaraDashTable>
        <JetDialogModal v-if="estadoModal == true" :show="estadoModal" @close="estadoModal = false" max-width="md">
            <template #title>
                Crear nuevo usuario
            </template>
            <template #content>
                <form class="flex flex-col" @submit.prevent="grabarUsuario">
                    <label class="block mx-1">
                        <span class="laradash-label">Nombre:</span>
                        <input class="laradash-input" v-model="formUsuario.name">
                        <div class="text-red-600 text-xs" v-if="error.name">{{ error.name }}</div>
                    </label>
                    <label class="block mx-1">
                        <span class="laradash-label">Correo:</span>
                        <input class="laradash-input" v-model="formUsuario.email">
                        <div class="text-red-600 text-xs" v-if="error.email">{{ error.email }}</div>
                    </label>
                    <button class="btn-blue mt-4" :disabled="!estadoBoton" :class="estadoBoton === false ? '!bg-opacity-50 cursor-not-allowed':''">Grabar</button>
                </form>
            </template>
        </JetDialogModal>
    </LaraDashLayout>
</template>

<script setup>
    // importaciones
    import LaraDashLayout from '@/Layouts/Laradash'
    import LaraDashTable from '@/Components/Table'
    import LaraDashPagination from "@/Components/Pagination"
    import GitHub from '@/Components/GitHub'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import { Inertia } from '@inertiajs/inertia'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import { reactive, ref, watch, toRefs } from 'vue'
    // declaraciones
    const props = defineProps({
        usuarios: Object,
        filtro: String
    })
    const formUsuario = reactive({
        name: '',
        email: '',
        password: '12345678'
    })
    const error = reactive({
        name: '',
        email: ''
    })
    const buscar = ref(props.filtro)
    const usuarios = toRefs(props).usuarios
    const estadoModal = ref(false)
    const estadoBoton = ref(false)

    const realizarBusqueda = () => {
        Inertia.get(route('usuarios.index'),{
                buscar: buscar.value
            }
        )
    }

    const abrirModal = () => {
        estadoModal.value = true
    }

    const grabarUsuario = () => {
        Inertia.post(route('usuarios.store'), formUsuario,{
            onSuccess: () => {
                estadoModal.value = false
                formUsuario.name = ''
                formUsuario.email = ''
                formUsuario.password = ''
                error.name = ''
                error.email = ''
            },
            onError: errors => {
                error.name = errors.name
                error.email = errors.email
            }
        })
    }

    const eliminarUsuario = (id) => {
        Inertia.delete(route('usuarios.destroy', id), {
            onSuccess: () => {
                console.log("muy bien", id)
            },
            onError: errors => {
                console.log(errors)
            }
        })
    }

    watch(
        () => formUsuario.email,
        () => {
            if(formUsuario.name != null && formUsuario.email != null){
                estadoBoton.value = true
            }
        }
    )
</script>
