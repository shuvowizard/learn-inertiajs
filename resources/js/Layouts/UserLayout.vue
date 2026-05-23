<script setup>
import Navbar from "../Components/Navbar.vue";
</script>

<template>
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