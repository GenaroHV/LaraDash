<template>
    <nav class="mt-6">
        <div>
            <Link :href="route('dashboard')" class="w-16 justify-center has-tooltip"
                :class="$page.url === '/dashboard' ? 'linkClassActive' : 'linkClass'">
                <span class="text-left">
                    <span class='tooltip'>Dashboard</span>
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center has-tooltip linkClass" href="#">
                <span class="text-left">
                    <span class='tooltip'>Gráficos</span>
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center has-tooltip linkClass" href="#">
                <span class="text-left">
                    <span class='tooltip'>Calendario</span>
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center has-tooltip linkClass" href="#">
                <span class="text-left">
                    <span class='tooltip'>Tareas</span>
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center has-tooltip linkClass" href="#">
                <span class="text-left">
                    <span class='tooltip'>Crud Inertia.js</span>
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center has-tooltip linkClass" href="#">
                <span class="text-left">
                    <span class='tooltip'>Crud vue.js 3.2</span>
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center has-tooltip linkClass" href="#">
                <span class="text-left">
                    <span class='tooltip'>Crud vue.js refactor</span>
                    <IconItem/>
                </span>
            </Link>
            <Link :href="route('usuarios.index')" class="w-16 justify-center has-tooltip linkClass"
                :class="$page.url === '/usuarios' ? 'linkClassActive' : 'linkClass'">
                <span class="text-left">
                    <span class='tooltip'>Usuarios</span>
                    <IconItem/>
                </span>
            </Link>
            <Link :href="route('roles.index')" class="w-16 justify-center has-tooltip"
                :class="$page.url === '/roles' ? 'linkClassActive' : 'linkClass'">
                <span class="text-left">
                    <span class='tooltip'>Roles</span>
                    <IconItem/>
                </span>
            </Link>
            <Link :href="route('permisos.ver')" class="w-16 justify-center has-tooltip"
                :class="$page.url === '/permisos' ? 'linkClassActive' : 'linkClass'">
                <span class="text-left">
                    <span class='tooltip'>Permisos</span>
                    <IconItem/>
                </span>
            </Link>
        </div>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import IconItem from '@/Icons/Item'
</script>

<style>

</style>
