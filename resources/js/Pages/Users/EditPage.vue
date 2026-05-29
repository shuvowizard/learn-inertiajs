<script setup>

const props = defineProps({
    user: Object,
});

</script>

<template>
    <Head>
        <title>Edit User</title>
        <meta head-key="description" name="description" content="This is the default description for the user create page." />
    </Head>

    <div class="container max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 mb-4 text-center">Update User Page</h1>
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Edit User</h1>
            <p class="text-sm text-gray-600">
                Use the form below to update the user's information.
            </p>
        </div>

        <!-- Table Container -->
        <div class="bg-white shadow overflow-hidden sm:rounded px-5 py-5">
            <form  class="space-y-5">
                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                    <input type="text" id="name" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="Enter full name" />                    
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                    <input type="email" id="email" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="email@example.com" />
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                    <input type="password" id="password" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="••••••••" />                    
                </div>

                <!-- Button -->
                <button ass="{'opacity-50': form.processing}" type="submit" class="w-full flex justify-center rounded-md bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                    Update User
                </button>
            </form>
        </div>
    </div>
</template>
