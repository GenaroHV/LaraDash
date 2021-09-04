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
                    <span class='tooltip'>Projects</span>
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center linkClass" href="#">
                <span class="text-left">
                    <IconItem/>
                </span>
            </Link>
            <Link class="w-16 justify-center linkClass" href="#">
                <span class="text-left">
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
