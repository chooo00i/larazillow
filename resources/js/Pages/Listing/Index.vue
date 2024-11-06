<template>
    <!-- iterator는 id가 필요 -->
    <!-- 아래처럼 index를 사용할 수도 있음 -->
    <!-- <div v-for="(listing, index) in listings" :key="listing.id"> -->
    <div v-for="listing in listings" :key="listing.id">
        <div>
            <Link :href="route('listing.show', listing.id)">
                <ListingAddress :listing="listing" />
            </Link>
        </div>
        <div>
            <Link :href="route('listing.edit', listing.id)">
                Edit
            </Link>
        </div>
        <div>
            <Link :href="route('listing.destroy', listing.id)" method="delete" as="button">
                Delete
            </Link>
        </div>
    </div>
</template>

<script setup>
    import { Link } from "@inertiajs/vue3"
    import ListingAddress from '@/Components/ListingAddress.vue'
    defineProps({
        listings: Array,
    })
</script>Í