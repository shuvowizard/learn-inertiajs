<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    links: Array,
    users: Object
})
</script>

<template>
    <!-- Pagination -->
    <div class="mt-6 flex items-center justify-between text-sm">
        <!-- LEFT: Pagination Links -->
        <div>
            <Component
                v-for="(link, index) in links"
                :key="index"
                :is="link.url ? Link : 'span'"
                :href="link.url"
                v-html="link.label"
                class="px-2 py-1 cursor-pointer"
                :class="[
                    link.url
                        ? 'text-gray-600 hover:text-indigo-600'
                        : 'text-gray-300',
                    link.active ? 'font-bold text-indigo-600' : '',
                ]"
            />
        </div>

        <!-- RIGHT: Info Text -->
        <p class="text-gray-600">
            Showing
            <span class="font-medium">{{ users.from }}</span>
            to
            <span class="font-medium">{{ users.to }}</span>
            of
            <span class="font-medium">{{ users.total }}</span>
            results
        </p>
    </div>
</template>

