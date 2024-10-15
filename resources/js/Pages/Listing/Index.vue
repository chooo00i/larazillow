<template>
    <!-- v-for의 iteration에는 고유 key가 필요함 -->
    <!-- <div v-for="(listing, index) in listings" :key="listing.id">  -->
    <div v-for="listing in listings" :key="listing.id"> 
        <Link :href="`/listing/${listing.id}`">
            <ListingAdress :listing="listing"/>
        </Link>
    </div>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3'
    import ListingAdress from '@/Components/ListingAdress.vue';
    defineProps({
        listings: Array,
    })
</script>