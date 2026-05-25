<script setup>
import Navbar from "../Components/Navbar.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head>
        <title>My App</title>
        <meta head-key="description" name="description" content="This is default fallback description for meta tags." />
    </Head>

    <header>
        <Navbar />
    </header>

    <main class="p-6">
        <div class="container mx-auto max-w-3xl">
            <slot />
        </div>
    </main>
</template>

<style scoped>

</style>