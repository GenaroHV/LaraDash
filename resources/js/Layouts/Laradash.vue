<template>
    <main class="bg-gray-100 dark:bg-gray-800 h-screen overflow-hidden relative">
        <div class="flex items-start justify-between">
            <!-- add class hidden -->
            <div class="h-screen hidden md:block pb-8 mt-4 ml-4 relative" :class="estadoMenu ? 'w-72':'w-16'">
                <div class="bg-white h-full rounded-2xl dark:bg-gray-700 shadow-lg">
                    <div class="flex items-center justify-center pt-6">
                        <Link :href="route('dashboard')" v-if="estadoMenu">
                            <span class="text-gray-500 dark:text-white font-black text-xl">Lara<span class="text-blue-500">Dash</span></span>
                        </Link>
                        <Link :href="route('dashboard')" v-else>
                            <span class="text-gray-500 dark:text-white font-black text-xl">L<span class="text-blue-500">D</span></span>
                        </Link>
                    </div>
                    <LaraSidebarDesktop v-if="estadoMenu"/>
                    <LaraSidebarNormal v-else/>
                </div>
            </div>
            <div class="flex flex-col w-full p-2 md:p-4 md:space-y-4">
                <LaraHeader @menu="abrirMenu" @mobil="abrirMenuMobil"/>
                <LaraSidebarDesktop class="flex md:hidden shadow-xl rounded-md bg-white dark:bg-gray-700" v-if="estadoMenuMobil"/>
                <!-- <LaraSidebarMobil v-if="estadoMenuMobil"/> -->
                <div class="overflow-auto h-screen pb-24 pt-4 md:pt-0 md:pr-0 md:pl-0">
                    <slot></slot>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import LaraSidebarDesktop from '@/Components/SidebarDesktop'
import LaraSidebarNormal from '@/Components/SidebarNormal'
import LaraSidebarMobil from '@/Components/SidebarMobil'
import LaraHeader from '@/Components/Header'
import { Link } from '@inertiajs/inertia-vue3';
import { ref } from 'vue'
const estadoMenu = ref(false)
const estadoMenuMobil = ref(false)
const abrirMenu = () => {
    estadoMenu.value = !estadoMenu.value
}
const abrirMenuMobil = () => {
    estadoMenuMobil.value = !estadoMenuMobil.value
}
</script>

<style>

</style>
