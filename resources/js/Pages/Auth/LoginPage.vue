<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
    email: '',
    password: '',
    remember: false
})

const submit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    })
}

defineOptions({
    layout: '',
})

</script>

<template>

    <Head>
        <title>Login</title>
        <meta head-key="description" name="description" content="This is the default description for the login page." />
    </Head>

  <div class="container max-w-7xl mx-auto mt-10">
    <h1 class="text-4xl font-bold text-gray-900 mb-4 text-center">Login Page</h1>
    
    <!-- Header -->
    <div class="mb-4 mt-8 text-center">
        <h1 class="text-3xl font-bold text-gray-900">Login</h1>
        <p class="text-sm text-gray-600">
            Use the form below to sign in to your account.
        </p>
    </div>

    <!-- Form Container -->
    <div class="bg-white shadow overflow-hidden sm:rounded px-5 py-5 max-w-md mx-auto">
        <form @submit.prevent="submit" class="space-y-5">
            
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700" for="email">Email</label>
                <input v-model="form.email" @focus="form.clearErrors('email')" type="email" id="email" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="email@example.com" />
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700" for="password">Password</label>
                <input v-model="form.password" @focus="form.clearErrors('password')" type="password" id="password" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" placeholder="••••••••" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input v-model="form.remember" @focus="form.clearErrors('remember')" type="checkbox" id="remember" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                    <label for="remember" class="ml-2 block text-sm text-gray-900">Remember me</label>
                </div>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-500">Forgot password?</a>
            </div>

            <!-- Button -->
            <button type="submit" class="w-full flex justify-center rounded-md bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                Sign In
            </button>
        </form>
    </div>
</div>
</template>

<style scoped>

</style>