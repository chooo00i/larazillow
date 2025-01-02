<template>
    <form>
        <div class="mb-4 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    v-model="filterForm.deleted"
                    id="deleted" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                <label for="deleted">Deleted</label>
            </div>
            <div>
                <select class="input-filter-l w-24" v-model="filterForm.by">
                    <option value="created_at">Added</option>
                    <option value="price">Price</option>
                </select>
                <select class="input-filter-r w-32" v-model="filterForm.order">
                    <option v-for="option in sortOpitons" :key="option.value" :value="option.value">{{ option.label }}</option>
                </select>
            </div>
        </div>
    </form>
</template>

<script setup>
    import { reactive, watch, computed } from 'vue'
    import { router } from '@inertiajs/vue3'
    import { debounce } from 'lodash'

    const sortLabels = {
        created_at: [
            {
                label: 'Latest',
                value: 'desc',
            },
            {
                label: 'Oldest',
                value: 'asc',
            },
        ],
        price: [
            {
                label: 'Pricy',
                value: 'desc',
            },
            {
                label: 'Cheapest',
                value: 'asc',
            },
        ]
    }

    const sortOpitons = computed(() => sortLabels[filterForm.by])

    const filterForm = reactive({
        deleted: false,
        by: 'created_at',
        order: 'desc',
    })

    // filterForm이 변경될 때마다 router.get 호출
    // debounce: 마지막 호출만 실행되도록 함
    watch(
        filterForm, debounce(() => router.get(
            route('realtor.listing.index'),  // URL (서버 측 라우터와 연결)
            filterForm,                       // 쿼리 파라미터
            {
                preserveState: true,          // 페이지 상태를 보존
                preserveScroll: true,        // 스크롤 위치 보존
            }
        ), 1000)
    )

    // reative / ref / computed
    // watch(
    //     () => filterForm.deleted, (newValue, oldValue) => console.log(newValue, oldValue)
    // )
</script>