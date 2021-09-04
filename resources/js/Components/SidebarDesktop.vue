<template>
    <nav class="mt-6">
        <div>
            <p class="p-3 text-xs uppercase text-gray-400">General</p>
            <a class="w-full font-thin uppercase text-blue-500 flex items-center p-3 transition-colors duration-200 justify-start bg-gradient-to-r from-white to-blue-100 border-r-4 border-blue-500 dark:from-gray-700 dark:to-gray-800" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Dashboard
                </span>
            </a>
            <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-3 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Projects
                </span>
            </a>
            <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-3 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    My tasks
                </span>
            </a>
            <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-3 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Calendar
                </span>
            </a>
            <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-3 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Time manage
                </span>
            </a>
            <p class="p-3 text-xs uppercase text-gray-400">Reportes</p>
            <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-3 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Reports
                </span>
            </a>
            <a class="w-full font-thin uppercase text-gray-500 dark:text-gray-200 flex items-center p-3 transition-colors duration-200 justify-start hover:text-blue-500" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Settings
                </span>
            </a>
        </div>
    </nav>
</template>

<script setup>
import IconItem from '@/Icons/Item'
</script>

<style>

</style>
