<template>
    <form>
        <div class="mb-4 mt-4 flex flex-wrap gap-2">
            <div class="flex flex-nowrap items-center gap-2">
                <input
                    v-model="filterForm.deleted"
                    id="deleted" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                <label for="deleted">Deleted</label>
            </div>
        </div>
    </form>
</template>

<script setup>
    import { reactive, watch } from 'vue'
    import { router } from '@inertiajs/vue3';

    const filterForm = reactive({
        deleted: false,
    })

    // filterForm이 변경될 때마다 router.get 호출
    watch(
        filterForm, () => {
            router.get(
                route('realtor.listing.index'),  // URL (서버 측 라우터와 연결)
                filterForm,                       // 쿼리 파라미터
                {
                    preserveState: true,          // 페이지 상태를 보존
                    preserveScroll: true,        // 스크롤 위치 보존
                }
            )
        }
    )

    // reative / ref / computed
    // watch(
    //     () => filterForm.deleted, (newValue, oldValue) => console.log(newValue, oldValue)
    // )
</script>