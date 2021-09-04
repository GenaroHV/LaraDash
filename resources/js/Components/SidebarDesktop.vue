<template>
    <nav class="mt-6">
        <div>
            <p class="p-3 text-xs uppercase text-gray-400">General</p>
            <Link :href="route('dashboard')" class="w-full justify-start"
                :class="$page.url === '/dashboard' ? 'linkClassActive' : 'linkClass'">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Dashboard
                </span>
            </Link>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Projects
                </span>
            </Link>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    My tasks
                </span>
            </Link>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Calendar
                </span>
            </Link>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Time manage
                </span>
            </Link>
            <p class="p-3 text-xs uppercase text-gray-400">Reportes</p>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Reports
                </span>
            </Link>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Settings
                </span>
            </Link>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import IconItem from '@/Icons/Item'
</script>

