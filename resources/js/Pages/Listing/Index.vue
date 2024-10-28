<template>
    <!-- v-for의 iteration에는 고유 key가 필요함 -->
    <!-- <div v-for="(listing, index) in listings" :key="listing.id">  -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="listing in listings" :key="listing.id" :listing="listing"> 
        </Listing>
    </div>
</template>

<script setup>
    import Listing from '@/Pages/Listing/Index/Components/Listing.vue'
    defineProps({
        listings: Array,
    })
</script>