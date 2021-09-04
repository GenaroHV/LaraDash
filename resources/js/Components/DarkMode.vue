<template>
    <div class="w-full h-full flex flex-col justify-center items-center">
        <div class="flex justify-center items-center">
            <div class="w-10 h-6 flex items-center bg-gray-300 rounded-full mx-1 px-1 cursor-pointer"
                :class="{'dark:bg-gray-600':theme === 'dark'}" @click="toggleTheme">
                <div class="bg-white w-4 h-4 rounded-full shadow-md transform transition duration-700 ease-out" :class="{'translate-x-4 dark:bg-gray-700':theme === 'dark'}">
                    <span v-if="theme === 'dark'">
                        <svg class="h-4 w-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 11.807A9.002 9.002 0 0 1 10.049 2a9.942 9.942 0 0 0-5.12 2.735c-3.905 3.905-3.905 10.237 0 14.142 3.906 3.906 10.237 3.905 14.143 0a9.946 9.946 0 0 0 2.735-5.119A9.003 9.003 0 0 1 12 11.807z"></path>
                        </svg>
                    </span>
                    <span v-else>
                        <svg class="h-4 w-4 text-yellow-500" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue'
const theme = ref('')

onMounted(() => {
    const userPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
    const defaultTheme = userPrefersDark ? 'dark' : 'light'
    theme.value = localStorage.getItem('theme') || defaultTheme
    setTheme(theme.value)
})

const toggleTheme = () => {
    const newTheme = theme.value === 'light' ? 'dark' : 'light'
    setTheme(newTheme)
}
const setTheme = (newTheme) => {
    theme.value= newTheme
    if (theme.value === 'dark') {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
    localStorage.setItem('theme', newTheme)
}
</script>

<style>

</style>
