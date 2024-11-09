<template>
    <!-- iterator는 id가 필요 -->
    <!-- 아래처럼 index를 사용할 수도 있음 -->
    <!-- <div v-for="(listing, index) in listings" :key="listing.id"> -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="listing in listings" :key="listing.id" :listing="listing">
        </Listing>
    </div>
</template>

<script setup>
import Listing from "./Index/Components/Listing.vue"
defineProps({
    listings: Array,
})
</script>Í