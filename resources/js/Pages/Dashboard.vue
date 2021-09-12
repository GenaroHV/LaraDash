<template>
    <LaraDashLayout>
        <Head title="Dashboard"/>
        <h2 class="my-3 text-2xl font-semibold text-gray-600 dark:text-gray-200">
            Dashboard
        </h2>
        <GitHub/>
    </LaraDashLayout>
</template>

<script setup>
    import LaraDashLayout from '@/Layouts/Laradash'
    import { Head } from '@inertiajs/inertia-vue3'
    import GitHub from '@/Components/GitHub'
</script>
