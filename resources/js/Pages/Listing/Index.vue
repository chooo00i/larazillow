<template>
    <!-- iterator는 id가 필요 -->
    <!-- 아래처럼 index를 사용할 수도 있음 -->
    <!-- <div v-for="(listing, index) in listings" :key="listing.id"> -->
    <Filters :filters="filters" />
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing">
        </Listing>
    </div>
    <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4"> 
        <Pagination :links="listings.links" />
    </div>
</template>

<script setup>
import Pagination from "@/Components/UI/Pagination.vue";
import Listing from "./Index/Components/Listing.vue"
import Filters from "./Index/Components/Filters.vue";
defineProps({
    listings: Object,
    filters: Object,
})
</script>