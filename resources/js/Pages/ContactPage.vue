<script setup>
import { Head } from "@inertiajs/vue3";
import Navbar from "../Components/Navbar.vue";
defineProps({
    title: String,
});
</script>

<template>
    <Head>
        <title>{{ title }}</title>
        <meta head-key="description" name="description" content="This is the default description for the contact page." />
    </Head>

    <Navbar />

    <div class="container mx-auto p-4 text-center">
        <h1 class="text-3xl font-bold">Contact Page</h1>
        <p class="mt-4 text-lg">This is the Contact page.</p>
    </div>
</template>

<style scoped>

</style>