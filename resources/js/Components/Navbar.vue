<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <Link href="/" class="text-white text-lg font-bold">MyApp</Link>
            <div>
                <Link href="/" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</Link>
                <Link href="/about" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</Link>
                <Link href="/contact" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</Link>
                <Link href="/logout" method="post" as="button" :data="{ foo: 'bar' }" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</Link>
            </div>
        </div>
    </nav>
</template>
