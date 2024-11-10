<template>
    <form @submit.prevent="login">
        <div class="w-1/2 mx-auto">
            <div>
                <label for="email" class="label">E-mail (username)</label>
                <input id="email" type="text" class="input" v-model="form.email" />
                <!-- <div class="input-error">Potential error</div> -->
            </div>
            <div class="mt-4">
                <label for="password" class="label">Password</label>
                <input id="password" type="password" class="input" v-model="form.password" />
                <!-- <div class="input-error">Potential error</div> -->
            </div>
            <div class="mt-4">
                <button class="btn-primary w-full" type="submit">Login</button>
            </div>
        </div>
    </form>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3';
    const form = useForm({
        email: null,
        password: null,
    })
    const login = () => form.post(route('login.store'))
</script>