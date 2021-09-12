<template>
    <LaraDashLayout>
        <Head title="Permisos"/>
        <div class="flex justify-between mb-2">
            <h2 class="my-3 text-2xl font-semibold text-gray-600 dark:text-gray-200">
                Permisos
            </h2>
        </div>
        <GitHub/>
        <LaraDashTable class="mb-6">
            <template #col>
                <th class="px-4 py-3 text-xs">ID</th>
                <th class="px-4 py-3 text-xs">Nombre</th>
                <th class="px-4 py-3 text-xs">Guardian</th>
            </template>
            <template #row>
                <tr class="text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-gray-300" v-for="p in permisos" :key="p.id">
                    <td class="px-4 py-1 text-xs">{{ p.id }}</td>
                    <td class="px-4 py-1 text-xs">{{ p.name }}</td>
                    <td class="px-4 py-1 text-xs">{{ p.guard_name }}</td>
                </tr>
            </template>
        </LaraDashTable>
    </LaraDashLayout>
</template>

<script setup>
    // importaciones
    import LaraDashLayout from '@/Layouts/Laradash'
    import { Head } from '@inertiajs/inertia-vue3'
    import LaraDashTable from '@/Components/Table'
    import GitHub from '@/Components/GitHub'
    // declaraciones
    const props = defineProps({
        permisos: Object
    })
    const permisos = props.permisos
</script>
