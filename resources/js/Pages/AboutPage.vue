<script setup>
defineProps({
    title: String,
});
</script>

<template>
    <Head>   
        <meta head-key="description" name="description" content="This is the default description for the about page." />
    </Head>

    <div class="container mx-auto p-4 text-center">
        <h1 class="text-3xl font-bold">About Page</h1>
        <p class="mt-4 text-lg">This is the About page.</p>
    </div>
</template>

<style scoped>

</style>