<template>
    <LaraDashLayout>
        <Head title="Usuarios"/>
        <div class="flex justify-between mb-2">
            <h2 class="dark:text-white">Usuarios</h2>
            <button v-role="'super admin'" class="btn-blue">Crear</button>
        </div>
        <LaraDashTable class="mb-6">
            <template #col>
                <th class="px-4 py-3 text-xs">ID</th>
                <th class="px-4 py-3 text-xs">Nombre</th>
                <th class="px-4 py-3 text-xs">Correo</th>
                <th class="px-4 py-3 text-xs">Roles</th>
                <th class="px-4 py-3 text-xs">Acciones</th>
            </template>
            <template #row>
                <tr class="text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-300" v-for="u in usuarios" :key="u.id">
                    <td class="px-4 py-1 text-xs">{{ u.id }}</td>
                    <td class="px-4 py-1 text-xs">{{ u.name }}</td>
                    <td class="px-4 py-1 text-xs">{{ u.email }}</td>
                    <td class="px-4 py-1 text-xs">
                        <span v-for="r in u.roles" :key="r.id" class="text-gray-600 dark:text-gray-400 bg-gray-300 dark:bg-gray-900 mr-1 px-1 rounded">
                            {{ r.name }}
                        </span>
                    </td>
                    <td class="px-4 py-1 text-xs">
                        <Link class="mx-1" :href="route('usuario.perfil', {id: u.id})">
                            editar
                        </Link>
                        <span class="mx-1">eliminar</span>
                    </td>
                </tr>
            </template>
        </LaraDashTable>
    </LaraDashLayout>
</template>

<script setup>
    // importaciones
    import LaraDashLayout from '@/Layouts/Laradash'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import LaraDashTable from '@/Components/Table'
    // declaraciones
    const props = defineProps({
        usuarios: Object
    })
    const usuarios = props.usuarios
</script>
