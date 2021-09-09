<template>
    <nav class="mt-6">
        <div class="flex flex-col w-full">
            <Link :href="route('dashboard')" class="w-full justify-start"
                :class="$page.url === '/dashboard' ? 'linkClassActive' : 'linkClass'">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Dashboard
                </span>
            </Link>
            <p class="p-3 text-xs uppercase text-gray-400">EXAMPLES</p>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    CHARTS
                </span>
            </Link>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    CALENDARIO
                </span>
            </Link>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    PUNTO DE VENTA
                </span>
            </Link>
            <p class="p-3 text-xs uppercase text-gray-400">CRUD</p>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    CRUD INERTIA JS
                </span>
            </Link>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    CRUD VUE JS 3.2
                </span>
            </Link>
            <Link class="w-full justify-start linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    CRUD VUE JS REFACTOR
                </span>
            </Link>
            <p class="p-3 text-xs uppercase text-gray-400">Others</p>
            <Link :href="route('usuarios.index')" class="w-full justify-start"
                :class="$page.url === '/usuarios' ? 'linkClassActive' : 'linkClass'">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Usuarios
                </span>
            </Link>
            <Link :href="route('roles.index')" class="w-full justify-start"
                :class="$page.url === '/roles' ? 'linkClassActive' : 'linkClass'">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Roles
                </span>
            </Link>
            <Link :href="route('permisos.ver')" class="w-full justify-start"
                :class="$page.url === '/permisos' ? 'linkClassActive' : 'linkClass'">
                <span class="text-left">
                    <IconItem/>
                </span>
                <span class="mx-4 text-xs font-normal">
                    Permisos
                </span>
            </Link>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import IconItem from '@/Icons/Item'
</script>

