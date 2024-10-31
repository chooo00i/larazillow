<template>
    <div>
        <Link :href="`logout`" method="delete" as="button" type="button">Logout</Link>
    </div>
</template>

<script setup>
    import { ref } from 'vue'
    import { Link } from '@inertiajs/vue3'
</script>