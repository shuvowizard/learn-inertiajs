<script setup>
import { Head } from "@inertiajs/vue3";
defineProps({
    name: String,
    email: String,
});
</script>

<template>
    <Head title="Home Page" />
    <div class="container mx-auto p-4 text-center">
        <h1 class="text-3xl font-bold underline">Home Page</h1>
        <p class="mt-4 text-2xl italic">Hello {{ name }}. Welcome to your first Inertia app!</p>
        <p class="mt-4 text-2xl italic">Your email is: {{ email }}</p>
    </div>
</template>

<style scoped>

</style>