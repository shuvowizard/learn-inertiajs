<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    active: Boolean,
})
</script>

<template>
    <Link :class="{ 'bg-gray-700': active }"  class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
        <slot />
    </Link>
</template>