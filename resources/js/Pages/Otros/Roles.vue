<template>
    <LaraDashLayout>
        <Head title="Roles"/>
        <div class="flex justify-between mb-2">
            <h2 class="my-3 text-2xl font-semibold text-gray-600 dark:text-gray-200">
                Roles
            </h2>
            <button v-role="'super admin'" @click="modalCrearRol" class="btn-blue my-2">+</button>
        </div>
        <GitHub/>
        <LaraDashTable class="mb-6">
            <template #col>
                <th class="px-4 py-3 text-xs">ID</th>
                <th class="px-4 py-3 text-xs">Nombre</th>
                <th class="px-4 py-3 text-xs">Guardian</th>
                <th class="px-4 py-3 text-xs">Permisos</th>
                <th class="px-4 py-3 text-xs">Acción</th>
            </template>
            <template #row>
                <tr class="text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-300" v-for="r in roles" :key="r.id">
                    <td class="px-4 py-1 text-xs">{{ r.id }}</td>
                    <td class="px-4 py-1 text-xs">{{ r.name }}</td>
                    <td class="px-4 py-1 text-xs">{{ r.guard_name }}</td>
                    <td class="px-4 py-1 text-xs">
                        <span v-for="p in r.permissions" :key="p.id" class="text-gray-600 dark:text-gray-400 bg-gray-300 dark:bg-gray-900 mr-1 px-1 rounded">
                            {{ p.name }}
                        </span>
                    </td>
                    <td class="px-4 py-1 text-xs flex justify-between w-32">
                        <template v-if="r.id === 1">
                            <button v-role="'super admin'" class="hover:text-blue-600" @click="modalEditarRole(r)">Editar</button>
                            <button v-role="'super admin'" class="hover:text-red-600" @click="eliminarRol(r.id)">Eliminar</button>
                        </template>
                        <template v-else>
                            <button class="hover:text-blue-600" @click="modalEditarRole(r)">Editar</button>
                            <button class="hover:text-red-600" @click="eliminarRol(r.id)">Eliminar</button>
                        </template>
                    </td>
                </tr>
            </template>
        </LaraDashTable>
        <!-- Crear -->
        <JetDialogModal v-if="modalEstadoCrear == true" :show="modalEstadoCrear" @close="modalEstadoCrear = false" max-width="xl">
            <template #title>
                crear
            </template>
            <template #content>
                <form class="flex flex-col" @submit.prevent="grabarRol">
                    <label class="block mx-1">
                        <span class="laradash-label">Nombre:</span>
                        <input class="laradash-input" v-model="form.name">
                    </label>
                    <label class="block mx-1">
                        <span class="laradash-label">Permisos:</span>
                        <div class="flex flex-wrap">
                            <div class="w-1/3" v-for="p in permissions" :key="p.id">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" v-model="form.permissions" class="form-checkbox rounded" :value="p.id">
                                    <span class="ml-2">{{ p.name }}</span>
                                </label>
                            </div>
                        </div>
                    </label>
                    <button class="btn-blue mt-2">Grabar</button>
                </form>

            </template>
        </JetDialogModal>
        <!-- Editar -->
        <JetDialogModal v-if="modalEstadoEditar == true" :show="modalEstadoEditar" @close="modalEstadoEditar = false" max-width="lg">
            <template #title>
                editar
            </template>
            <template #content>
                <form class="flex flex-col" @submit.prevent="actualizarRole(paramsRol)">
                    <label class="block mx-1">
                        <span class="laradash-label">Nombre:</span>
                        <input class="laradash-input" v-model="paramsRol.name">
                    </label>
                    <label class="block mx-1">
                        <span class="laradash-label">Permisos:</span>
                        <div class="flex flex-wrap">
                            <div class="w-1/3" v-for="p in paramsPermissions" :key="p.id">
                                <label class="inline-flex items-center">
                                    <input type="checkbox" v-model="p.checked" class="rounded" :id="p.id"/>
                                    <span class="ml-2" :for="p.id">{{ p.name }}</span>
                                </label>
                            </div>
                        </div>
                    </label>
                    <button class="btn-blue mt-2">Grabar</button>
                </form>
            </template>
        </JetDialogModal>
    </LaraDashLayout>
</template>

<script setup>
    // importaciones
    import LaraDashLayout from '@/Layouts/Laradash'
    import { Head } from '@inertiajs/inertia-vue3'
    import LaraDashTable from '@/Components/Table'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import GitHub from '@/Components/GitHub'
    import { ref, toRefs, computed } from 'vue'
    import { Inertia } from '@inertiajs/inertia'
    import { useForm, usePage } from '@inertiajs/inertia-vue3'

    // declaraciones
    const props = defineProps({ roles: Object, permissions: Object })
    const roles = toRefs(props).roles
    const permissions = toRefs(props).permissions
    const paramsRol = ref([])
    const paramsPermissions = ref([])
    const form = useForm({
        id: '',
        name: '',
        permissions: []
    })
    const mensaje = computed(() => usePage().props.value.flash.success)
    const modalEstadoCrear = ref(false)
    const modalEstadoEditar = ref(false)

    // métodos
    const modalCrearRol = () => {
        form.reset()
        modalEstadoCrear.value = true
    }

    const grabarRol = () => {
        Inertia.post(route('roles.store'), form, {
            preserveScroll:true,
            onSuccess: () => {
                form.reset()
                modalEstadoCrear.value = false
            },
            onError: errors => {
                console.log(errors)
            }
        })
    }

    const modalEditarRole = (rol) => {
        form.reset()
        paramsRol.value = rol
        modalEstadoEditar.value = true

        let p = permissions.value.map( p => ({id: p.id, checked: tienePermiso(p.id), name: p.name}) )
        paramsPermissions.value = p
    }

    const tienePermiso = (id) => {
        return paramsRol.value.permissions.find((paramPermission) => paramPermission.id === id) !== undefined
    }

    const actualizarRole = (params) => {
        Inertia.put(route('roles.update', params.id),{params, permisos: paramsPermissions.value},{
            onSuccess: () => {
                paramsRol.value = []
                modalEstadoEditar.value = false
                console.log("rol actualizado")
            },
            onError: errors => {
                console.log(errors)
            }
        })
    }

    const eliminarRol = (id) => {
        Inertia.delete(route('roles.destroy', id),{
            onSuccess: () => {
                console.log("rol eliminado")
            },
            onError: errors => {
                console.log(errors)
            }
        })
    }
</script>
