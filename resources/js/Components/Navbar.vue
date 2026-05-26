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
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <Link href="/" class="text-white text-lg font-bold">
                MyApp
                <span class="text-sm text-gray-300 ml-7">Welcome Back, {{ user.username }}!</span>
            </Link>
            <div>
                <NavLink href="/" :active="$page.url === '/'">Home</NavLink>
                <NavLink href="/user" :active="$page.component.startsWith('Users/')">User</NavLink>
                <NavLink href="/about" :active="$page.url === '/about'">About</NavLink>
                <NavLink href="/contact" :active="$page.url === '/contact'">Contact</NavLink>
                <Link href="/logout" method="post" as="button" :data="{ foo: 'bar' }" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</Link>
            </div>
        </div>
    </nav>
</template>
