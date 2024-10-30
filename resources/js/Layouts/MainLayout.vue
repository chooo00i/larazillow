<template>
    <!-- <div>The page with time {{ timer }}</div> -->

    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-bold">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-lg text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.index')">LaraZillow</Link>
                </div>
                <div v-if="user" class="flex items-center gap-4">
                    <div class="text-gray-500 text-sm">{{ user.name }}</div>
                    <Link :href="route('listing.create')" class="btn-primary">+ New Listing</Link>
                    <div>
                        <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                    </div>
                </div>
                <div v-else>
                    <Link :href="route('login')">Sign In</Link>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4 w-full">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>
    
        <!-- 하위 페이지들이 slot 구역에 표시됨 -->
        <slot>Default</slot>
    </main>
</template>

<script setup>
    import { computed } from 'vue';
    import { Link, usePage, useForm } from '@inertiajs/vue3'
    import { route } from 'ziggy';

    // const x = ref(0)
    // const y = computed(() => x.value * 2)

    // page.props.flash.success
    const page = usePage() // inertia에서 제공
    const flashSuccess = computed(
        () => page.props.flash.success
    )
    const user = computed(
        () => page.props.user,
    )
    const form = useForm({});
    const logout = () => form.delete(route('logout'))
</script>