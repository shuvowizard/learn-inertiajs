<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import NavLink from './NavLink.vue';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => {
    return page.props.auth.user;
});

</script>

<template>
    <nav class="bg-indigo-600 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <Link href="/" class="text-white text-lg font-bold">
                MyApp
                <span class="text-sm text-white ml-7">Welcome Back, {{ user.username }}!</span>
            </Link>
            <div>
                <NavLink href="/" :active="$page.url === '/'">Home</NavLink>
                <NavLink href="/users" :active="$page.url.startsWith('/users')">User</NavLink>
                <NavLink href="/about" :active="$page.url === '/about'">About</NavLink>
                <NavLink href="/contact" :active="$page.url === '/contact'">Contact</NavLink>
                <NavLink href="/logout" method="post" as="button" class="cursor-pointer">Logout</NavLink>
            </div>
        </div>
    </nav>
</template>
