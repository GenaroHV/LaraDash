<template>
    <header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40">
        <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
            <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
                <div class="container relative left-0 z-50 flex w-2/4 h-auto">
                    <div class="flex justify-center items-center w-6 h-full m-2">
                        <div class="hidden md:block">
                            <svg viewBox="0 0 24 24" class="w-6 h-6 cursor-pointer text-gray-400 dark:text-white transition duration-500 ease-out" @click="abriMenu" :class="estadoMenuIcon ? 'rotate-180':''">
                                <path fill="currentColor" d="M19,13H3V11H19L15,7L16.4,5.6L22.8,12L16.4,18.4L15,17L19,13M3,6H13V8H3V6M13,16V18H3V16H13Z"></path>
                            </svg>
                        </div>
                        <div class="flex md:hidden">
                            <svg iewBox="0 0 20 20" class="w-6 h-6 cursor-pointer text-gray-400 dark:text-white" fill="currentColor" @click="emit('mobil')">
                                <path fillRule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clipRule="evenodd" />
                            </svg>
                        </div>

                    </div>
                </div>
                <div class="relative p-1 flex items-center justify-end w-2/4 sm:mx-4">
                    <!-- Toggle dark mode -->
                    <div>
                        <DarkMode/>
                    </div>
                    <!-- Configuración de usuario -->
                    <div class="ml-1 md:ml-2 relative">
                        <jet-dropdown align="right" width="48">
                            <template #trigger>
                                <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img v-if="!$page.props.user.profile_photo_path" class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                    <img v-else class="h-8 w-8 rounded-full object-cover" :src="`/storage/${$page.props.user.profile_photo_path}`" :alt="$page.props.user.name" />
                                </button>

                                <span v-else class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ $page.props.user.name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Administrar cuenta
                                </div>

                                <jet-dropdown-link :href="route('profile.show')">
                                    Perfil
                                </jet-dropdown-link>

                                <jet-dropdown-link :href="route('api-tokens.index')" v-if="$page.props.jetstream.hasApiFeatures">
                                    API Tokens
                                </jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form @submit.prevent="logout">
                                    <jet-dropdown-link as="button">
                                        Salir
                                    </jet-dropdown-link>
                                </form>
                            </template>
                        </jet-dropdown>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script setup>
import DarkMode from '@/Components/DarkMode'
import JetDropdown from '@/Jetstream/Dropdown'
import JetDropdownLink from '@/Jetstream/DropdownLink'
import { Inertia } from '@inertiajs/inertia'
import { ref } from 'vue'
const emit = defineEmits(['menu','mobil'])
const estadoMenuIcon = ref(true)
const abriMenu = () => {
    emit('menu')
    estadoMenuIcon.value = !estadoMenuIcon.value
}

const logout = () => {
    Inertia.post(route('logout'));
}
</script>


<style>

</style>
