<template>
    <Link href="/listing">Listings</Link>&nbsp;
    <Link href="/listing/create">New Listing</Link>
    <!-- <div>The page with time {{ timer }}</div> -->

    <div v-if="flashSuccess" class="success">
        {{ flashSuccess }}
    </div>
    <div>{{ y }}</div>

    <!-- 하위 페이지들이 slot 구역에 표시됨 -->
    <slot>Default</slot>
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

<style scoped>
    .success {
        background-color: green;
        color: aliceblue;
    }
</style>