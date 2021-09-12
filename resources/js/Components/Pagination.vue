<template>
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-600 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-700" v-if="links.length > 3">
        <span class="flex items-center col-span-3">
            Mostrando {{ from }}-{{ to }} de {{ total }}
        </span>
        <span class="col-span-2"></span>
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <li v-for="(link, k) in links" :key="k">
                        <div v-if="link.url === null"  class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-blue" v-html="link.label"/>
                        <Link v-else class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-blue" :class="{ 'bg-blue-700 text-white': link.active }" :href="link.url" v-html="link.label" />
                    </li>
                </ul>
            </nav>
        </span>
    </div>
</template>

<script>
    import { Link } from '@inertiajs/inertia-vue3'
    export default {
        props: {
            links: Array,
            total: Number,
            to: Number,
            from: Number
        },
        components: {
            Link
        }
    }
</script>
