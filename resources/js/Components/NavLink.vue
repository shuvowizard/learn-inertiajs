<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    active: Boolean,
})
</script>

<template>
    <Link :class="{ 'bg-indigo-900': active }"  class="text-white hover:text-gray-300 px-3 py-2 rounded-md text-sm font-medium">
        <slot />
    </Link>
</template>