<script setup>
import Pagination from '@/Components/Pagination.vue'
import { Link, router } from '@inertiajs/vue3'
import { ref, watch } from 'vue'
import { debounce } from 'lodash'

const props = defineProps({
    users: Object,
    filters: Object,
})

const search = ref(props.filters?.search || '')

watch(search, debounce(function (value) {
    router.get('/user', { search: value }, {
        preserveState: true, 
        replace: true
    })
}, 300))

</script>


<template>
    <Head>
        <title>User Page</title>
        <meta head-key="description" name="description" content="This is the default description for the user page." />
    </Head>

    <div class="container max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 mb-4 text-center">User Page</h1>
        <!-- Header -->
        <div class="mb-8 flex flex-col gap-y-4 sm:flex-row sm:items-center sm:justify-between">
            
            <!-- Left Side: Title, Button & Description -->
            <div class="flex flex-col gap-1">
                <div class="flex items-center gap-3">
                    <h1 class="text-3xl font-bold text-gray-900">Users</h1>
                    
                    <!-- Small Add User Button -->
                    <Link href="#" class="inline-flex items-center rounded-md bg-indigo-600 px-2.5 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <!-- Plus Icon -->
                        <svg class="-ml-0.5 mr-1.5 h-3 w-3" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        Add user
                    </Link>
                </div>

                <p class="text-sm text-gray-600">
                    A list of all the users in your account including their name, and email.
                </p>
            </div>

            <!-- Right Side: Search Bar -->
            <div class="w-full sm:w-72">
                <label for="search" class="sr-only">Search</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Search Icon -->
                        <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input v-model="search" type="text" name="search" id="search" class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search users..." />
                </div>
            </div>

        </div>

        <!-- Table Container -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Row 1 -->
                    <tr v-for="user in users.data" :key="user.id" class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-indigo-500 flex items-center justify-center text-white font-medium">
                                        {{ user.name.charAt(0).toUpperCase()}}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ user.name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ user.email }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ user.email }}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <Link href="#" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <Pagination :links="users.links" :users="users" />

</template>
