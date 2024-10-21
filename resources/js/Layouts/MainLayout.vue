<template>
    <!-- <div>The page with time {{ timer }}</div> -->

    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-lg text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.index')">LaraZillow</Link>
                </div>
                <div>
                    <Link :href="route('listing.create')" class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium p-2 rounded-md">+ New Listing</Link>
                </div>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4">
        <div v-if="flashSuccess" class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ flashSuccess }}
            <!-- Im flash -->
        </div>
    
        <!-- 하위 페이지들이 slot 구역에 표시됨 -->
        <slot>Default</slot>
    </main>
</template>

<script setup>
    import { computed } from 'vue';
    import { Link, usePage } from '@inertiajs/vue3'

    // const x = ref(0)
    // const y = computed(() => x.value * 2)

    // page.props.flash.success
    const page = usePage() // inertia에서 제공
    const flashSuccess = computed(
        () => page.props.flash.success
    )

    // import {ref} from 'vue'
    // let timer = ref(0)
    // setInterval(() => timer.value++, 1000);
</script>